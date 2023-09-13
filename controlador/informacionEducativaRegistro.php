<?php

    session_start();

    if($_SESSION['privilegio'] == "lectura")
    {
        header("Location: ../controlador/dashboard.php");
    }
    else if($_SESSION['privilegio'] == "usuario" || $_SESSION['privilegio'] == "")
    {
        header("Location: ../controlador/login.php");
    }

include("../vista/InformacionEducativaRegistro.php");

if (isset($_POST['registrarInformacion'])) {
    $tipo = $_POST['tipo'];

    // Obtener la información del archivo cargado
    $archivoNombre = $_FILES['archivo']['name'];
    $archivoTipo = $_FILES['archivo']['type'];
    $archivoTmpName = $_FILES['archivo']['tmp_name'];
    $archivoError = $_FILES['archivo']['error'];
    $archivoSize = $_FILES['archivo']['size'];

    // Directorio donde se almacenarán los archivos cargados
    $directorioDestino = "../archivosInformacionEducativa/";

    // Validar que se haya seleccionado un archivo y no haya errores
    if ($archivoError === 0) {
        // Generar un nombre único para el archivo
        $archivoNombreUnico = uniqid() . "_" . $archivoNombre;

        // Mover el archivo al directorio de destino
        $rutaArchivoDestino = $directorioDestino . $archivoNombreUnico;
        move_uploaded_file($archivoTmpName, $rutaArchivoDestino);

        // Ahora puedes registrar la información en la base de datos
        include("../modelo/InformacionEducativaClase.php");
        $carg = new InformacionEducativa("", $rutaArchivoDestino, $tipo);

        $res = $carg->grabarInformacion();

        if ($res) {
            echo "<script>
                    alert('Se registró correctamente');
                    location.href='informacionEducativaLista.php';
                    </script>";
        } else {
            echo "No se registró";
        }
    } else {
        echo "Error al cargar el archivo.";
    }
}
?>

