<?php
session_start();

header('Content-Type: text/html; charset=utf-8');
require('Database.php');
$db = Database::getInstance();

if(isset($_POST['submit'])){
        unset($_POST['submit']);
            
            $datos['id_coche'] = $_POST['id_coche'];
    
            $error = $db->eliminar_coche($datos); }?>
            
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
        <a href="/registrarCoche.php" class="button">Modifica el Catalogo</a>
    </header>

    <html>
<head>
    <title>Eliminar Coche</title>
</head>
<body>
    <h2>Eliminar Coche</h2>
    <button id="showFormButton">Mostrar Formulario</button>
    <form id="deleteCarForm" style="display: none;" method="POST" action="" onsubmit="return validar_y_eliminar()">
    <label for="id_coche">ID del Coche:</label>
    <input type="number" id="id_coche" name="id_coche" required>
    <button type="submit" name="submit">Eliminar vehículo</button>
</form>

    <div id="resultMessage"></div>

    <script src="forms2.js"></script>
</body>
</html>
    <?php
    
    $result= $db->obtener_coches();
    if ($result->num_rows > 0) {
        // Recorre los resultados y muestra las tarjetas de coches
        while ($row = $result->fetch_assoc()) {
            echo '<section class="car-cards">';
            echo '    <div class="car-card">';
            echo '        <div class="car-image">';
            echo '            <img src="' . $row["imagen"] . '" alt="' . $row["nombre"] . '">';
            echo '        </div>';
            echo '        <div class="car-info">';
            echo '            <div class="car-title">';
            echo '                <h2>' . $row["marca"] . ' ' . $row["modelo"] . '('. $row['anno'] . ')'. '</h2>';
            echo '            </div>';
            echo '            <div class="car-price">';
            echo '                <p>' . $row["precio"] . ' €</p>';
            echo '            </div>';
            echo '            <div class="car-details">';
            echo '                <table>';
            echo '                    <tr>';
            echo '                        <td>' . $row["caballos"] . ' CV</td>';
            echo '                        <td>' . $row["kilometros"] . ' km</td>';
            echo '                        <td>' . $row["combustible"] . '</td>';
            echo '                        <td>' . $row["cambio"] . '</td>';
            echo '                        <td>' . 'ID: '. $row["id_coche"] . '</td>';
            echo '                    </tr>';
            echo '                </table>';
            echo '            </div>';
            echo '        </div>';
            echo '    </div>';
            echo '</section>';
        }
    } else {
        echo "No se encontraron coches en la base de datos.";
    }
    ?>
 

<!-- Script para el desplazamiento suave -->
<script defer src="scripts/forms2.js"></script>
<script>
        document.getElementById("showFormButton").addEventListener("click", function() {
            const form = document.getElementById("deleteCarForm");
            form.style.display = form.style.display === "none" ? "block" : "none";
        });
    </script>
</body>
</html>

