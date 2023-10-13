<link rel="stylesheet" href="/styles/nav-bar.css">
<?php
    session_start();

    // Inicializa $usuario_iniciado como false por defecto
    $usuario_iniciado = false;
    
    // Verifica si el usuario ha iniciado sesión
    if (isset($_SESSION["user"]) && $_SESSION["user"] === "yes") {
        $usuario_iniciado = true;
    }
    ?>
?>

<nav class="navbar">
    <div class="left-elements">
        <div class="logo">
            <a href="/" class="logo">
                    <img src="/images/logo-motorcity.svg" alt="MotorCity Logo">
            </a>
        </div>
        <ul class="menu">
            <li><a href="/catalogo.php" >Catálogo</a></li>
            <li><a href="/about.php" >Sobre Nosotros</a></li>
        </ul>
    </div>
    <div class="right-elements">
        <ul class="menu">
            <?php if ($usuario_iniciado): ?>
                    <!-- Mostrar nombre de usuario y enlace de cierre de sesión si el usuario ha iniciado sesión -->
                    <li  class="user-info"><a href="/perfil.php"><?= $_SESSION["username"] ?> </a></li>
                <?php else: ?>
                    <!-- Mostrar enlaces de inicio de sesión y registro si el usuario no ha iniciado sesión -->
                    <li><a href="login.php">Iniciar Sesión</a></li>
                    <li><a href="register.php">Registrarse</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

