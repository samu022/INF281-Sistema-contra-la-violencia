<?php

    $cod=$_GET['cod'];
    //Primero eliminamos a las victimas
    include("../modelo/conexion.php");
    include("../modelo/PersonaClase.php");
    include("../modelo/VictimaClase.php");
    $carVictima=new Victima("","",$cod);
    $resVictima = $carVictima->elimina_victima_con_persona();
    //Ya se elimino Victimas Y personas
    //Ahora eliminamos Pruebas
    //include("../modelo/PruebaClase.php");
    include("../modelo/Incidente_PruebaClase.php");
    $carIP=new Incidente_Prueba($cod,"");
    $resIP = $carIP->eliminarIncidentePrueba_Prueba();
    //Agresor borramos
    include("../modelo/RealizaClase.php");
    $carRealiza=new Realiza("", $cod, "", "");
    $resRealiza = $carRealiza->eliminarRealizaAgresoresYPersonas();
    //Eliminamos denuncia y geo
    include("../modelo/DenunciaClase.php");
    $carDenuncia=new Denuncia($cod,"","","","","","");
    $resDenuncia = $carDenuncia->eliminaDenunciasYGeolocalizacion();
    echo "<script>alert('Se elimino correctamente');</script>";
    echo "<script>window.location.href='denunciaLista.php';</script>";

?>
