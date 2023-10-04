<?php
//session_start(); // Asegúrate de iniciar la sesión si aún no lo has hecho

include("../modelo/conexion.php");
include("../modelo/administrador.php");
include("control_cookies.php");

include("../vista/Reporte_denuncias/prueba.php");

// Definir un array multidimensional para almacenar los valores de todas las subidas
if (!isset($_SESSION['datosPruebas'])) {
    $_SESSION['datosPruebas'] = array(); // Inicializa como un arreglo si no existe
}

if(isset($_POST['subePrueba'])){
    // Carpeta donde deseas almacenar los archivos subidos
    $carpetaDestino = '../Pruebas/';
    // Obtener la descripción desde el formulario
    $descripcion = $_POST['descripcion'];
    // Verificar si se subió un archivo
    if (isset($_FILES['archivo']['tmp_name']) && !empty($_FILES['archivo']['tmp_name'])) {
        // Obtener información sobre el archivo subido
        $nombreArchivo = $_FILES['archivo']['name'];
        $tipoArchivo = $_FILES['archivo']['type'];
        $tamanoArchivo = $_FILES['archivo']['size'];
        $archivoTemporal = $_FILES['archivo']['tmp_name'];

        // Generar un nombre único para el archivo
        $nombreUnico = uniqid() . '_' . $nombreArchivo;

        // Ruta completa donde se guardará el archivo
        $rutaArchivo = $carpetaDestino . $nombreUnico;

        // Mover el archivo a la carpeta de destino
        if (move_uploaded_file($archivoTemporal, $rutaArchivo)) {
            // El archivo se ha subido exitosamente
            echo '<p class="success-message">El archivo se ha subido correctamente. Ruta del archivo: ' . $rutaArchivo . '</p>';
            echo '<p class="success-message">Descripción: ' . $descripcion . '</p>';

            // Almacena los datos en el array
            $datosSubida = array(
                'rutaArchivo' => $rutaArchivo,
                'descripcion' => $descripcion,
                'tipoArchivo' => $tipoArchivo
            );

            // Agregar los datos de esta subida al conjunto de datos principal
            $_SESSION['datosPruebas'][] = $datosSubida;

            // Aquí puedes realizar cualquier otra operación con los datos antes de registrarlos en la base de datos
        } else {
            // Error al subir el archivo
            echo '<p class="error-message">Error al subir el archivo.</p>';
        }
        
        // Puedes acceder a los datos almacenados en el array $_SESSION['datosPruebas'] aquí
        //print_r($_SESSION['datosPruebas']);
    } else {
        echo "No se ha seleccionado ningún archivo.";
    }
}
?>