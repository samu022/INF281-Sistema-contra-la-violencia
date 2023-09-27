<?php
// Iniciar la sesión
session_start();

// Eliminar todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redirigir al usuario a la página de inicio de sesión u otra página
header("Location: login.php"); // Cambia "login.php" al archivo al que deseas redirigir al usuario
exit(); // Asegura que no se ejecute más código después de la redirección
?>
