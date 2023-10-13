<?php
    session_start();
    require('Database.php');
    $db = Database::getInstance();

    $usuario_iniciado = false;
    
    // Verifica si el usuario ha iniciado sesión
    if (isset($_SESSION["user"]) && $_SESSION["user"] === "yes") {
        $usuario_iniciado = true;
        
    }

    $id = $_SESSION['username'];

    $datos = $db->obtener_datos_usuario($id);
    $_SESSION['email'] = $datos['email'];
    $_SESSION['telf'] = $datos['telf'];
    $_SESSION['fecha_nacimiento'] = $datos['fecha_nacimiento'];
    $_SESSION['nombre_apellidos'] = $datos['nombre_apellidos'];
    $_SESSION['dni'] = $datos['dni'];
    $_SESSION['username'] = $datos['username'];
    $_SESSION['password'] = $datos['password'];


    if(isset($_POST['submit'])){

        $hay_cambios = false;
        
        if(!empty($_POST['username'])){
            $nombre = $_POST['username'];
            $hay_cambios = true;
        }else{
            $nombre = $_SESSION['username'];
        }

        if(!empty($_POST['password']) && !empty($_POST['password2']) && $_POST['password'] == $_POST['password2']){
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $hay_cambios = true;
        }else{
            $password = $_SESSION['password'];
        }

        if(!empty($_POST['email'])){
            $email = $_POST['email'];
            $hay_cambios = true;
        }else{
            $email = $_SESSION['email'];
        }

        if(!empty($_POST['dni'])){
            $dni = $_POST['dni'];
            $hay_cambios = true;
        }else{
            $dni = $_SESSION['dni'];
        }

        if(!empty($_POST['telf'])){
            $telf = $_POST['telf'];
            $hay_cambios = true;
        }else{
            $telf = $_SESSION['telf'];
        }

        if (!empty($_POST['fecha_nacimiento'])) {
            $fecha_nacimiento = $_POST['fecha_nacimiento'];
            $hay_cambios = true;
        } else {
            $fecha_nacimiento = $_SESSION['fecha_nacimiento'];
        }

        if(!empty($_POST['nombre_apellidos'])){
            $nombre_apellidos = $_POST['nombre_apellidos'];
            $hay_cambios = true;
        }else{
            $nombre_apellidos = $_SESSION['nombre_apellidos'];
        }

        if($hay_cambios){
            $sql = "UPDATE usuarios SET username = '$nombre' , password = '$password' , email = '$email' , dni = '$dni' , telf = '$telf' , fecha_nacimiento = '$fecha_nacimiento' , nombre_apellidos = '$nombre_apellidos' WHERE username = '$id'";
            $res = $db->modificar_datos_usuario($sql);
            $_SESSION['username'] = $nombre;
            header('Location:usuario.php');
        }else{
            header('Location:usuario.php');
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifify User - MotorCity Dealership</title>
    <link rel="stylesheet" href="/styles/modificar.css"> <!-- Include your CSS file -->
    <link rel="stylesheet" href="/styles/nav-bar.css">
</head>
<body>
    <?php require_once("components/nav-bar.php")?>
    <header>
        <h1>Modificar Datos</h1>
    </header>

    <div class="register-container">
        <h1>Modificar</h1>

        <form method="POST" action="" onsubmit="return validar_y_enviar_datos()">

            <div class="form-item">
                <label for="username">Cambiar username:</label>
                <input type="text" name="username" id="username">
                <span id="errorUsername" class="error"></span>
            </div>

            <div class="form-item">
                <label for="nombre_apellidos">Cambiar Nombre y Apellidos:</label>
                <input type="text" name="nombre_apellidos" id="nombre_apellidos">
                <span id="errorNombreApellido" class="error"></span>
            </div>

            <div class="form-item">
                <label for="dni">Cambiar DNI:</label>
                <input type="text" name="dni" id="dni">
                <span id="errorDNI" class="error"></span>
            </div>

            <div class="form-item">
                <label for="telf">Cambiar Teléfono:</label>
                <input type="text" name="telf" id="telf">
                <span id="errorTelf" class="error"></span>
            </div>

            <div class="form-item">
                <label for="fecha_nacimiento">Cambiar Fecha de Nacimiento:</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento">
            </div>

            <div class="form-item">
                <label for="email">Cambiar Email:</label>
                <input type="email" name="email" id="email">
                <span id="errorMail" class="error"></span>
            </div>

            <div class="form-item">
                <label for="password">Cambiar Password:</label>
                <input type="password" name="password" id="password">
                <span id="errorPassword" class="error"></span>
            </div>

            <div class="form-item">
                <label for="password2">Confirmar password:</label>
                <input type="password" name="password2" id="password2">
            </div>

            <button id="button" type="submit" name="submit" onclick="$db->modificar_datos_usuario($datos, $_SESSION['id_user'])">Guardar</button>

        </form>
    </div>
    
</body>
</html>