<?php
ini_set('session.cookie_httponly', 1);

session_start();

// Suprimir el encabezado X-Powered-By
header_remove('X-Powered-By');
header_remove('Server');
header('X-Frame-Options: DENY');

header('X-Content-Type-Options: nosniff');

if (isset($_POST['submit'])) {
    // Verificar el token CSRF
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        // Token CSRF inválido, manejar el error (puede ser un intento CSRF)
        echo '<script>alert("Error de seguridad. Intento de CSRF detectado.")</script>';
        exit;
    }

    // Resto del código para procesar el formulario
    require('Database.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = Database::getInstance();

    $inicio_sesion_exitoso = $db->comprobar_identidad($username, $password);

    if ($inicio_sesion_exitoso) {
        session_start();
        header('Location: index.php');
        $_SESSION["user"] = "yes";
        $_SESSION["username"] = $username;
        exit;
    } else {
        echo '<script>alert("Usuario y/o contraseña incorrectos")</script>';
    }
}

// Generar o renovar el token CSRF y guardarlo en la sesión
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; form-action 'self'; style-src 'self' https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com; script-src 'self' https://apis.google.com;">
    <title>Login - MotorCity Dealership</title>
    <link rel="stylesheet" href="/styles/login.css">
</head>
<body>

    <?php require_once("components/nav-bar.php")?>
    <div class="login-container">
        <h1>Iniciar Sesión</h1>
        
        <form action="" method="POST">
            <label for="username">Nombre de Usuario:</label>
            <input type="username" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <!-- Campo oculto para el token CSRF -->
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

            <button id="button" type="submit" name="submit">Login</button>
        </form>
       
        <p>Don't have an account? <a href="register.php">Register</a></p>
    </div>

</body>
</html>





