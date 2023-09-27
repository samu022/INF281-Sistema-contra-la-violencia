<?php
include("../modelo/conexion.php");
include("../modelo/administrador.php");
include("control_cookies.php");

include("../vista/Eventos/EventoRegistro.php");

if (isset($_POST['registrarEvento'])) {
    $tipo = $_POST['tipo'];
    $fecha = $_POST['fecha'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $tipoViolencia = $_POST['tipoViolencia'];
    $horaInicio = $_POST['horaInicio'];
    $horaFinal = $_POST['horaFinal'];
    $modalidad = $_POST['modalidad'];
    $detalleEvento = $_POST['detalleEvento'];
    $expositor = $_POST['expositor'];
    date_default_timezone_set('America/La_Paz');
    $fechaSubida = date("Y-m-d");
    $rutaDirectorio = $_POST['rutaDirectorio'];


    // Obtener la información del archivo cargado
    $archivoNombre = $_FILES['rutaDirectorio']['name'];
    $archivoTipo = $_FILES['rutaDirectorio']['type'];
    $archivoTmpName = $_FILES['rutaDirectorio']['tmp_name'];
    $archivoError = $_FILES['rutaDirectorio']['error'];
    $archivoSize = $_FILES['rutaDirectorio']['size'];

    // Directorio donde se almacenarán los archivos cargados
    $directorioDestino = "../archivosEventos/"; // Reemplaza con tu directorio deseado

    // Validar que se haya seleccionado un archivo y no haya errores
    if ($archivoError === 0) {
        // Generar un nombre único para el archivo
        $archivoNombreUnico = uniqid() . "_" . $archivoNombre;

        // Mover el archivo al directorio de destino
        $rutaArchivoDestino = $directorioDestino . $archivoNombreUnico;
        move_uploaded_file($archivoTmpName, $rutaArchivoDestino);

        // Ahora puedes registrar el evento en la base de datos
        include("../modelo/eventoClase.php");
        $carg = new Evento("", $tipo, $fecha, $titulo, $descripcion, $tipoViolencia, $horaInicio, $horaFinal, $modalidad, $detalleEvento, $expositor, $fechaSubida, $rutaArchivoDestino); // Pasa la ruta al constructor

        $res = $carg->grabarEvento();

        if ($res) {
            echo "<script>
                    alert('Se registró correctamente');
                    location.href='eventoLista.php';
                    </script>";
        } else {
            echo "No se registró";
        }
    } else {
        echo "Error al cargar el archivo.";
    }
}
?>
