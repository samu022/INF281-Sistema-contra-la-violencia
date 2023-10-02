<?php
    include("../modelo/conexion.php");
    include("../modelo/contactoEmergenciaClase.php");
    include("../modelo/tieneClase.php");
    //include("../vista/contactoEmergenciaRegistro.php");

    session_start();
    $ci_contacto=$_GET['ci_contacto'];
    $ci=$_SESSION['ci'];
    $carC=new ContactoEmergencia($ci_contacto,"");
    $carT=new Tiene($ci,"",$ci_contacto);
    $resp1=$carC->listaEspecifica();
    $rowC = mysqli_fetch_assoc($resp1);

    $resp2=$carT->listaEspecifica();
    $rowT = mysqli_fetch_assoc($resp2);
    $ci_contacto = $rowT['ci_contacto'];
    $parentesco = $rowT['parentesco'];
    $telefono = $rowC['telefono'];
    $ci_usuario = $rowT['ci_usuario'];
    include("../vista/contactoEmergenciaModificar.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $parentesco = $_POST['parentesco'];
        $telefono = $_POST['telefono'];
        $carC1=new ContactoEmergencia($ci_contacto,$telefono);
        $carT1=new Tiene($ci,$parentesco,$ci_contacto);
        $respChange=$carC1->modifica();
        $respChange2=$carT1->modifica();
        header("Location: ../controlador/contactoEmergenciaLista.php");
    }
?>