<!DOCTYPE html>
<html lang="en">
<head>
    <title>MotorCity</title>
    <!-- Include your stylesheets -->
    <link rel="stylesheet" href="/styles/styles.css">
    
    <!-- Include any additional fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
</head>
<body>
   
    <!-- hola-->
    <!-- Incluimos la barra del menú -->
    <?php require_once("components/nav-bar.php")?>


    <!-- Define the structure of the homepage -->
    <section id="hero">
        <div id="hero-container">
            <h1>Welcome to MotorCity Dealership</h1>
            <p>Your Destination for Quality Cars</p>
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
            <h2>Sobre Nosotros</h2>
            <p>At MotorCity Dealership, we offer a wide range of high-quality vehicles to suit your needs. Whether you're looking for a new car, a used car, or reliable service, we've got you covered.</p>
        </div>
    </section>
    
    
</body>
</html>

