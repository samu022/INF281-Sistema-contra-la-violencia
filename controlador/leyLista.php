<?php
session_start();
    
    if($_SESSION['privilegio'] == "usuario" || $_SESSION['privilegio'] == "")
    {
        header("Location: ../controlador/login.php");
    }
    include("../vista/dashboard_admin/head.php");
    include("../vista/dashboard_admin/sidebar.php");
    //incluimos modelo
    include("../modelo/Ley_NormativaClase.php");
    $car=new Ley_Normativa("","","","","");
    $res=$car->lista();
    include("../vista/LeyLista.php");
    include("../vista/dashboard_admin/footer.php");
?>
