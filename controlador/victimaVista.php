<?php
session_start(); // Agregar esta línea al inicio de la página

include("../modelo/conexion.php");
//include("../modelo/administrador.php");
//include("control_cookies.php");

$victimas = $_SESSION['datosVictimas'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminarVictima'])) {
    $idVictimaEliminar = $_POST['idVictimaEliminar'];

    // Busca el índice de la víctima a eliminar en el array $victimas
    $indiceEliminar = -1;
    foreach ($victimas as $indice => $victima) {
        if ($victima['ci'] === $idVictimaEliminar) {
            $indiceEliminar = $indice;
            break;
        }
    }

    // Si se encontró el índice, elimina la víctima del array
    if ($indiceEliminar !== -1) {
        unset($victimas[$indiceEliminar]);
        // Reindexa el array para que los índices sean continuos
        $victimas = array_values($victimas);
        $_SESSION['datosVictimas'] = $victimas; // Actualiza la variable de sesión
    }
}

include("../vista/denunciaVista.php")
?>