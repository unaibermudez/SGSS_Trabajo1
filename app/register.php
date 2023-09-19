<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - MotorCity Dealership</title>
    <link rel="stylesheet" href="/styles/register.css"> <!-- Include your CSS file for styling -->
</head>
<body>
    <!-- Incluimos la barra del menú -->
    <?php require_once("components/nav-bar.php")?>
    <div class="register-container">
        <h1>Registrarse</h1>
        <form action="process_register.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="fullName">Nombre y Apellido:</label>
            <input type="text" id="fullName" name="fullName" required>

            <label for="dni">DNI:</label>
            <input type="text" id="dni" name="dni" required>

            <label for="phone">Teléfono:</label>
            <input type="text" id="phone" name="phone" required>

            <label for="birthdate">Fecha de nacimiento:</label>
            <input type="date" id="birthdate" name="birthdate" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Nueva contraseña:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirmPassword">Repetir contraseña:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>

            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>
</html>
