<?php
date_default_timezone_set("America/La_Paz");
setlocale(LC_ALL,"es_ES");

include('../../modelo/conexion.php');
$conexion = new Conexion();
                        
$codEvento = $_POST['codEvento'];
$fecha     = $_POST['fecha'];

$UpdateProd = "UPDATE evento 
    SET fecha = '$fecha'
    WHERE codEvento = '$codEvento'";
$result = $conexion->query($UpdateProd);

// Verificar el resultado de la consulta y manejar errores si es necesario

// Redirigir o mostrar un mensaje de éxito

?>