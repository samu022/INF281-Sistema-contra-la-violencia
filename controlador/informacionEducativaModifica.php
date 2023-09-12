<?php
$codInformacion = $_GET['codInformacion'];

// Incluye la clase de InformacionEducativa
include("../modelo/InformacionEducativaClase.php");
$informacion = new InformacionEducativa($codInformacion, "", "");

// Obtén la información actual de la información educativa
$res = $informacion->lista_especifica();
$reg = $res->fetch_assoc();
$rutaDirectorio = $reg['rutaDirectorio'];
$tipo = $reg['tipo'];

// Guarda los valores actuales en variables temporales
$rutaDirectorioActual = $rutaDirectorio;
$tipoActual = $tipo;

include("../vista/InformacionEducativaModifica.php");

if (isset($_POST['ModificarInformacion'])) {
    $tipo = $_POST['tipo'];

    // Verifica si se seleccionó un nuevo archivo
    if ($_FILES['archivo']['error'] === 0) {
        // Obtén la información del nuevo archivo
        $archivoNombre = $_FILES['archivo']['name'];
        $archivoTmpName = $_FILES['archivo']['tmp_name'];

        // Directorio donde se almacenarán los archivos cargados
        $directorioDestino = "../archivosInformacionEducativa/";

        // Genera un nombre único para el archivo
        $archivoNombreUnico = uniqid() . "_" . $archivoNombre;

        // Mueve el nuevo archivo al directorio de destino
        $rutaArchivoDestino = $directorioDestino . $archivoNombreUnico;
        move_uploaded_file($archivoTmpName, $rutaArchivoDestino);

        // Actualiza la información en la base de datos con la nueva ruta
        $informacion->setRutaDirectorio($rutaArchivoDestino);
    } else {
        // Si no se seleccionó un nuevo archivo, restaura la ruta anterior
        $informacion->setRutaDirectorio($rutaDirectorioActual);
    }

    // Siempre actualiza el tipo, incluso si no se seleccionó un nuevo archivo
    $informacion->setTipo($tipo);

    // Realiza la modificación en la base de datos
    $res = $informacion->modificar();

    if ($res) {
        echo "<script>
                alert('Se modificó la información educativa correctamente');
                location.href='informacionEducativaLista.php';
                </script>";
    } else {
        echo "No se pudo modificar la información educativa.";
    }
}
?>

