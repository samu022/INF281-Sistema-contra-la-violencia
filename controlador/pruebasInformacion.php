<?php


include("../modelo/conexion.php");
    include("../modelo/administrador.php");
    include("control_cookies.php");


$cod = $_GET['cod'];
include("../modelo/PruebaClase.php");
include("../modelo/Incidente_PruebaClase.php");
$carIP=new Incidente_Prueba($cod,"");
$resIP = $carIP->lista_especifica();
include("../vista/Reporte_denuncias/PruebasInformacion.php");

?>

