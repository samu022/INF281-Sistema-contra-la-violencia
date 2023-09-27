<?php
//incluimos modelo
include("../modelo/conexion.php");
include("../modelo/EventoClase.php");
include("../modelo/InformacionEducativaClase.php");
include("../modelo/Ley_NormativaClase.php");
include("../modelo/CentroLocalClase.php");
$informacion=new InformacionEducativa("","","","","","","");
$eventos=new Evento("","","","","","","","","","","","","");
$centro=new CentroLocal("","","","","");
$leyNormativa = new Ley_Normativa("","","","","");
$res=$eventos->lista();
if (isset($_POST['filtrarInformacion'])) {
    //echo "estoy aqui";
    $tipoViolencia = $_POST['tipoViolencia'];
    //echo $tipoViolencia;
    $res2=$informacion->filtrarTipoViolencia($tipoViolencia);
}
else{
    $res2 = $informacion->lista();
}
$res3 = $leyNormativa->lista();
$res4 = $centro->lista();
?>