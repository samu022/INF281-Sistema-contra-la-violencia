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
if(isset($_POST['filtrarTipoViolencia'])){
    //echo "estoy aqui";
    $tipoViolencia = $_POST['tipoViolencia'];
    //echo $tipoViolencia;
    if($tipoViolencia=="Todos"){
        $res=$eventos->lista();
    }
    else{
        $res=$eventos->filtrarTipoViolencia($tipoViolencia);
    }
}
else if(isset($_POST['filtrarFecha'])){
    //echo "estoy aqui";
    $fecha = $_POST['fecha'];
    //echo $tipoViolencia;
    $res=$eventos->filtrarFecha($fecha);
}
else{
    $res=$eventos->lista();
}
?>