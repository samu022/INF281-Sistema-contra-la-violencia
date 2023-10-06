<?php
date_default_timezone_set("America/Bogota");
setlocale(LC_ALL,"es_ES");

include('../../modelo/conexion.php');
$conexion = new Conexion();

$codEvento   = $_POST['codEvento'];
$titulo      = ucwords($_POST['titulo']);
$horaInicio  = $_POST['horaInicio'];
$horaFinal   = $_POST['horaFinal'];

// Verifica si el campo de fecha no está vacío
if (!empty($_POST['fecha'])) {
    $fecha = date("Y-m-d", strtotime($_POST['fecha'])); // Formatea la fecha al formato de MySQL
    $UpdateProd = "UPDATE evento 
        SET titulo ='$titulo',
            fecha ='$fecha',
            horaInicio ='$horaInicio',
            horaFinal ='$horaFinal'
        WHERE codEvento='$codEvento'";
} else {
    $UpdateProd = "UPDATE evento 
        SET titulo ='$titulo',
            horaInicio ='$horaInicio',
            horaFinal ='$horaFinal'
        WHERE codEvento='$codEvento'";
}

$result = $conexion->query($UpdateProd);

// Verificar el resultado de la consulta y manejar errores si es necesario

// Redirigir o mostrar un mensaje de éxito

header("Location:calendario.php?ea=1");

?>