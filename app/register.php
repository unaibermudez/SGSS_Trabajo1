<?php
    session_start();

    header('X-Frame-Options: DENY');
    
    header('Content-Type: text/html; charset=utf-8');
    require('Database.php');
    $db = Database::getInstance();
    $conn = $db->getConnection();

    if (isset($_POST['submit'])) {
        unset($_POST['submit']);

        if (strcmp($_POST['password'], $_POST['password2']) == 0) {
            // Generar un salt aleatorio
            $salt = bin2hex(random_bytes(16));

            $datos['username'] = $_POST['username'];
            $datos['nombre_apellidos'] = $_POST['nombre_apellidos'];
            $datos['dni'] = $_POST['dni'];
            $datos['telf'] = $_POST['telf'];
            $datos['fecha_nacimiento'] = $_POST['fecha_nacimiento'];
            $datos['email'] = $_POST['email'];
            $datos['salt'] = $salt;

            // Utilizar sentencia preparada
            $stmt = $conn->prepare("INSERT INTO usuarios (username, nombre_apellidos, dni, telf, fecha_nacimiento, email, salt, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

            // Generar hash seguro de la contraseña
            $hashedPassword = password_hash($salt . $_POST['password'], PASSWORD_DEFAULT);

            // Vincular parámetros
            $stmt->bind_param("ssssssss", $datos['username'], $datos['nombre_apellidos'], $datos['dni'], $datos['telf'], $datos['fecha_nacimiento'], $datos['email'], $datos['salt'], $hashedPassword);

            // Ejecutar la sentencia preparada
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                // Éxito
                header('Location:login.php');
            } else {
                // Error en la inserción
                echo "Error al registrar el usuario.";
            }

            // Cerrar la sentencia preparada
            $stmt->close();
        } else {
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

        <form method="POST" action="" onsubmit="return validar_y_enviar_datos()">

            <div class="form-item">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
                <span id="errorUsername" class="error"></span>
            </div>

            <div class="form-item">
                <label for="nombre_apellidos">Nombre y Apellidos:</label>
                <input type="text" name="nombre_apellidos" id="nombre_apellidos" placeholder= "Ej. Mikel Egaña"required>
                <span id="errorNombreApellido" class="error"></span>
            </div>

            <div class="form-item">
                <label for="dni">DNI:</label>
                <input type="text" name="dni" id="dni" placeholder="Ej. 11111111Z "required>
                <span id="errorDNI" class="error"></span>
            </div>

            <div class="form-item">
                <label for="telf">Teléfono:</label>
                <input type="text" name="telf" id="telf" placeholder="Ej. 946014024"required>
                <span id="errorTelf" class="error"></span>
            </div>

            <div class="form-item">
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required>
            </div>

            <div class="form-item">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Ej. mikel.egana@ehu.eus" required>
                <span id="errorMail" class="error"></span>
            </div>

            <div class="form-item">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
                <span id="errorPassword" class="error"></span>
            </div>

            <div class="form-item">
                <label for="password2">Confirm password:</label>
                <input type="password" name="password2" id="password2" required>
            </div>

            <button id="button" type="submit" name="submit" onclick="validar_y_enviar_datos()">Register</button>

        </form>

        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
    <script defer src="scripts/Validador.js"></script>
    <script defer src="scripts/forms.js"></script>
</body>
</html>

