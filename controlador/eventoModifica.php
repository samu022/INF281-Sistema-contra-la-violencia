<?php
$codEvento = $_GET['cod'];

// Incluye la clase de Evento
include("../modelo/EventoClase.php");
$evento = new Evento($codEvento, "", "", "", "", "");

// Obtén la información actual del evento
$res = $evento->lista_especifica();
$reg = $res->fetch_assoc();
$tipo = $reg['tipo'];
$fecha = $reg['fecha'];
$titulo = $reg['titulo'];
$duracion = $reg['duracion'];
$rutaDirectorio = $reg['rutaDirectorio']; // Agrega esta línea para obtener la ruta actual del archivo

// Guarda los valores actuales en variables temporales
$tipoActual = $tipo;
$fechaActual = $fecha;
$tituloActual = $titulo;
$duracionActual = $duracion;
$rutaDirectorioActual = $rutaDirectorio; // Agrega esta línea para guardar la ruta actual del archivo

include("../vista/Eventos/EventoModifica.php");

if (isset($_POST['ModificarEvento'])) {
    $tipo = $_POST['tipo'];
    $fecha = $_POST['fecha'];
    $titulo = $_POST['titulo'];
    $duracion = $_POST['duracion'];

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
    $evento->setDuracion($duracion);

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

