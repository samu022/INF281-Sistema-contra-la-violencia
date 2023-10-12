<?php
    
    
    include("../modelo/conexion.php");
    include("../modelo/administrador.php");
    include("control_cookies.php");
    
    
    include("../vista/Reporte_denuncias/index.php");
    include("../modelo/PersonaClase.php");
    include("../modelo/AgresorClase.php");
    include("../modelo/VictimaClase.php");
    include("../modelo/PruebaClase.php");
    include("../modelo/RealizaClase.php");
    include("../modelo/Incidente_PruebaClase.php");
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
        //echo "Código de Geolocalización: " . $cargGeo->getCodGeo() . "<br>";
        $cargDen=new Denuncia("", $tipo, $des, $fechaActual,$tes,"En proceso",$cargGeo->getCodGeo());
        $resDen=$cargDen->grabarDenuncia();
        //Registramos a victima
        
        $datosVictima = isset($_SESSION['datosVictimas']) ? $_SESSION['datosVictimas'] : array();
        // Verificar si hay datos en la sesión
       if (!empty($datosVictima)) {
        
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
                //include("../modelo/PersonaClase.php");
                $cargPersona=new Persona($ci, $nombres, $apellidoP, $apellidoM, $fechaNacimiento, $sexo, $direccion, $estadoCivil, $profesion,$telefono);
                $resPersona=$cargPersona->grabarPersona();
                //echo "<p>".$cargDen->getCodDenuncia()."</p>";
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
                 //include("../modelo/PersonaClase.php");
                 $cargPersona=new Persona($ci, $nombres, $apellidoP, $apellidoM, $fechaNacimiento, $sexo, $direccion, $estadoCivil, $profesion,$telefono);
                 $resPersona=$cargPersona->grabarPersona();
                 
                 
                 $cargAgresor=new Agresor($ci, $descripcion);
                 $resAgresor=$cargAgresor->grabarAgresor();
                 //AQUI TABLA REALIZA
                 //REGISTRAMOS REALIZA
                 $valor="si";
                 if($anonima){
                    $valor="si";
                 }else{
                    $valor="no";
                 }
                 $cargRealiza=new Realiza($_SESSION['ci'],$cargDen->getCodDenuncia(),$ci, $valor);
                 $resRealiza=$cargRealiza->insertarRealiza();
                //*************************************************** */
            }
        } else {
            echo "No hay datos de agresores en la sesión.";
        }
        
        $datosPrueba = isset($_SESSION['datosPruebas']) ? $_SESSION['datosPruebas'] : array();
        //$datosPrueba = isset($_SESSION['datosPrueba']) ? $_SESSION['datosPrueba'] : array();

        // Verificar si hay datos en la sesión
        if (!empty($datosPrueba)) {
            // Iterar a través de cada fila
            foreach ($datosPrueba as $prueba) {
                // Acceder a los valores de cada fila
                $rutaArchivo = $prueba['rutaArchivo'];
                $descripcion = $prueba['descripcion'];
                $tipoArchivo = $prueba['tipoArchivo'];
        
                //cargamos pruebas a bd
                
                $cargPrueba=new Prueba("", $tipoArchivo, $descripcion, $rutaArchivo);
                $resPrueba=$cargPrueba->grabarPrueba();
                
                $cargIP=new Incidente_Prueba($cargDen->getCodDenuncia(),$cargPrueba->getCodPrueba());
                $resIP=$cargIP->insertarIncidentePrueba();
            }
            
        } else {
            echo "No hay datos de pruebas en la sesión.";
        }
        
        
         
        
    }
    
 
    $_SESSION['datosPruebas']=array();  
    $_SESSION['datosVictimas']=array();  
    $_SESSION['datosAgresor']=array();  
    $_SESSION['latitud']=null;  
    $_SESSION['longitud']=null;  

    
?>
