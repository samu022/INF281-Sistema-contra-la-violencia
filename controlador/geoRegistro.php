<?php


    include("../modelo/conexion.php");
    include("../modelo/administrador.php");
    include("control_cookies.php");

//session_start();
include("../vista/Reporte_denuncias/geolocalizacion.php");

// Definir variables para almacenar las coordenadas de latitud y longitud
if (!isset($_SESSION['latitud'])) {
    $_SESSION['latitud'] = null;
}

if (!isset($_SESSION['longitud'])) {
    $_SESSION['longitud'] = null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener las coordenadas de latitud y longitud desde la solicitud POST
    $_SESSION['latitud'] = $_POST['latitud'];
    $_SESSION['longitud'] = $_POST['longitud'];
    //echo "<p>".$_POST['latitud']."</p>";
}
?>
