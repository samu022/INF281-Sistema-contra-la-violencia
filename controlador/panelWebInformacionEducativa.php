<?php
//incluimos modelo
include("../modelo/conexion.php");
include("../modelo/InformacionEducativaClase.php");
$informacion=new InformacionEducativa("","","","","","","");
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
else if (isset($_POST["palabraClave"])) {
    $palabraClave = $_POST["palabraClave"];
    $res2 = $informacion->buscarPorPalabraClave($palabraClave);
}
else{
    $res2 = $informacion->lista();
}
?>