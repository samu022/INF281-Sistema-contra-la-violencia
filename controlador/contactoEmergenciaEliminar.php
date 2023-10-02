<?php
     include("../modelo/conexion.php");
     include("../modelo/contactoEmergenciaClase.php");
     include("../modelo/tieneClase.php");
    
    session_start();
    $ci_usuario=$_SESSION['ci'];
    $ci_contacto=$_GET['ci_contacto'];
    $cargT=new Tiene($ci_usuario,"",$ci_contacto);
    $respT=$cargT->elimina();
    $cargC=new ContactoEmergencia($ci_contacto,"");
    $respC=$cargC->elimina();
    
        echo "<script>alert('Eliminación exitosa');</script>";
        header("Location: ../controlador/contactoEmergenciaLista.php");
    
?>