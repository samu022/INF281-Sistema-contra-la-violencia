<?php

    session_start();
    
    if($_SESSION['privilegio'] == "usuario" || $_SESSION['privilegio'] == "")
    {
        header("Location: ../controlador/login.php");
    }

    include("../vista/dashboard_admin/head.php");
    include("../vista/dashboard_admin/sidebar.php");
    //incluimos modelo
    include("../modelo/administrador.php");
    $car=new Administrador("","","","","");
    $res=$car->lista();
    include("../vista/administradorLista.php");
    include("../vista/dashboard_admin/footer.php");
?>
