<?php

    session_start();

    header('X-Frame-Options: DENY');
    
    require('Database.php');
    $db = Database::getInstance();


    if(isset($_POST["car_id"])){
        $_SESSION["car_id"] = $_POST["car_id"];
    }

    $id = $_SESSION['car_id'];

    $datos = $db->obtener_datos_coche($id);

    $_SESSION['imagen'] = $datos['imagen'];

    $_SESSION['marca'] = $datos['marca'];
    $_SESSION['modelo'] = $datos['modelo'];
    $_SESSION['anno'] = $datos['anno'];
    $_SESSION['color'] = $datos['color'];
    $_SESSION['caballos'] = $datos['caballos'];
    $_SESSION['combustible'] = $datos['combustible'];
    $_SESSION['precio'] = $datos['precio'];
    $_SESSION['cambio'] = $datos['cambio'];
    $_SESSION['kilometros'] = $datos['kilometros'];


    //modificar esto:
    if(isset($_POST['submit'])){

        $hay_cambios = false;
        
        if(!empty($_POST['marca'])){
            $marca = $_POST['marca'];
            $hay_cambios = true;
        }else{
            $marca = $_SESSION['marca'];
        }

        if(!empty($_POST['modelo'])){
            $modelo = $_POST['modelo'];
            $hay_cambios = true;
        }else{
            $modelo = $_SESSION['modelo'];
        }

        if(!empty($_POST['anno'])){
            $anno = $_POST['anno'];
            $hay_cambios = true;
        }else{
            $anno = $_SESSION['anno'];
        }

        if(!empty($_POST['color'])){
            $color = $_POST['color'];
            $hay_cambios = true;
        }else{
            $color = $_SESSION['color'];
        }

        if (!empty($_POST['caballos'])) {
            $caballos = $_POST['caballos'];
            $hay_cambios = true;
        } else {
            $caballos = $_SESSION['caballos'];
        }

        if(!empty($_POST['combustible'])){
            $combustible = $_POST['combustible'];
            $hay_cambios = true;
        }else{
            $combustible = $_SESSION['combustible'];
        }

        if(!empty($_POST['precio'])){
            $precio = $_POST['precio'];
            $hay_cambios = true;
        }else{
            $precio = $_SESSION['precio'];
        }

        if(!empty($_POST['cambio'])){
            $cambio = $_POST['cambio'];
            $hay_cambios = true;
        }else{
            $cambio = $_SESSION['cambio'];
        }

        if(!empty($_POST['kilometros'])){
            $kilometros = $_POST['kilometros'];
            $hay_cambios = true;
        }else{
            $kilometros = $_SESSION['kilometros'];
        }


        if($hay_cambios){

            $sql = "UPDATE coches SET marca = '$marca' , modelo = '$modelo' , anno = '$anno' , color = '$color' , caballos = '$caballos' , combustible = '$combustible' , precio = '$precio' , cambio = '$cambio', kilometros = '$kilometros' WHERE id_coche = '$id'";
            $res = $db->modificar_datos_coche($sql);
            header('Location:catalogo.php');
        
        }else{
            header('Location:catalogo.php');
        }
    }
    if(isset($_POST['delete-submit'])){
        unset($_POST['delete-submit']);  
        $datos['id_coche'] = $_SESSION["car_id"];
        $error = $db->eliminar_coche($datos); 
        header('Location:catalogo.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifify Car - MotorCity Dealership</title>
    <link rel="stylesheet" href="/styles/modificar_coche.css"> <!-- Include your CSS file -->
    <link rel="stylesheet" href="/styles/nav-bar.css">
</head>
<body>
    <?php require_once("components/nav-bar.php")?>
    <header>
        <h1>Modificar Datos Coche</h1>
    </header> 

    <div class="register-container">

        <form method="POST" action="">

            <div class="form-item">
                <label for="marca">Marca:</label>
                <input type="text" name="marca" id="marca" value="<?= $_SESSION["marca"] ?>">
                <span id="errorMarca" class="error"></span>
            </div>

            <div class="form-item">
                <label for="modelo">Modelo:</label>
                <input type="text" name="modelo" id="modelo" value="<?= $_SESSION["modelo"] ?>">
                <span id="errorModelo" class="error"></span>
            </div>

            <div class="form-item">
                <label for="anno">Año:</label>
                <input type="number" name="anno" id="anno" value="<?= $_SESSION["anno"] ?>">
                <span id="errorAnno" class="error"></span>
            </div>

            <div class="form-item">
                <label for="color">Color:</label>
                <input type="text" name="color" id="color" value="<?= $_SESSION["color"] ?>">
                <span id="errorColor" class="error"></span>
            </div>

            <div class="form-item">
                <label for="caballos">Caballos:</label>
                <input type="text" name="caballos" id="caballos" value="<?= $_SESSION["caballos"] ?>">
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
                <input type="number" name="precio" id="precio" value="<?= $_SESSION["precio"] ?>">
                <span id="errorPrecio" class="error"></span>
            </div>

            <div class="form-item">
                <label for="cambio">Tipo de Cambio:</label>
                <select name="cambio" id="cambio">
                    <option value="Manual" <?= $_SESSION["cambio"] === 'Manual' ? 'selected' : '' ?>>Manual</option>
                    <option value="Automatico" <?= $_SESSION["cambio"] === 'Automatico' ? 'selected' : '' ?>>Automático</option>
                </select>
            </div>

            <div class="form-item">
                <label for="kilometros">Kilometros:</label>
                <input type="number" name="kilometros" id="kilometros" value="<?= $_SESSION["kilometros"] ?>">
                <span id="errorKilometros" class="error"></span>
            </div>

            <div class="buttons">
                <button id="button" type="submit" name="submit" onclick="$db->modificar_datos_coche($datos, $_SESSION['car_id'])">Guardar Cambios</button>
                
                <form id="deleteCarForm" action="" method="post" action="">
                    <button id="delete-button" type="submit" name="delete-submit">Borrar Coche</button>
                </form>



                <!--<form id="deleteCarForm" style="display: none;" method="POST" action="" onsubmit="return validar_y_eliminar()">
                    <label for="id_coche">ID del Coche:</label>
                    <input type="number" id="id_coche" name="id_coche" required>
                    <button type="submit" name="submit">Eliminar vehículo</button>
                </form> -->
            </div>
        </form>
    </div>

    <script defer src="scripts/forms2.js"></script>
    <script>
            document.getElementById("showFormButton").addEventListener("click", function() {
                const form = document.getElementById("deleteCarForm");
                form.style.display = form.style.display === "none" ? "block" : "none";
            });
    </script>
</body>
</html>