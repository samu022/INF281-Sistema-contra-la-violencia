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
    $res=$car->lista1();
    include("../vista/Reporte_denuncias/DenunciaLista2.php");
    
?>
