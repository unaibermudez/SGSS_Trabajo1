<?php
session_start();

if (!isset($_SESSION["user"]) || $_SESSION["user"] !== "yes") {
    header("Location: login.php"); // Redirect to the login page if the user is not logged in
    exit;
}

if (!$userData) {
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="/styles/perfil.css"> <!-- Include your CSS for styling -->
</head>
<body>
    <?php require_once("components/nav-bar.php") ?>

    <div class="profile-container">
        <h1>User Profile</h1>

        <div class="profile-info">
            <p><strong>Username:</strong> <?= $userData['username'] ?></p>
            <p><strong>Nombre y Apellidos:</strong> <?= $userData['nombre_apellidos'] ?></p>
            <p><strong>DNI:</strong> <?= $userData['dni'] ?></p>
            <p><strong>Teléfono:</strong> <?= $userData['telf'] ?></p>
            <p><strong>Fecha de Nacimiento:</strong> <?= $userData['fecha_nacimiento'] ?></p>
            <p><strong>Email:</strong> <?= $userData['email'] ?></p>
        </div>

        <!-- Log Out Button -->
        <a href="logout.php" class="logout-button">Log Out</a>
    </div>
</body>
</html>

