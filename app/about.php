<?php
    session_start();

    header('X-Frame-Options: DENY');
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
            <h2>Unai Bermúdez</h2>
            <p>Web Developer</p>
            <p>Contact: ubermudez001@ikasle.ehu.eus</p>
        </div>

        <!-- Card for Diego Eugenio -->
        <div class="about-card">
            <img src="/images/foto-perfil.webp" alt="Diego Eugenio">
            <h2>Diego Eugenio</h2>
            <p>Web Developer</p>
            <p>Contact: deugenio001@ikasle.ehu.eus</p>
        </div>

        <!-- Card for Peio Lopez -->
        <div class="about-card">
            <img src="/images/foto-perfil.webp" alt="Peio Lopez">
            <h2>Peio López</h2>
            <p>Web Developer</p>
            <p>Contact: plopez053@ikasle.ehu.eus</p>
        </div>
    </section>
</body>
</html>
