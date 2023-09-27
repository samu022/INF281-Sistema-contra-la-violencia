<?php

include("../modelo/conexion.php");
include("../modelo/administrador.php");
include("control_cookies.php");

//include("../modelo/conexion.php");
$cod = $_GET['cod'];
include("../modelo/DenunciaClase.php");
include("../modelo/GeoClase.php");
$carDen=new Denuncia($cod,"","","","","","");
$resDen = $carDen->lista_especifica();
// Comprobar si se encontraron víctimas
if ($resDen->num_rows > 0) {
    while ($rowDen = $resDen->fetch_assoc()) {
        $codGeo = $rowDen['codGeo'];
        $carGeo = new Geolocalizacion($codGeo, "", "");
        $resGeo = $carGeo->lista_especifica();
        $regGeo = $resGeo->fetch_assoc();
        $latitud = $regGeo['latitud'];
        $longitud = $regGeo['longitud'];
    }  
} else {
    echo "<div style='text-align: center;' class='alert alert-danger' role='alert'>";
    echo "<h3>No se encontro ubicación</h3></div>";
}
include("../vista/Reporte_denuncias/GeoInformacion.php");

    
   
?>

