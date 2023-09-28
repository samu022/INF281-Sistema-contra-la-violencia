<?php
    include("../modelo/conexion.php");
    //include("../modelo/administrador.php");
    //include("control_cookies.php");

    include('../vista/formulario.php');
    //include ("../modelo/conexion.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Accede a los datos enviados por el formulario
        $puntaje = $_POST["input_94"];
        echo "PASA";
    }
    
    
    
?>