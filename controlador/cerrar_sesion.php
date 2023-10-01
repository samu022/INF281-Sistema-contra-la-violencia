<?php
// Borrar todas las cookies existentes
if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000); // Establece una fecha de caducidad en el pasado
        setcookie($name, '', time()-1000, '/'); // Establece una fecha de caducidad en el pasado con la misma ruta
    }
}

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
