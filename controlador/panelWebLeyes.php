<?php
//incluimos modelo
include("../modelo/conexion.php");
include("../modelo/Ley_NormativaClase.php");
$leyNormativa = new Ley_Normativa("","","","","");
if (isset($_POST['filtrarFecha'])) {
    //echo "estoy aqui";
    $fecha = $_POST['fecha'];
    //echo $tipoViolencia;
    $res3=$leyNormativa->filtrarFecha($fecha);
}
else if (isset($_POST["palabraClave"])) {
    $palabraClave = $_POST["palabraClave"];
    $res3 = $leyNormativa->buscarPorPalabraClave($palabraClave);
}
else{
    $res3 = $leyNormativa->lista();
}
?>