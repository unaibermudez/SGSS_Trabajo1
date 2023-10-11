<?php
// Iniciar sesión (debes haber iniciado sesión previamente en otras partes del sitio)
session_start();

// Destruir la sesión actual
session_destroy();

// Redirigir a la página de inicio o a donde desees después de cerrar sesión
header("Location: index.php"); // Cambia "index.php" por la página de inicio adecuada
exit;
?>
