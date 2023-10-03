<?php
    include("../modelo/conexion.php");
    
   
        // Accede a los datos enviados por el formulario
        $puntaje = $_POST["q94_totalDe"];
        $resultado = "";
    
        if ($puntaje >= 0 && $puntaje <= 57) {
            $resultado = "LEVE";
        } else {
            if ($puntaje >= 58 && $puntaje <= 116) {
                $resultado = "MODERADO";
            } else {
                if ($puntaje >= 117 && $puntaje <= 228) {
                    $resultado = "SEVERO";
                } else {
                    $resultado = "";
                }
            }
        
            
        
        }
        //registro bd
        include("../modelo/llenaClase.php");
        //include("../modelo/EvaluacionRiesgoClase.php");
        session_start();
        $ci=$_SESSION['ci'];
        $cargE=new Llena($ci,$resultado,1);
        $res=$cargE->grabar();
        include("../vista/thanksLlenado.php");

?>