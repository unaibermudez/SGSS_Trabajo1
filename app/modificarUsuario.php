<?php
    ini_set('session.cookie_httponly', 1);
    ini_set('session.cookie_samesite', 'Strict');
    
    session_start();

    // Suprimir el encabezado X-Powered-By
    header_remove('X-Powered-By');
    header_remove('Server');
    header('X-Frame-Options: DENY');

    header('X-Content-Type-Options: nosniff');
    
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

        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            // Token CSRF inválido, manejar el error (puede ser un intento CSRF)
            echo '<script>alert("Error de seguridad. Intento de CSRF detectado.")</script>';
            exit;
        }

        $hay_cambios = false;
        
        if(!empty($_POST['username'])){
            $nombre = $_POST['username'];
            $usernameCambiado = true;
            $hay_cambios = true;
        }else{
            $nombre = $_SESSION['username'];
        }

        if(!empty($_POST['password']) && !empty($_POST['password2']) && $_POST['password'] == $_POST['password2']){
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $hay_cambios = true;
        }elseif (!empty($_POST['password']) && !empty($_POST['password2']) && $_POST['password'] != $_POST['password2']) {
            echo '<script>alert("La contraseña no se ha cambiado porque no coinciden")</script>';
        }elseif(empty($_POST['password']) && !empty($_POST['password2']) || !empty($_POST['password']) && empty($_POST['password2'])){
            echo '<script>alert("La contraseña no se ha cambiado porque no coinciden")</script>';
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

        if(!$hay_cambios){
            header('Location:Usuario.php');
        }
        else{
            if($usernameCambiado){
                if($db->existe_nombre_usuario($nombre)){
                    echo '<script>alert("Ya existe el nombre de usuario, por favor introduce otro")</script>';
                }
                else{
                    $sql = "UPDATE usuarios SET  username = '$nombre', password = '$password', email = '$email', dni = '$dni', telf = '$telf', fecha_nacimiento = '$fecha_nacimiento', nombre_apellidos = '$nombre_apellidos' WHERE username = '$id'";
                    $res = $db->modificar_datos_usuario($sql);
                    $_SESSION['username'] = $nombre;
                    header('Location: usuario.php');
                }
            }
            else{
                $sql = "UPDATE usuarios SET password = '$password', email = '$email', dni = '$dni', telf = '$telf', fecha_nacimiento = '$fecha_nacimiento', nombre_apellidos = '$nombre_apellidos' WHERE username = '$id'";
                $res = $db->modificar_datos_usuario($sql);
                header('Location: usuario.php');
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Security-Policy" content="default-src 'self'; form-action 'self'; style-src 'self' https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com; script-src 'self' https://apis.google.com;">
    <title>Modify User - MotorCity Dealership</title>
    <link rel="stylesheet" href="/styles/modificar_usuario.css"> <!-- Include your CSS file -->
    <link rel="stylesheet" href="/styles/nav-bar.css">
</head>
<body>
    <?php require_once("components/nav-bar.php")?>

    <header>
        <h1>Modificar Datos Usuario</h1>
    </header>

    <div class="register-container">
    
        <form method="POST" action="" onsubmit="return validar_y_enviar_datos()">

            <div class="form-item">
                <label for="username">Cambiar username:</label>
                <input type="text" name="username" id="username" placeholder="<?= $_SESSION["username"] ?>">
                <span id="errorUsername" class="error"></span>
            </div>

            <div class="form-item">
                <label for="nombre_apellidos">Cambiar Nombre y Apellidos:</label>
                <input type="text" name="nombre_apellidos" id="nombre_apellidos" placeholder="<?= $_SESSION["nombre_apellidos"] ?>">
                <span id="errorNombreApellido" class="error"></span>
            </div>

            <div class="form-item">
                <label for="dni">Cambiar DNI:</label>
                <input type="text" name="dni" id="dni" placeholder="<?= $_SESSION["dni"] ?>">
                <span id="errorDNI" class="error"></span>
            </div>

            <div class="form-item">
                <label for="telf">Cambiar Teléfono:</label>
                <input type="text" name="telf" id="telf" placeholder="<?= $_SESSION["telf"] ?>">
                <span id="errorTelf" class="error"></span>
            </div>

            <div class="form-item">
                <label for="fecha_nacimiento">Cambiar Fecha de Nacimiento:</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="<?= $_SESSION["fecha_nacimiento"] ?>">
            </div>

            <div class="form-item">
                <label for="email">Cambiar Email:</label>
                <input type="email" name="email" id="email" placeholder="<?= $_SESSION["email"] ?>">
                <span id="errorMail" class="error"></span>
            </div>

            <div class="form-item">
                <label for="password">Nueva Password:</label>
                <input type="password" name="password" id="password">
                <span id="errorPassword" class="error"></span>
            </div>

            <div class="form-item">
                <label for="password2">Confirmar password:</label>
                <input type="password" name="password2" id="password2">
            </div>

            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

            <button id="button" type="submit" name="submit" onclick="$db->modificar_datos_usuario($datos, $_SESSION['id_user'])">Guardar Cambios</button>

        </form>
    </div>
    
</body>
</html>