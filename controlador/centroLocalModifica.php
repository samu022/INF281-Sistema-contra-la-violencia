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
$cod = $_GET['cod'];
include("../modelo/CentroLocalClase.php");
$car = new CentroLocal($cod, "", "", "", "");
$res = $car->listaEspecifica();
$reg = $res->fetch_assoc();
$nombre = $reg['nombre'];
$telefono = $reg['telefono'];
$ubicacion = $reg['ubicacion'];
$ci = 10001;
include("../vista/CentroLocalModifica.php");

if (isset($_POST['ModificarCentro'])) {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $ubicacion = $_POST['ubicacion'];
    // $carg=new Ley_Normativa($cod,$nom,$fecha_prom,$tem,$inf);
    $car->setNombre($nombre);
    $car->setTelefono($telefono);
    $car->setUbicacion($ubicacion);
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
