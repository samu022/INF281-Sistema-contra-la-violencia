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
if (isset($_POST['filtrarInformacion'])) {
    //echo "estoy aqui";
    $tipoViolencia = $_POST['tipoViolencia'];
    //echo $tipoViolencia;
    if($tipoViolencia=="Todos"){
        $res2 = $informacion->lista();
    }
    else{
        $res2=$informacion->filtrarTipoViolencia($tipoViolencia);
    }
}
else if(isset($_POST['filtrarFecha'])){
    //echo "estoy aqui";
    $fecha = $_POST['fecha'];
    //echo $fecha;
    $res2=$informacion->filtrarFecha($fecha);
}
else{
    $res2 = $informacion->lista();
}
?>