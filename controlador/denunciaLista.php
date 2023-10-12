<?php

include("../modelo/conexion.php");
include("../modelo/administrador.php");
include("control_cookies.php");
include("../modelo/DenunciaClase.php");
 include("../vista/dashboard_admin/head.php");
    include("../vista/dashboard_admin/sidebar.php");
    //include("../modelo/conexion.php");
    //incluimos modelo
    
    $car=new Denuncia("","","","","","","");
    if (isset($_POST['denuncia_atendida']) && is_array($_POST['denuncia_atendida'])) {
        foreach ($_POST['denuncia_atendida'] as $codDenuncia) {
            $car0=new Denuncia($codDenuncia,"","","","","","");
            $change=$car0->ModificaSeguimiento1("Finalizado");
        }
    }
    if(isset($_POST['filtrarFecha'])){
        //echo "estoy aqui";
        $fecha = $_POST['fecha'];
        //echo $fecha;
        $res=$car->filtrarFecha($fecha);
    }
    else if(isset($_POST['filtrarSeguimiento'])){
        //echo "estoy aqui";
        $seguimiento = $_POST['seguimiento'];
        //echo $fecha;
        $res=$car->filtrarSeguimiento($seguimiento);
    }
    else{
        $res=$car->lista();
    }
    
    include("../vista/Reporte_denuncias/DenunciaLista.php");
    
?>
