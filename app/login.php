<?php

header('X-Frame-Options: DENY');

if (isset($_POST['submit'])) {
    // Incluir el archivo de la clase Database
    require('Database.php');

    // Recoger los valores del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Crear una instancia de la clase Database
    $db = Database::getInstance();

    // Llamar al método para comprobar la identidad
    $inicio_sesion_exitoso = $db->comprobar_identidad($username, $password);

    if ($inicio_sesion_exitoso) {
        // Inicio de sesión exitoso, redireccionar o mostrar un mensaje de éxito
        session_start();
        header('Location: index.php'); // Reemplaza 'dashboard.php' con la página a la que deseas redireccionar
        $_SESSION["user"] = "yes";
        $_SESSION["username"] = $username; // Configura el nombre del usuario en una variable de sesión
        exit;
    } else {
        // Si la sesión no se inicia correctamente, muestra un mensaje de alerta
        echo '<script>alert("Usuario y/o contraseña incorrectos")</script>';
    }

    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MotorCity Dealership</title>
    <link rel="stylesheet" href="/styles/login.css"> <!-- Include your CSS file for styling -->
</head>
<body>

    <!-- Incluimos la barra del menú -->
    <?php require_once("components/nav-bar.php")?>
    <div class="login-container">
        <h1>Iniciar Sesión</h1>
        
        <form action="" method="POST">
            <label for="username">Nombre de Usuario:</label>
            <input type="username" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <button id="button" type="submit" name="submit">Login</button>
        </form>
       
        <p>Don't have an account? <a href="register.php">Register</a></p>
    </div>

</body>
</html>



