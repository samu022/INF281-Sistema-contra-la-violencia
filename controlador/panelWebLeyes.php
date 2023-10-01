<?php
//incluimos modelo
include("../modelo/conexion.php");
include("../modelo/EventoClase.php");
include("../modelo/InformacionEducativaClase.php");
include("../modelo/Ley_NormativaClase.php");
include("../modelo/CentroLocalClase.php");
$informacion=new InformacionEducativa("","","","","","","");
$eventos=new Evento("","","","","","","","","","","","","");
$centro=new CentroLocal("","","","","","");
$leyNormativa = new Ley_Normativa("","","","","");
$res=$eventos->lista();
if (isset($_POST['filtrarFecha'])) {
    //echo "estoy aqui";
    $fecha = $_POST['fecha'];
    //echo $tipoViolencia;
    $res3=$leyNormativa->filtrarFecha($fecha);
}
else{
    $res3 = $leyNormativa->lista();
}
?>