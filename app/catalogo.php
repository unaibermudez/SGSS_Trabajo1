<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Coches</title>
    <link rel="stylesheet" href="/styles/catalogo.css"> <!-- Include your CSS file -->
    <link rel="stylesheet" href="/styles/nav-bar.css">

</head>
<body>
    <!-- Incluimos la barra del menú -->
    <?php require_once("components/nav-bar.php")?>
    <!-- Header -->
    <header>
        <h1>Catálogo de Coches</h1>
    </header>

     <!-- Car Cards Section -->
    <section class="car-cards">
        <!-- Car Card 1 -->
        <div class="car-card">
            <div class="car-image">
                <img src="/images/car1.jpg" alt="Car 1">
            </div>
            <div class="car-info">
                <div class="car-title">
                    <h2> Nombre & Año</h2>
                </div>
                <div class="car-price">
                    <p>25,000 €</p>
                </div>
                <div class="car-details">
                    <table>
                        <tr>
                            <td>150 CV</td>
                            <td>10,000 km</td>
                            <td>Gasolina</td>
                            <td>Manual</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        
    </section>

</body>
</html>
