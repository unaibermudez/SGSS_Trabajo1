<?php
session_start();

header('Content-Type: text/html; charset=utf-8');
require('Database.php');
$db = Database::getInstance();

if(isset($_POST['submit'])){
    unset($_POST['submit']);

        $datos['imagen'] = "/images/coche-predeterminado.webp";
        $datos['marca'] = $_POST['marca'];
        $datos['modelo'] = $_POST['modelo'];
        $datos['precio'] = $_POST['precio'];
        $datos['color'] = $_POST['color'];
        $datos['kilometros'] = $_POST['kilometros'];
        $datos['cambio'] = $_POST['cambio'];
        $datos['anno'] = $_POST['anno'];
        $datos['combustible'] = $_POST['combustible'];
        $datos['caballos'] = $_POST['caballos'];
        // Luego, almacena $password en la base de datos
        
        $error = $db->registrar_coche($datos);

        if(!isset($error)){
            header('Location:catalogo.php');
        }

        // Hacemos algo con el error
        echo $error;
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

    <form method="POST" action="" onsubmit="validar_y_enviar_coches()">

        <div class="form-item">
            <label for="marca">Marca:</label>
            <input type="text" name="marca" id="marca" >
            <span id="errorMarca" class="error"></span>
        </div>

        <div class="form-item">
            <label for="modelo">Modelo:</label>
            <input type="text" name="modelo" id="modelo" >
            <span id="errorModelo" class="error"></span>
        </div>

        <div class="form-item">
            <label for="anno">Año:</label>
            <input type="int" name="anno" id="anno" >
            <span id="errorAnno" class="error"></span>
        </div>

        <div class="form-item">
            <label for="color">Color:</label>
            <input type="text" name="color" id="color" >
            <span id="errorColor" class="error"></span>
        </div>

        <div class="form-item">
            <label for="caballos">Caballos:</label>
            <input type="text" name="caballos" id="caballos" >
            <span id="errorCaballos" class="error"></span>
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
            <input type="text" name="precio" id="precio" >
            <span id="errorPrecio" class="error"></span>
        </div>

        <div class="form-item">
            <label for="kilometros">Kilometros:</label>
            <input type="text" name="kilometros" id="kilometros" >
            <span id="errorKilometros" class="error"></span>
        </div>

        <div class="form-item">
            <label for="cambio">Tipo de Cambio:</label>
            <select name="cambio" id="cambio">
                <option value="Manual" <?= $_SESSION["cambio"] === 'Manual' ? 'selected' : '' ?>>Manual</option>
                <option value="Automatico" <?= $_SESSION["cambio"] === 'Automatico' ? 'selected' : '' ?>>Automático</option>
            </select>
        </div>
        <!--
        <form action="process_form.php" method="post" enctype="multipart/form-data">
            <label for="image">Select an Image:</label>
            <input type="file" id="image" name="image" accept="image/*">
            <input type="submit" value="Upload">
        </form>
        -->

        <button id="button" type="submit" name="submit" onclick="validar_y_enviar_coches()">Añadir vehiculo</button>

    </form>
</div>
<script defer src="scripts/forms2.js"></script>
</body>
</html>