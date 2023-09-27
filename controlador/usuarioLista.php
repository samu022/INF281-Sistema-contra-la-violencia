<?php

    include("../modelo/conexion.php");
    include("../modelo/administrador.php");
    include("control_cookies.php");

    include("../vista/dashboard_admin/head.php");
    include("../vista/dashboard_admin/sidebar.php");
    //incluimos modelo
    include("../modelo/usuarioClase.php");
    $car = new Usuario("", "", "", "");
    $res=$car->lista();
    include("../vista/usuarioLista.php");
    include("../vista/dashboard_admin/footer.php");
?>
