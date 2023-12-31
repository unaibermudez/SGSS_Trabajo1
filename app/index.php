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
<meta http-equiv="Content-Security-Policy" content="default-src 'self'; form-action 'self'; style-src 'self' https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com; script-src 'self' https://apis.google.com;">
    <title>MotorCity</title>
    <!-- Include your stylesheets -->
    <link rel="stylesheet" href="/styles/styles.css">
    <!-- Include any additional fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" >

</head>
<body>
   
    <!-- Incluimos la barra del menú -->
    <?php require_once("components/nav-bar.php")?>

    <section id="hero">
        <div id="hero-container">
            <h1>Welcome to MotorCity Dealership</h1>
            <p>Tu concesionario de confianza para vehiculos de calidad</p>
            <a href="/catalogo.php" class="button">Explora nuestro catálogo</a>
        </div>
    </section>
    
    <section id="services">
        <div class="content">
            <h2>Nuestros Servicios</h2>
            <ul>
                <li>Vehiculos Nuevos</li>
                <li>Vehiculos de Ocasión</li>
                <li>Financiación</li>
                <li>Mantenimiento & Reparaciones</li>
            </ul>
        </div>
    </section>
    
    <section id="about">
    <div class="content">
        <h2>Más Sobre Motorcity</h2>
        <div class="social-icons">
            <a href="https://www.linkedin.com" target="_blank"><img src="/images/linkedin.svg" alt="LinkedIn" width="40" height="40"></a>
            <a href="https://www.youtube.com" target="_blank"><img src="/images/youtube.svg" alt="YouTube" width="40" height="40"></a>
            <a href="https://www.instagram.com" target="_blank"><img src="/images/instagram.svg" alt="Instagram" width="40" height="40"></a>
            <a href="https://www.facebook.com" target="_blank"><img src="/images/facebook.svg" alt="Facebook" width="40" height="40"></a>
            <a href="https://twitter.com" target="_blank"><img src="/images/twitter.svg" alt="Twitter" width="40" height="40"></a>
        </div>
    </div>
    </section>    
</body>
</html>

