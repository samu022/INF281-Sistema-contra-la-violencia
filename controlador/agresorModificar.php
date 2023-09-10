<?php
// Verificar si se ha pasado el CI como parámetro GET
if (isset($_GET['ci'])) {
    // Obtener el CI desde el parámetro GET
    $ci = $_GET['ci'];

    // Realizar la consulta SQL para obtener los datos del agresor
    include("../modelo/conexion.php"); // Asegúrate de incluir el archivo de conexión

    // Query para obtener los datos del agresor según el CI
    $query = "SELECT * FROM agresor WHERE ci = ?";

    // Utilizar sentencias preparadas para evitar inyección SQL
    $stmt = $db->prepare($query);

    // Vincular el parámetro CI
    $stmt->bind_param("s", $ci);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el resultado de la consulta
    $result = $stmt->get_result();

    // Verificar si se encontraron datos del agresor
    if ($result->num_rows === 1) {
        // Obtener los datos del agresor
        $agresor = $result->fetch_assoc();

        // Llenar los campos del formulario con los datos del agresor
        $nombres = $agresor['nombres'];
        $apellidoP = $agresor['apellidoP'];
        $apellidoM = $agresor['apellidoM'];
        $fechaNacimiento = $agresor['fechaNacimiento'];
        $sexo = $agresor['sexo'];
        $dir = $agresor['direccion'];
        $est = $agresor['estado_civil'];
        $prof = $agresor['profesion'];
        $tel = $agresor['telefono'];
        $descripcion = $agresor['descripcion'];
    } else {
        // No se encontraron datos para el CI proporcionado
        echo "No se encontraron datos para el CI: $ci";
    }

    // Cerrar la conexión a la base de datos
    $stmt->close();
    $db->close();
} else {
    // No se ha proporcionado el CI en la variable GET
    echo "No se ha proporcionado el CI.";
}
include ("../vista/Reporte_denuncias/agresorModificar.php");
?>
