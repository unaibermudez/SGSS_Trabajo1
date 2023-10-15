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
        
        $sql = "SELECT password FROM usuarios WHERE username='$user'";
        $result = mysqli_query($this->conn, $sql);

        if (!$result) {
            die("Error en la consulta: " . mysqli_error($this->conn));
        }

        $row = mysqli_fetch_assoc($result);

        if (!$row) {
            return false; // El usuario no existe
        }

        // Luego, comparamos la contraseña proporcionada con la contraseña almacenada en la base de datos
        if (password_verify($pass, $row['password'])) {
            return true; // Contraseña válida, inicio de sesión exitoso
        } else {
            return false; // Contraseña incorrecta
        }
    }

    public function modificar_datos_usuario($sql) {
        // Verifica si el arreglo de datos no está vacío y que el ID sea válido
        $this->send_query_db($sql);
    }

    public function modificar_datos_coche($sql) {
        // Verifica si el arreglo de datos no está vacío y que el ID sea válido
            $this->send_query_db($sql);
        }

    public function obtener_datos_coche($id) {
        $datos_coche = array(); // Creamos un arreglo para almacenar los datos de los coches
    
        $sql = "SELECT * FROM coches WHERE id_coche='$id'"; // Consulta SQL para seleccionar todos los coches
        $result = mysqli_query($this->conn, $sql);
    
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $datos_coche = $row; // Almacenar los datos de cada coche en el arreglo
                }
                mysqli_free_result($result);
            }
        }
    
        return $datos_coche; // Devolver el arreglo con los datos de los coches
    }
    
    

    public function obtener_datos_usuario($user){
        $datos_usuario = array(); // Creamos un arreglo para almacenar los datos del usuario
    
        $sql = "SELECT * FROM usuarios WHERE username='$user'";
        $result = mysqli_query($this->conn, $sql);
    
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $datos_usuario = $row; // Almacenar los datos del usuario en el arreglo
            }
            mysqli_free_result($result);
        }
    
        return $datos_usuario; // Devolver el arreglo con los datos del usuario
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
    
    public function registrar_coche($datos){
       
        $sql_ins = "INSERT INTO coches (imagen, marca, modelo, anno, color, caballos,combustible, precio, kilometros,cambio) 
        VALUES ('{$datos['imagen']}','{$datos['marca']}', '{$datos['modelo']}', '{$datos['anno']}', '{$datos['color']}', '{$datos['caballos']}', '{$datos['combustible']}', '{$datos['precio']}', '{$datos['kilometros']}', '{$datos['cambio']}')";
      
        $res = $this->send_query_db($sql_ins);
        return true;
    }

    public function eliminar_coche($datos) {
        if (!isset($datos['id_coche']) || !is_numeric($datos['id_coche'])) {
            return false; // Manejar el error de alguna forma, por ejemplo, lanzar una excepción
        }
    
        $id_coche = intval($datos['id_coche']);
        $sql_del = "DELETE FROM coches WHERE id_coche = " . $id_coche;
    
        $res = $this->send_query_db($sql_del);
        
        // Aquí puedes verificar el resultado de la eliminación y retornar true o false según corresponda
        if ($res) {
            return true; // La eliminación fue exitosa
        } else {
            return false; // O manejar el error de otra forma
        }
    }

    public function obtener_coches(){
        $sql_ins="SELECT * FROM coches ORDER BY id_coche DESC";

        $query = mysqli_query($this->conn, $sql_ins)
            or die (mysqli_error($this->conn));
        return $query;

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
   

    
    
    } ?>
