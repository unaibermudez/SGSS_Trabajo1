<?php
session_start();
require('Database.php');

$db = Database::getInstance();

// Llama al método para obtener los datos de los coches
$datos_coches = $db->obtener_datos_coches();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Coches</title>
    <link rel="stylesheet" href="/styles/catalogo.css">
    <link rel="stylesheet" href="/styles/nav-bar.css">
</head>
<body>
    <?php require_once("components/nav-bar.php")?>
    <header>
        <h1>Catálogo de Coches</h1>
        <a href="/registrarCoche.php" class="button">Modifica el Catalogo</a>
    </header>
    <?php
    // Incluir el archivo de la clase Database
    require('Database.php');

<<<<<<< HEAD
    <section class="car-cards">
        <?php
        foreach ($datos_coches as $coche) {
        ?>
        <div class="car-card">
            <div class="car-image">
                <img src="/images/car.jpg" alt="<?php echo $coche['modelo']; ?>">
            </div>
            <div class="car-info">
                <div class="car-title">
                    <h2><?php echo $coche['marca'] . ' ' . $coche['modelo'] . ' (' . $coche['anno'] . ')'; ?></h2>
                </div>
                <div class="car-price">
                    <p><?php echo $coche['precio'] . ' €'; ?>
                        <form action="datosCoche.php" method="POST">
                        <button id="button" type="submit" name="modificar">Mas Informacion</button>
                        </form>
                    </p>

                </div>
                <div class="car-details">
                    <table>
                        <tr>
                            <td><?php echo $coche['caballos'] . ' CV'; ?></td>
                            <td><?php echo $coche['kilometros'] . ' km'; ?></td>
                            <td><?php echo $coche['combustible']; ?></td>
                            <td><?php echo $coche['cambio']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </section>
=======
    // Crear una instancia de la clase Database
    $db = Database::getInstance(); 
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
>>>>>>> origin/peio
</body>
</html>

