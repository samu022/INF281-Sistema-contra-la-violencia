<?php
 
    
    //include("../modelo/conexion.php");
    //include("../modelo/administrador.php");
    //include("control_cookies.php");

    //include("../modelo/conexion.php");
    $cod = $_GET['cod'];
    $codDenunciante = $_GET['cod'];
    //include("../modelo/DenunciaClase.php");
    include("../modelo/GeoClase.php");

    $latitud =null;
    $longitud = null;
    $carDen=new Denuncia($cod,"","","","","","");
    $resDen = $carDen->lista_especifica();
    $reg = $resDen->fetch_assoc();
    $codGeo=$reg['codGeo'];
    $carGeo=new Geolocalizacion($codGeo,"","");
    $resGeo = $carGeo->lista_especifica();
    $regGeo = $resGeo->fetch_assoc();
    $latitud =$regGeo['latitud'];
    $longitud =$regGeo['longitud'];
    include("../vista/Reporte_denuncias/geolocalizacionModificar.php");
?>
