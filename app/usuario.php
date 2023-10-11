<?php
    session_start();
    require('Database.php');
    $db = Database::getInstance();

    $usuario_iniciado = false;
    
    // Verifica si el usuario ha iniciado sesión
    if (isset($_SESSION["user"]) && $_SESSION["user"] === "yes") {
        $usuario_iniciado = true;
        
    }

    $id = $_SESSION['username'];
    $datos = $db->obtener_datos_usuario($id);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User - MotorCity Dealership</title>
    <link rel="stylesheet" href="/styles/usuario.css"> <!-- Include your CSS file -->
    <link rel="stylesheet" href="/styles/nav-bar.css">
</head>
<body>
    <?php require_once("components/nav-bar.php")?>
    <header>
        <h1>Datos del Usuario</h1>
    </header>
    <section class="datos">
        <div class="vista">
            <?php if ($usuario_iniciado): ?>
                <img src="/images/foto-perfil.webp">
                <p>Username: <?php echo $datos['username']; ?></p>
                <p>Nombre y Apellidos: <?php echo $datos['nombre_apellidos']; ?></p>
                <p>DNI: <?php echo $datos['dni']; ?></p>
                <p>Teléfono: <?php echo $datos['telf']; ?></p>
                <p>Fecha de Nacimiento: <?php echo $datos['fecha_nacimiento']; ?></p>
                <p>Email: <?php echo $datos['email']; ?></p>
                <p></p>
                <form action="modificar.php" method="POST">
                    <button id="button" type="submit" name="modificar">Modificar Datos</button>
                </form>
                <p></p>
                <form action="logout.php" method="post">
                    <button id="button" type="submit" name="submit">Cerrar Sesion</button>
                </form>            
            <?php endif; ?>
        </div>
    </section>
</body>
</html>
