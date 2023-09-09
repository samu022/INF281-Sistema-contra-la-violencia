<?php
    include("../vista/Reporte_denuncias/geolocalizacion.php");
    
    // Definir variables para almacenar las coordenadas de latitud y longitud
    $latitud = null;
    $longitud = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener las coordenadas de latitud y longitud desde la solicitud POST
        $latitud = $_POST['latitud'];
        $longitud = $_POST['longitud'];

        
    }
?>
