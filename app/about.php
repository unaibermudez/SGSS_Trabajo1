<?php

ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_samesite', 'Strict');
    
    session_start();

    // Suprimir el encabezado X-Powered-By
    header_remove('X-Powered-By');
    header_remove('Server');
    header('X-Frame-Options: DENY');

    header('X-Content-Type-Options: nosniff');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; form-action 'self'; style-src 'self' https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com; script-src 'self' https://apis.google.com;">
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
