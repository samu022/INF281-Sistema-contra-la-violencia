<?php

    session_start();
    
    if($_SESSION['privilegio'] == "usuario" || $_SESSION['privilegio'] == "")
    {
        header("Location: ../controlador/login.php");
    }
    include("../modelo/conexion.php");
    include("../vista/dashboard_admin/head.php");
    include("../vista/dashboard_admin/sidebar.php");
    //incluimos modelo
    include("../modelo/usuarioClase.php");
    $car = new Usuario("", "", "", "");
    $res=$car->lista();
    include("../vista/usuarioLista.php");
    include("../vista/dashboard_admin/footer.php");
?>
