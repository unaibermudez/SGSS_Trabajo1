<?php

require('Validador.php');

class Database{

    private static $instance;
    private $hostname = "db";
    private $username = "admin";
    private $password = "test";
    private $db = "database";
    private $conn; 

    private function __construct(){
        // Para evitar inyecciones SQL sería conveniente realizar consultas
        // parametrizadas. No es este caso.
        
        $this->conn = mysqli_connect($this->hostname,$this->username,$this->password,$this->db);

        if ($this->conn->connect_error) {
            die("Database connection failed: " . $this->conn->connect_error);
        }

    }

    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new database();
        }

        return self::$instance;
    }

    public function comprobar_identidad($user, $pass){
        // TODO: Validar datos antes de realizar peticiones
        
        $sql = "SELECT password FROM usuarios WHERE username='$user' ";
        $result = mysqli_query($conn, $sql);
        $identified = false;
        $nombre = mysqli_fetch_array($result, MYSQLI_ASSOC);
        echo $nombre["username"];
        echo $nombre["password"];

        if(isset($nombre['password']) and strcmp($pass, $nombre['password']) == 0){
            $identified = true;
        }

        return $identified;
    }

    public function registrar_usuario($datos){
        // Validamos los datos 
        if(!Validador::val_DNI($datos['dni'])){
            return "ERROR: el DNI introducido no tiene el formato correcto";
        }

        if(!Validador::val_email($datos['email'])){
            return "ERROR: el email introducido no tiene el formato correcto";
        }

        if(!Validador::val_telf($datos['telf'])){
            return "ERROR: el teléfono introducido no tiene el formato correcto";
        }

        if(!Validador::val_date($datos['fecha_nacimiento'])){
            return "ERROR: el teléfono introducido no tiene el formato correcto";
        }

        // Comprobar que el nombre de usuario es único
        if(strcmp($datos['username'], "") != 0){
            // El username no es un string vacío
            if($this->existe_nombre_usuario($datos['username'])){
                return "ERROR: el nombre de usuario introducido ya está registrado";
            }
        }else{
            return "ERROR: el nombre de usuario no puede ser una cadena vacía";

        }

        $sql_ins = "INSERT INTO usuarios (username, nombre_apellidos, dni, telf, fecha_nacimiento, email, password) VALUES ('{$datos['username']}', '{$datos['nombre_apellidos']}', '{$datos['dni']}', '{$datos['telf']}', '{$datos['fecha_nacimiento']}', '{$datos['email']}', '{$datos['password']}')";
      
        $res = $this->send_query_db($sql_ins);
    }

    private function existe_nombre_usuario($username){
        $res = $this->send_query_db("SELECT * FROM usuarios WHERE username='{$username}'");
        if(isset($res)){
            return true;
        } 

        return false;
    }

    private function send_query_db($select_instr){
        // PRE: Recibe una cadena de texto
        // POST: Comprueba si es una consulta SQL y la realiza a la base de
        // datos. Si recibe multiples valores (SELECT) devuelve un array.
        // Si no (UPDATE), devuelve un booleano.
        // TODO: Comprobar que la instrucción no es una inyección SQL

        $query = mysqli_query($this->conn, $select_instr)
            or die (mysqli_error($this->conn));

        if(is_bool($query)){
            return $query;
        }

        return mysqli_fetch_array($query);
    }

}

?>
