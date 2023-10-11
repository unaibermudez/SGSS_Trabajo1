<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="/styles/about.css"> <!-- Include your CSS file -->
    <link rel="stylesheet" href="/styles/nav-bar.css">

    
</head>
<body>

    <!-- Incluimos la barra del menú -->
    <?php require_once("components/nav-bar.php")?>
    <header>
        <h1>Sobre Nosotros</h1>
    </header>

    <section class="about-cards">
        <!-- Card for Unai Bermudez -->
        <div class="about-card">
            <img src="/images/foto-perfil.webp" alt="Unai Bermudez">
            <h2>Unai Bermudez</h2>
            <p>Web Developer</p>
            <p>Contact: unai@example.com</p>
        </div>

        <!-- Card for Diego Eugenio -->
        <div class="about-card">
            <img src="/images/foto-perfil.webp" alt="Diego Eugenio">
            <h2>Diego Eugenio</h2>
            <p>Designer</p>
            <p>Contact: diego@example.com</p>
        </div>

        <!-- Card for Peio Lopez -->
        <div class="about-card">
            <img src="/images/foto-perfil.webp" alt="Peio Lopez">
            <h2>Peio Lopez</h2>
            <p>Content Writer</p>
            <p>Contact: peio@example.com</p>
        </div>
    </section>
</body>
</html>
