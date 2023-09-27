<?php

    include("../modelo/conexion.php");
    include("../modelo/administrador.php");
    include("control_cookies.php");

$cod = $_GET['cod'];
include("../modelo/Ley_NormativaClase.php");
//include("../modelo/conexion.php");
$car = new Ley_Normativa($cod, "", "", "", "");
$res = $car->lista_especifica();
$reg = $res->fetch_assoc();
$nom = $reg['nombre'];
$fecha = $reg['fecha_promulgacion'];
$tematica = $reg['tematica'];
$inf = $reg['informacion'];
include("../vista/LeyModifica.php");

if (isset($_POST['ModificarLey'])) {
    $nom = $_POST['nom'];
    $fecha_prom = $_POST['fechaPromulgacion'];
    $tem = $_POST['tem'];
    $inf = $_POST['ref'];
    // $carg=new Ley_Normativa($cod,$nom,$fecha_prom,$tem,$inf);
    $car->setNombre($nom);
    $car->setFecha_Promulgacion($fecha);
    $car->setTematica($tem);
    $car->setInformacion($inf);
    $res = $car->modifica();
    if ($res) {
        echo "<script>
                alert('se Modifico correctamente');
                location.href='leyLista.php';
                </script>";
    } else {
        echo "No se registró";
    }
}
?>
