<?php
    session_start();
    $_SESSION['datosVictima'] = array();
    $_SESSION['datosAgresor'] =array();
    $_SESSION['datosPruebas'] = array();
    $_SESSION['latitud'] = null;
    $_SESSION['longitud'] = null;
    
    include("../vista/Reporte_denuncias/index.php");
    if(isset($_POST['RegistrarLey'])){
        if (isset($_POST['anonima'])) {
            // La casilla 'anonima' está marcada
            $anonima = true;
            $tes=$_POST['tes'];
        } else {
            // La casilla 'anonima' no está marcada
            $anonima = false;
        }
        $tipo=$_POST['tipo'];
        $des=$_POST['des'];
        $fechaActual = date("Y-m-d");
        
        //Antes de registrar denuncia necesitamos datos geo
        $latitud=$_SESSION['latitud'];
        $longitud=$_SESSION['longitud'];
        include("../modelo/GeoClase.php");
        $cargGeo=new Geolocalizacion("", $latitud, $longitud);
        $resgGeo=$cargGeo->grabarGeo();

        include("../modelo/DenunciaClase.php");
        $cargDen=new Denuncia("", $tipo, $des, $fechaActual,$tes,"En investigación",$cargGeo->getCodGeo());
        $resDen=$cargDen->grabarLey_Normativa();
        
         // Obtener los datos de las variables de sesión
         $datosVictima = isset($_SESSION['datosVictima']) ? $_SESSION['datosVictima'] : array();
         $datosAgresor = isset($_SESSION['datosAgresor']) ? $_SESSION['datosAgresor'] : array();
         $datosPrueba = isset($_SESSION['datosPrueba']) ? $_SESSION['datosPrueba'] : array();
         
         
         // Haz lo que necesites con estos datos
    }
 
       
    
?>