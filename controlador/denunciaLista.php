<?php

include("../modelo/conexion.php");
include("../modelo/administrador.php");
include("control_cookies.php");

 include("../vista/dashboard_admin/head.php");
    include("../vista/dashboard_admin/sidebar.php");
    //include("../modelo/conexion.php");
    //incluimos modelo
    include("../modelo/DenunciaClase.php");
    $car=new Denuncia("","","","","","","");
    $res=$car->lista();
    include("../vista/Reporte_denuncias/DenunciaLista.php");
    
?>
