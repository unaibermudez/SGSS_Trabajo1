<?php
    session_start();

    header('X-Frame-Options: DENY');
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
<meta http-equiv="Content-Security-Policy" content="default-src 'self'; form-action 'self'; style-src 'self' https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com; script-src 'self' https://apis.google.com;">
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
                <div class="profile">
                    <img src="/images/foto-perfil.webp" alt="Profile Image">
                    <div class="user-info">
                        <p><strong>Username:</strong> <?php echo $datos['username']; ?></p>
                        <p><strong>Nombre y Apellidos:</strong> <?php echo $datos['nombre_apellidos']; ?></p>
                        <p><strong>DNI:</strong> <?php echo $datos['dni']; ?></p>
                        <p><strong>Teléfono:</strong> <?php echo $datos['telf']; ?></p>
                        <p><strong>Fecha de Nacimiento:</strong> <?php echo $datos['fecha_nacimiento']; ?></p>
                        <p><strong>Email:</strong> <?php echo $datos['email']; ?></p>
                    </div>
                </div>

                <div class="buttons">
                    <form action="modificarUsuario.php" method="POST">
                        <button id="modify-button" type="submit" name="modificar">Modificar Datos</button>
                    </form>
                    <form action="logout.php" method="post">
                        <button id="logout-button" type="submit" name="submit">Cerrar Sesion</button>
                    </form>
                </div>
       
            <?php endif; ?>
        </div>
    </section>
</body>
</html>
