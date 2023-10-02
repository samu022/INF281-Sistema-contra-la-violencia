<?php
    include("../modelo/tieneClase.php");
    include("../modelo/conexion.php");
    include("../modelo/contactoEmergenciaClase.php");

    session_start();
    $ci=$_SESSION['ci'];
    $carg=new Tiene($ci,"","");
    $res=$carg->listaEspecifica1();
    include("../vista/contactoEmergencia.php");
    /*$cargC=new ContactoEmergencia($ci_contacto,"");
    $resC=$cargC->listaEspecifica();
    // Supongamos que ya tienes una instancia de la clase Tiene llamada $tiene con los datos del contacto de emergencia.
    $parentescoContacto = $tiene->getParentescoContacto();
    $telefonoContacto = $tiene->getTelefonoContacto(); */
?>
