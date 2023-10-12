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

    if(isset($_POST['submit'])){
        
        if(!empty($_POST['username'])){
            $nombre = $_POST['username'];
        }else{
            $nombre = $_SESSION['username'];
        }
        $sql = "UPDATE usuarios SET username = '$nombre' WHERE username = '$id'";
        $res = $db->modificar_datos_usuario($sql);
        header('Location:usuario.php');
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