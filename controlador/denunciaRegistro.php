<?php
    session_start();
    $_SESSION['datosVictima'] = array();
    $_SESSION['datosAgresor'] =array();
    $_SESSION['datosPruebas'] = array();
    $_SESSION['datosGeo'] = array();
    
    include("../vista/Reporte_denuncias/index.php");
    if(isset($_POST['RegistrarLey'])){
        $nom=$_POST['nom'];
        $fecha_prom=$_POST['fechaPromulgacion'];
        $tem=$_POST['tem'];
        $inf=$_POST['ref'];
        include("../modelo/Ley_NormativaClase.php");
        $carg=new Ley_Normativa("",$nom,$fecha_prom,$tem,$inf);
        $res=$carg->grabarLey_Normativa();
        if($res){
            echo "<script>
                    alert('se Registro correctamente');
                    
                    </script>";
        }else{
            echo "No se registro";
        }
    }
    if (isset($_POST['ObtenerDatos'])) {
        // Obtener los datos de las variables de sesión
        $datosVictima = isset($_SESSION['datosVictima']) ? $_SESSION['datosVictima'] : array();
        $datosAgresor = isset($_SESSION['datosAgresor']) ? $_SESSION['datosAgresor'] : array();
        $datosPrueba = isset($_SESSION['datosPrueba']) ? $_SESSION['datosPrueba'] : array();
        $datosGeolocalizacion = isset($_SESSION['datosGeolocalizacion']) ? $_SESSION['datosGeolocalizacion'] : array();
        
        // Haz lo que necesites con estos datos
    }
?>