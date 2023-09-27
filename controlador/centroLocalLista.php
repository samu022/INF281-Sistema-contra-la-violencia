<?php
    include("../modelo/conexion.php");
    include("../modelo/administrador.php");
    include("control_cookies.php");

    include("../vista/dashboard_admin/head.php");
    include("../vista/dashboard_admin/sidebar.php");
    //incluimos modelo
    include("../modelo/CentroLocalClase.php");
    //include("../modelo/conexion.php");
    $car=new CentroLocal("","","","","");
    $res=$car->lista();
    include("../vista/CentroLocalLista.php");
    include("../vista/dashboard_admin/footer.php");
?>
