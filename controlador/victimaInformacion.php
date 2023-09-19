<?php


include("../modelo/conexion.php");
$cod = $_GET['cod'];
include("../modelo/VictimaClase.php");
include("../modelo/PersonaClase.php");
$carVictima=new Victima("","",$cod);
$resVictima = $carVictima->lista_especifica_denuncia();
include("../vista/Reporte_denuncias/VictimaInformacion.php");
/*$carPer = new Persona("", "", "", "", "","","","","","");
$resPer = $carPer->lista_especifica();
$regPer = $resPer->fetch_assoc();
$tipo = $reg['tipo'];
$descripcion = $reg['descripcion'];
$testigo = $reg['testigo'];
$seguimiento = $reg['seguimiento'];
$fecha = $reg['fecha'];
include("../vista/Reporte_denuncias/DenunciaInformacion.php");*/
?>

