<?php
include("../modelo/conexion.php");
include("../modelo/administrador.php");
include("control_cookies.php");
$cod = $_GET['cod'];
include("../modelo/CentroLocalClase.php");
//include("../modelo/conexion.php");
$car = new CentroLocal($cod, "", "", "", "","","");
$res = $car->listaEspecifica();
$reg = $res->fetch_assoc();
$nombre = $reg['nombre'];
$telefono = $reg['telefono'];
$ubicacion = $reg['ubicacion'];
$rutaDirectorio = $reg['archivo'];
$pagina = $reg['pagina'];

$nombreActual = $nombre;
$telefonoActual = $telefono;
$ubicacioActual = $ubicacion;
$rutaDirectorioActual = $rutaDirectorio;
$paginaActual = $pagina;

$ci = 10001;
include("../vista/CentroLocalModifica.php");

if (isset($_POST['ModificarCentro'])) {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $ubicacion = $_POST['ubicacion'];
    $pagina = $_POST['pagina'];
    // $carg=new Ley_Normativa($cod,$nom,$fecha_prom,$tem,$inf);// Verifica si se seleccionó un nuevo archivo
    if ($_FILES['archivo']['error'] === 0) {
        // Obtén la información del nuevo archivo
        $archivoNombre = $_FILES['archivo']['name'];
        $archivoTmpName = $_FILES['archivo']['tmp_name'];

        // Directorio donde se almacenarán los archivos cargados
        $directorioDestino = "../archivosCentrosLocales/";

        // Genera un nombre único para el archivo
        $archivoNombreUnico = uniqid() . "_" . $archivoNombre;

        // Mueve el nuevo archivo al directorio de destino
        $rutaArchivoDestino = $directorioDestino . $archivoNombreUnico;
        move_uploaded_file($archivoTmpName, $rutaArchivoDestino);

        // Actualiza la información en la base de datos con la nueva ruta
        $car->setArchivo($rutaArchivoDestino);
    } else {
        // Si no se seleccionó un nuevo archivo, restaura la ruta anterior
        $car->setArchivo($rutaDirectorioActual);
    }


    $car->setNombre($nombre);
    $car->setTelefono($telefono);
    $car->setUbicacion($ubicacion);
    $car->setPagina($pagina);
    $car->setCi($ci);
    $res = $car->modificar();
    if ($res) {
        echo "<script>
                alert('se Modifico correctamente');
                location.href='centroLocalLista.php';
                </script>";
    } else {
        echo "No se registró";
    }
}
?>
