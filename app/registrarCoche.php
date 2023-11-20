<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
require('Database.php');
$db = Database::getInstance();

function sanitizeInput($data) {
    // Utiliza filter_var con FILTER_SANITIZE_STRING para limpiar las cadenas
    return filter_var($data, FILTER_SANITIZE_STRING);
}

function validateInt($data) {
    // Validación específica para enteros
    return filter_var($data, FILTER_VALIDATE_INT);
}

if(isset($_POST['submit'])){
    unset($_POST['submit']);

    // Sanitiza todos los datos de entrada
    $datos['imagen'] = "/images/coche-predeterminado.webp";
    $datos['marca'] = sanitizeInput($_POST['marca']);
    $datos['modelo'] = sanitizeInput($_POST['modelo']);
    $datos['precio'] = sanitizeInput($_POST['precio']);
    $datos['color'] = sanitizeInput($_POST['color']);
    $datos['kilometros'] = sanitizeInput($_POST['kilometros']);
    $datos['cambio'] = sanitizeInput($_POST['cambio']);

    // Validar datos numéricos
    $datos['anno'] = filter_var($_POST['anno'], FILTER_VALIDATE_INT);
    $datos['caballos'] = filter_var($_POST['caballos'], FILTER_VALIDATE_INT);

    // Verificar si la validación fue exitosa
    if ($datos['anno'] === false || $datos['anno'] === null) {
        // Manejar el error para 'anno'
    }

    if ($datos['caballos'] === false || $datos['caballos'] === null) {
    // Manejar el error para 'caballos'
    }


    // Luego, almacena $password en la base de datos
    $error = $db->registrar_coche($datos);

    if(!isset($error)){
        header('Location:catalogo.php');
        exit();
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
    <meta http-equiv="Content-Security-Policy" content="frame-ancestors 'none';">
    <title>Registrar Coche</title>
    <link rel="stylesheet" href="/styles/register.css">  <!-- Incluye tu archivo CSS para el estilo -->
</head>
<body>

<?php require_once("components/nav-bar.php")?>

<div class="register-container">
    <h1>Añadir Coche</h1>

    <form method="POST" action="" onsubmit="return validar_y_enviar_coches()">

        <div class="form-item">
            <label for="marca">Marca:</label>
            <input type="text" name="marca" id="marca" value="<?php echo isset($_POST['marca']) ? htmlspecialchars($_POST['marca']) : ''; ?>">
            <span id="errorMarca" class="error"></span>
        </div>

        <div class="form-item">
            <label for="modelo">Modelo:</label>
            <input type="text" name="modelo" id="modelo" value="<?php echo isset($_POST['modelo']) ? htmlspecialchars($_POST['modelo']) : ''; ?>">
            <span id="errorModelo" class="error"></span>
        </div>

        <div class="form-item">
            <label for="anno">Año:</label>
            <input type="number" name="anno" id="anno" value="<?php echo isset($_POST['anno']) ? htmlspecialchars($_POST['anno']) : ''; ?>">
            <span id="errorAnno" class="error"></span>
        </div>

        <div class="form-item">
            <label for="color">Color:</label>
            <input type="text" name="color" id="color" value="<?php echo isset($_POST['color']) ? htmlspecialchars($_POST['color']) : ''; ?>">
            <span id="errorColor" class="error"></span>
        </div>

        <div class="form-item">
            <label for="caballos">Caballos:</label>
            <input type="number" name="caballos" id="caballos" value="<?php echo isset($_POST['caballos']) ? htmlspecialchars($_POST['caballos']) : ''; ?>">
            <span id="errorCaballos" class="error"></span>
        </div>

        <div class="form-item">
            <label for="combustible">Combustible:</label>
            <select name="combustible" id="combustible">
                <option value="Gasolina" <?php echo (isset($_POST['combustible']) && $_POST['combustible'] === 'Gasolina') ? 'selected' : ''; ?>>Gasolina</option>
                <option value="Diesel" <?php echo (isset($_POST['combustible']) && $_POST['combustible'] === 'Diesel') ? 'selected' : ''; ?>>Diesel</option>
                <option value="Hibrido" <?php echo (isset($_POST['combustible']) && $_POST['combustible'] === 'Hibrido') ? 'selected' : ''; ?>>Híbrido</option>
                <option value="Electrico" <?php echo (isset($_POST['combustible']) && $_POST['combustible'] === 'Electrico') ? 'selected' : ''; ?>>Eléctrico</option>
            </select>
        </div>

        <div class="form-item">
            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" value="<?php echo isset($_POST['precio']) ? htmlspecialchars($_POST['precio']) : ''; ?>">
            <span id="errorPrecio" class="error"></span>
        </div>

        <div class="form-item">
            <label for="kilometros">Kilometros:</label>
            <input type="number" name="kilometros" id="kilometros" value="<?php echo isset($_POST['kilometros']) ? htmlspecialchars($_POST['kilometros']) : ''; ?>">
            <span id="errorKilometros" class="error"></span>
        </div>

        <div class="form-item">
            <label for="cambio">Tipo de Cambio:</label>
            <select name="cambio" id="cambio">
                <option value="Manual" <?php echo (isset($_POST['cambio']) && $_POST['cambio'] === 'Manual') ? 'selected' : ''; ?>>Manual</option>
                <option value="Automatico" <?php echo (isset($_POST['cambio']) && $_POST['cambio'] === 'Automatico') ? 'selected' : ''; ?>>Automático</option>
            </select>
        </div>

        <button id="button" type="submit" name="submit" onclick="return validar_y_enviar_coches()">Añadir vehiculo</button>

    </form>
</div>

<!-- Incluir tu script JavaScript -->
<script defer src="scripts/forms2.js"></script>
</body>
</html>
