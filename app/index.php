<?php
session_start();
header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: DENY");
header('Content-Type: text/html; charset=utf-8');
header("Content-Security-Policy: default-src 'self'; frame-ancestors 'none'; font-src fonts.gstatic.com 'unsafe-inline'; style-src 'self' fonts.googleapis.com 'unsafe-inline'; script-src 'self' 'unsafe-inline'; connect-src 'self';");

// You can include additional PHP code here as needed.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Dealership</title>
    <link rel="icon" href="/images/car.ico">
    
    <!-- Include your stylesheets -->
    <<link rel="stylesheet" href="/styles/styles.css">

    <!-- Include any additional fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Include the navigation bar -->
    

    <!-- Define the structure of the homepage -->
    <section id="hero">
        <div id="hero-container">
            <h1>Welcome to XYZ Car Dealership</h1>
            <p>Your Destination for Quality Cars</p>
            <a href="/inventory" class="button">View Our Inventory</a>
        </div>
    </section>

    
    <section id="services">
        <div class="content">
            <h2>Our Services</h2>
            <ul>
                <li>New Car Sales</li>
                <li>Used Car Sales</li>
                <li>Car Financing</li>
                <li>Car Maintenance & Repairs</li>
            </ul>
        </div>
    </section>
    
    <section id="about">
        <div class="content">
            <h2>About Us</h2>
            <p>At XYZ Car Dealership, we offer a wide range of high-quality vehicles to suit your needs. Whether you're looking for a new car, a used car, or reliable service, we've got you covered.</p>
        </div>
    </section>
    

    
</body>
</html>
