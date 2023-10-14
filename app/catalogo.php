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
    </header>

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
</body>
</html>

