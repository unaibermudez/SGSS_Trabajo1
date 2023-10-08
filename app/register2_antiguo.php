<?php
session_start();

header('Content-Type: text/html; charset=utf-8');
require('Database.php');
$db = Database::getInstance();

if(isset($_SESSION['user'])){
    // Estamos loggeados -> volvemos a la página principal
    header("Location:index.php");

}else if(isset($_POST['register'])){
    unset($_POST['register']);

    if( strcmp($_POST['password'], $_POST['confirmPassword']) == 0){
        $datos['username'] = $_POST['username'];
        $datos['nombre_apellidos'] = $_POST['nombre_apellidos'];
        $datos['dni'] = $_POST['dni'];
        $datos['telf'] = $_POST['telf'];
        $datos['fecha_nacimiento'] = $_POST['fecha_nacimiento'];
        $datos['email'] = $_POST['email'];
        $datos['password'] = $_POST['password'];

        $error = $db->registrar_usuario($datos);

        if(!isset($error)){
            header('Location:login.php');
        }

        // Hacemos algo con el error
        echo $error;

    }else{
        echo "ERROR: las contraseñas no coinciden";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - MotorCity Dealership</title>
     <link rel="stylesheet" href="/styles/register.css">  <!-- Include your CSS file for styling -->
</head>
<body>
    <!-- Incluimos la barra del menú -->
    <?php require_once("components/nav-bar.php")?>
    <div class="register-container">
        <h1>Registrarse</h1>
        <form id="form" action="connect.php" method="POST">
            <div class="form-item">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter username" value=<?php echo "{$datos['username']}"; ?> >
                <span id=errorUsername style="color:red"></span>
                </div>


            <div class="form-item">
                <label for="nombre_apellidos">Nombre y Apellido:</label>
                <input type="text" id="nombre_apellidos" name="nombre_apellidos"  placeholder="Enter your name and subname" value="" >
                <span id=errorNombreApellido style="color:red"></span>
            </div>

            <div class="form-item">
                <label for="dni">DNI:</label>
                <input type="text" id="dni" name="dni"  placeholder="Enter your DNI" value="" >
                <span id=errorDni style="color:red"></span>
            </div>

            <div class="form-item">
                <label for="telf">Teléfono:</label>
                <input type="text" id="telf" name="telf"  placeholder="Enter your telephone number"value="">
                <span id=errorTelf style="color:red"></span>
            </div>

            <div class="form-item">
                <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Enter your birth date" value="">
            </div>

            <div class="form-item">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" value="" >
                <span id=errorMail style="color:red"></span>
            </div>
            
            <div class="form-item">
                <label for="password">Nueva contraseña:</label>
                <input type="password" id="password" name="password" placeholder="Enter a new password" value="">
                <span id=errorPassword style="color:red"></span>
            </div>

            <div class="form-item">
                <label for="confirmPassword">Repetir contraseña:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Repeat your password" value="">
                <span id=errorPassword2 style="color:red"></span>
            </div>

            <!-- 
            <div class="form-item">
                <button type="button" id="button" name="register" value="Register" onclick="validar_y_enviar_datos()">Register</button>
            </div>
            -->
            <div class="form-item">
                <button type="button" id="button" name="register" value="Register">Register</button>
            </div>
        
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
    <!-- <script defer src="scripts/Validador.js"></script>
    <script defer src="scripts/forms.js"></script>-->
</body>
</html>
