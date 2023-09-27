<?php

    include("../modelo/conexion.php");
    include("../vista/dashboard_admin/head.php");
    include("../vista/dashboard_admin/sidebar.php");
    //incluimos modelo
    include("../modelo/administrador.php");
    $car=new Administrador("","","","","");
    $res=$car->lista();
    //$res_roles = $car->getroles();
    //echo $res_roles;
    include("../vista/administradorLista.php");
    include("../vista/dashboard_admin/footer.php");
?>
