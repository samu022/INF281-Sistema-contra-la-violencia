<?php
include("../modelo/conexion.php");
include("../modelo/administrador.php");
include("control_cookies.php");

$codEvento = $_GET['cod'];

// Incluye la clase de Evento
//include ("../modelo/conexion.php");
include("../modelo/EventoClase.php");
$evento = new Evento($codEvento,"","","","","","","","","","","","");

// Obtén la información actual del evento
$res = $evento->lista_especifica();
$reg = $res->fetch_assoc();
$tipo = $reg['tipo'];
$fecha = $reg['fecha'];
$titulo = $reg['titulo'];
$descripcion = $reg['descripcion'];
$tipoViolencia = $reg['tipoViolencia'];
$horaInicio = $reg['horaInicio'];
$horaFinal = $reg['horaFinal'];
$modalidad = $reg['modalidad'];
$detalleEvento = $reg['detalleEvento'];
$expositor = $reg['expositor'];

date_default_timezone_set('America/La_Paz');
$fechaSubida = date("Y-m-d");

$rutaDirectorio = $reg['rutaDirectorio'];

// Guarda los valores actuales en variables temporales
$tipoActual = $reg['tipo'];
$fechaActual = $reg['fecha'];
$tituloActual = $reg['titulo'];
$descripcionActual = $reg['descripcion'];
$tipoViolenciaActual = $reg['tipoViolencia'];
$horaInicioActual = $reg['horaInicio'];
$horaFinalActual = $reg['horaFinal'];
$modalidadActual = $reg['modalidad'];
$detalleEventoActual = $reg['detalleEvento'];
$expositorActual = $reg['expositor'];

// Agrega estas líneas para guardar la duración y la ruta actual del archivo
$rutaDirectorioActual = $reg['rutaDirectorio'];

include("../vista/Eventos/EventoModifica.php");

if (isset($_POST['ModificarEvento'])) {
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

    // Verifica si se seleccionó un nuevo archivo
    if ($_FILES['rutaDirectorio']['error'] === 0) {
        // Obtén la información del nuevo archivo
        $archivoNombre = $_FILES['rutaDirectorio']['name'];
        $archivoTmpName = $_FILES['rutaDirectorio']['tmp_name'];

        // Directorio donde se almacenarán los archivos cargados
        $directorioDestino = "../archivosEventos/";

        // Genera un nombre único para el archivo
        $archivoNombreUnico = uniqid() . "_" . $archivoNombre;

        // Mueve el nuevo archivo al directorio de destino
        $rutaArchivoDestino = $directorioDestino . $archivoNombreUnico;
        move_uploaded_file($archivoTmpName, $rutaArchivoDestino);

        // Actualiza la información en la base de datos con la nueva ruta
        $evento->setRutaDirectorio($rutaArchivoDestino);
    } else {
        // Si no se seleccionó un nuevo archivo, restaura la ruta anterior
        $evento->setRutaDirectorio($rutaDirectorioActual);
    }

    // Actualiza los otros atributos del evento
    $evento->setTipo($tipo);
    $evento->setFecha($fecha);
    $evento->setTitulo($titulo);
    $evento->setDescripcion($descripcion);
    $evento->setTipoViolencia($tipoViolencia);
    $evento->setHoraInicio($horaInicio);
    $evento->setHoraFinal($horaFinal);
    $evento->setModalidad($modalidad);
    $evento->setDetalleEvento($detalleEvento);
    $evento->setExpositor($expositor);

    // Realiza la modificación en la base de datos
    $res = $evento->modifica();

    if ($res) {
        echo "<script>
                alert('Se modificó el evento correctamente');
                location.href='eventoLista.php';
                </script>";
    } else {
        echo "No se pudo modificar el evento.";
    }
}
?>
