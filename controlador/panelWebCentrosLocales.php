<?php
//incluimos modelo
include("../modelo/conexion.php");
include("../modelo/CentroLocalClase.php");
$centro=new CentroLocal("","","","","","","");
if (isset($_POST["palabraClave"])) {
    $palabraClave = $_POST["palabraClave"];
    $res4 = $centro->buscarPorPalabraClave($palabraClave);
}
else{
    $res4 = $centro->lista();
}
?>