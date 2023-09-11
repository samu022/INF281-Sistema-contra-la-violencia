<?php
    session_start();

    if($_SESSION['privilegio'] == "usuario" || $_SESSION['privilegio'] == "")
    {
        header("Location: ../controlador/login.php");
    }
    include("../vista/dashboard_admin/head.php");
    include("../vista/dashboard_admin/sidebar.php");
    include("../vista/dashboard_admin/dashboard.php");

    include("../vista/dashboard_admin/footer.php");
?>
