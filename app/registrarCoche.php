<?php
session_start();

header('Content-Type: text/html; charset=utf-8');
require('Database.php');
$db = Database::getInstance();

if(isset($_POST['submit'])){
    unset($_POST['submit']);
        
        $datos['imagen']= "/images/coche-predeterminado.webp";
        $datos['marca'] = $_POST['marca'];
        $datos['modelo'] = $_POST['modelo'];
        $datos['anno'] = $_POST['anno'];
        $datos['color'] = $_POST['color'];
        $datos['caballos'] = $_POST['caballos'];
        $datos['combustible'] = $_POST['combustible'];
        $datos['precio'] = $_POST['precio'];
        $datos['kilometros'] = $_POST['kilometros'];
        $datos['cambio'] = $_POST['cambio'];

        $coche_añadido_con_exito = $db->registrar_coche($datos); }
        if($coche_añadido_con_exito){
            header('Location: catalogo.php'); 
        }
        

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Coche</title>
    <link rel="stylesheet" href="/styles/register.css">  <!-- Include your CSS file for styling -->
</head>
<body>

<?php require_once("components/nav-bar.php")?>

<div class="register-container">
    <h1>Añadir Coche</h1>

    <form method="POST" action="">

        <div class="form-item">
            <label for="marca">Marca:</label>
            <input type="text" name="marca" id="marca" required>
        </div>

        <div class="form-item">
            <label for="modelo">Modelo:</label>
            <input type="text" name="modelo" id="modelo" required>
        </div>

        <div class="form-item">
            <label for="anno">Año:</label>
            <input type="int" name="anno" id="anno" required>
        </div>

        <div class="form-item">
            <label for="color">Color:</label>
            <input type="text" name="color" id="color" required>
        </div>

        <div class="form-item">
            <label for="caballos">Caballos:</label>
            <input type="text" name="caballos" id="caballos" required>
        </div>

        <div class="form-item">
            <label for="combustible">Combustible:</label>
            <select name="combustible" id="combustible">
                <option value="Gasolina" <?= $_SESSION["combustible"] === 'Gasolina' ? 'selected' : '' ?>>Gasolina</option>
                <option value="Diesel" <?= $_SESSION["combustible"] === 'Diesel' ? 'selected' : '' ?>>Diesel</option>
                <option value="Hibrido" <?= $_SESSION["combustible"] === 'Hibrido' ? 'selected' : '' ?>>Hibrido</option>
                <option value="Electrico" <?= $_SESSION["combustible"] === 'Electrico' ? 'selected' : '' ?>>Electrico</option>
            </select>
        </div>

        <div class="form-item">
            <label for="precio">Precio:</label>
            <input type="text" name="precio" id="precio" required>
        </div>

        <div class="form-item">
            <label for="kilometros">Kilometros:</label>
            <input type="text" name="kilometros" id="kilometros" required>
        </div>

        <div class="form-item">
            <label for="cambio">Cambio:</label>
            <select>
                <option value="Manual">Manual</option>
                <option value="Automático">Automático</option>
            </select>
        </div>
        <!--
        <form action="process_form.php" method="post" enctype="multipart/form-data">
            <label for="image">Select an Image:</label>
            <input type="file" id="image" name="image" accept="image/*">
            <input type="submit" value="Upload">
        </form>
        -->

        <button id="button" type="submit" name="submit">Añadir vehiculo</button>

    </form>
</div>
<script defer src="scripts/forms2.js"></script>
</body>
</html>