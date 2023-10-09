<?php
session_start(); // Agregar esta línea al inicio de la página

include("../modelo/conexion.php");
//include("../modelo/administrador.php");
//include("control_cookies.php");

$agresores = $_SESSION['datosAgresor'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminarAgresor'])) {
    $idAgresorEliminar = $_POST['idAgresorEliminar'];

    // Busca el índice del agresor a eliminar en el array $agresores
    $indiceEliminar = -1;
    foreach ($agresores as $indice => $agresor) {
        if ($agresor['ci'] === $idAgresorEliminar) {
            $indiceEliminar = $indice;
            break;
        }
    }

    // Si se encontró el índice, elimina el agresor del array
    if ($indiceEliminar !== -1) {
        unset($agresores[$indiceEliminar]);
        // Reindexa el array para que los índices sean continuos
        $agresores = array_values($agresores);
        $_SESSION['datosAgresor'] = $agresores; // Actualiza la variable de sesión
    }
}

include("../vista/agresorVista.php")
?>
