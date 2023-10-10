<?php
    session_start();
    echo "Hola";
    header('Content-Type: text/html; charset=utf-8');
    require('Database.php');
    $db = Database::getInstance();

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $error = $db->comprobar_identidad($username, $password);

        if(!isset($error)){
            header('Location:about.php');
        }else{
            echo "Contraseña incorrecta";
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

            <button type="submit" name="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register</a></p>
    </div>
</body>
</html>
