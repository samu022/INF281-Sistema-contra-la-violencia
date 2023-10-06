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
    // Inicializa un arreglo vacío para almacenar las variables POST
    $data = array();

    // Recorre todas las variables POST
    foreach ($_POST as $key => $value) {
        // Escapa los valores para evitar problemas de seguridad
        if (is_array($value)) {
            // Si el valor es un arreglo, conviértelo a una cadena JSON
            $value = json_encode($value);
        }
        $data[$key] = $value;
    }

    // URL de la página a la que deseas enviar los datos POST
    $url = 'https://submit.jotform.com/submit/232692464799676'; // Reemplaza con la URL correcta

    // Inicializa cURL
    $ch = curl_init($url);

    // Configura cURL para enviar una solicitud POST
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    // Ejecuta la solicitud y obtiene la respuesta
    $response = curl_exec($ch);

    // Verifica si hubo errores en la solicitud
    if (curl_errno($ch)) {
        echo 'Error en la solicitud cURL: ' . curl_error($ch);
    }

    // Cierra la conexión cURL
    curl_close($ch);

    // La variable $response contiene la respuesta de la página a la que enviaste los datos POST
    echo $response;
            
        //include("../vista/thanksLlenado.php");

?>