<?php

    include("../modelo/conexion.php");
    include("../modelo/administrador.php");
    include("control_cookies.php");

$cod = $_GET['cod'];
include("../modelo/AgresorClase.php");
include("../modelo/PersonaClase.php");
include("../modelo/RealizaClase.php");
$carRealiza=new Realiza("",$cod,"","");
$resRealiza = $carRealiza->listaEspecifica();
//$regRealiza=$resRealiza->fetch_assoc();
//echo $regRealiza['codDenuncia'];
include("../vista/Reporte_denuncias/AgresorInformacion.php");

?>

