<?php
include("../modelo/conexion.php");
$cod = $_GET['cod'];
include("../modelo/AgresorClase.php");
include("../modelo/PersonaClase.php");
include("../modelo/RealizaClase.php");
$carRealiza=new Realiza("",$cod,"","");
$resRealiza = $carRealiza->listaEspecifica();
include("../vista/Reporte_denuncias/AgresorInformacion.php");

?>

