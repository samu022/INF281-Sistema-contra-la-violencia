<?php
//incluimos modelo
include("../modelo/conexion.php");
include("../modelo/EventoClase.php");
$eventos=new Evento("","","","","","","","","","","","","");
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
    //echo $fecha;
    $res=$eventos->filtrarFecha($fecha);
}
else if(isset($_POST['filtrarFechaPublicacion'])){
    //echo "estoy aqui";
    $fecha = $_POST['fecha'];
    //echo $fecha;
    $res=$eventos->filtrarFechaPublicacion($fecha);
}
else if (isset($_POST["palabraClave"])) {
    
    $palabraClave = $_POST["palabraClave"];
    // Campos en los que deseas buscar
    $camposBuscar = ["titulo", "descripcion", "tipoViolencia", "tipo", "detalleEvento", "expositor"];
    // Llama al método buscarPorPalabraClave del modelo para realizar la búsqueda
    $res = $eventos->buscarPorPalabraClave($palabraClave, $camposBuscar);
}
else{
    $res=$eventos->lista();
}
?>