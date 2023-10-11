<?php

include("../modelo/conexion.php");
include("../modelo/administrador.php");
include("control_cookies.php");
include("../modelo/DenunciaClase.php");
 include("../vista/dashboard_admin/head.php");
    include("../vista/dashboard_admin/sidebar.php");
    //include("../modelo/conexion.php");
    //incluimos modelo
    if (isset($_POST['denuncia_atendida']) && is_array($_POST['denuncia_atendida'])) {
        foreach ($_POST['denuncia_atendida'] as $codDenuncia) {
            $car0=new Denuncia($codDenuncia,"","","","","","");
            $change=$car0->ModificaSeguimiento("Finalizado");
        }
    }
    
    $car=new Denuncia("","","","","","","");
    $res=$car->lista();
    include("../vista/Reporte_denuncias/DenunciaLista.php");
    
?>
