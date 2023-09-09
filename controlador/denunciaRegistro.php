<?php
    session_start();
    
    include("../modelo/conexion.php");
    
    
    include("../vista/Reporte_denuncias/index.php");
    if(isset($_POST['RegistrarDenuncia'])){
        $tes="";
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
        $resDen=$cargDen->grabarDenuncia();
        //Registramos a victima
        
        $datosVictima = isset($_SESSION['datosVictima']) ? $_SESSION['datosVictima'] : array();
        // Verificar si hay datos en la sesión
       /* if (!empty($datosVictima)) {
            // Iterar a través de cada fila
            foreach ($datosVictima as $victima) {
                // Acceder a los valores de cada fila
                $ci = $victima['ci'];
                $nombres = $victima['nombres'];
                $apellidoP = $victima['apellidoP'];
                $apellidoM = $victima['apellidoM'];
                $fechaNacimiento = $victima['fechaNacimiento'];
                $sexo = $victima['sexo'];
                $direccion = $victima['direccion'];
                $estadoCivil = $victima['estado_civil'];
                $profesion = $victima['profesion'];
                $telefono = $victima['telefono'];
                $relacion = $victima['relacion'];

                //Registramos en persona y victima
                include("../modelo/PersonaClase.php");
                $cargPersona=new Persona($ci, $nombres, $apellidoP, $apellidoM, $fechaNacimiento, $sexo, $direccion, $estadoCivil, $profesion,$telefono);
                $resPersona=$cargPersona->grabarPersona();
                include("../modelo/VictimaClase.php");
                $cargVictima=new Victima($ci, $relacion, $cargDen->getCodDenuncia());
                $resVictima=$cargVictima->grabarVictima();
            }
        } else {
            echo "No hay datos de víctimas en la sesión.";
        }
        $datosAgresor = isset($_SESSION['datosAgresor']) ? $_SESSION['datosAgresor'] : array();
        //DATOS DEL AGRESOR CARGA

        // Verificar si hay datos en la sesión
        if (!empty($datosAgresor)) {
            // Iterar a través de cada fila
            foreach ($datosAgresor as $agresor) {
                // Acceder a los valores de cada fila
                $ci = $agresor['ci'];
                $nombres = $agresor['nombres'];
                $apellidoP = $agresor['apellidoP'];
                $apellidoM = $agresor['apellidoM'];
                $fechaNacimiento = $agresor['fechaNacimiento'];
                $sexo = $agresor['sexo'];
                $direccion = $agresor['direccion'];
                $estadoCivil = $agresor['estado_civil'];
                $profesion = $agresor['profesion'];
                $telefono = $agresor['telefono'];
                $descripcion = $agresor['descripcion'];
        
                 //Registramos en persona y agresor
                 include("../modelo/PersonaClase.php");
                 $cargPersona=new Persona($ci, $nombres, $apellidoP, $apellidoM, $fechaNacimiento, $sexo, $direccion, $estadoCivil, $profesion,$telefono);
                 $resPersona=$cargPersona->grabarPersona();
                 include("../modelo/AgresorClase.php");
                 $cargAgresor=new Agresor($ci, $descripcion);
                 $resAgresor=$cargAgresor->grabarAgresor();
            }
        } else {
            echo "No hay datos de agresores en la sesión.";
        }
        
        $datosPrueba = isset($_SESSION['datosPrueba']) ? $_SESSION['datosPrueba'] : array();
        $datosPrueba = isset($_SESSION['datosPrueba']) ? $_SESSION['datosPrueba'] : array();

        // Verificar si hay datos en la sesión
        if (!empty($datosPrueba)) {
            // Iterar a través de cada fila
            foreach ($datosPrueba as $prueba) {
                // Acceder a los valores de cada fila
                $rutaArchivo = $prueba['rutaArchivo'];
                $descripcion = $prueba['descripcion'];
                $tipoArchivo = $prueba['tipoArchivo'];
        
                //cargamos pruebas a bd
                include("../modelo/PruebaClase.php");
                $cargPrueba=new Prueba("", $tipoArchivo, $descripcion, $rutaArchivo);
                $resPrueba=$cargPrueba->grabarPrueba();
                include("../modelo/Incidente_PruebaClase.php");
                $cargIP=new Incidente_Prueba($cargDen->getCodDenuncia(),$cargPrueba->getCodPrueba());
                $resIP=$cargIP->insertarIncidentePrueba();
            }
            
        } else {
            echo "No hay datos de pruebas en la sesión.";
        }*/
        
        
         
        
    }
    
 
       
    
?>