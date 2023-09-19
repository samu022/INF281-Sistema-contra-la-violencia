<?php

include("../modelo/conexion.php");
$cod = $_GET['cod'];
include("../modelo/DenunciaClase.php");
$car = new Denuncia($cod, "", "", "", "","","");
$res = $car->lista_especifica();
$reg = $res->fetch_assoc();
$tipo = $reg['tipo'];
$descripcion = $reg['descripcion'];
$testigo = $reg['testigo'];
$seguimiento = $reg['seguimiento'];
$fecha = $reg['fecha'];
include("../vista/Reporte_denuncias/DenunciaInformacion.php");
?>

