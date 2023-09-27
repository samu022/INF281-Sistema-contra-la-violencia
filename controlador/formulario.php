<?php
    include('../vista/formulario.php');
    include ("../modelo/conexion.php");
    // Verificar si se ha enviado el formulario de Google Forms
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["entry.12345"])) {
        // Recopila los datos del formulario
        $respuesta = $_POST["entry.12345"]; // Reemplaza "entry.12345" con el identificador correcto del campo del formulario
        $otroDato = $_POST["otroDato"]; // Puedes agregar más campos aquí

        
     

        // Insertar los datos en la base de datos
        $sql = "INSERT INTO tu_tabla (respuesta, otroDato) VALUES ('$respuesta', '$otroDato')";

        if ($conn->query($sql) === TRUE) {
            echo "Respuesta guardada en la base de datos correctamente";
        } else {
            echo "Error al guardar la respuesta en la base de datos: " . $conn->error;
        }

        // Cierra la conexión a la base de datos
        $conn->close();
    }
    
?>