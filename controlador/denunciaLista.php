<?php
session_start();
    
    if($_SESSION['privilegio'] == "usuario" || $_SESSION['privilegio'] == "")
    {
        header("Location: ../controlador/login.php");
    }
    include("../modelo/conexion.php");
    //incluimos modelo
    include("../modelo/DenunciaClase.php");
    $car=new Denuncia("","","","","","","");
    $res=$car->lista();
    include("../vista/Reporte_denuncias/DenunciaLista.php");
    
?>
