<?php
include("../modelo/conexion.php");
session_start();
if (isset($_POST['eventos'])) {
    $_SESSION['formulario_enviado'] = 'eventos';
    header("Location: ../vista/panelWebEventos.php"); 
    exit();
} else if (isset($_POST['informacionEducativa'])) {
    $_SESSION['formulario_enviado'] = 'informacionEducativa';
    header("Location: ../vista/panelWebInformacionEducativa.php"); 
    //exit();
} else if (isset($_POST['centrosLocales'])) {
    $_SESSION['formulario_enviado'] = 'centrosLocales';
    header("Location: ../vista/panelWebCentrosLocales.php");
    exit();
} else if (isset($_POST['leyes'])) {
    $_SESSION['formulario_enviado'] = 'leyes';
    header("Location: ../vista/panelWebLeyes.php"); 
    exit();
} else {
    // Aquí no se envió ningún formulario, mostrar los botones nuevamente
    $_SESSION['formulario_enviado'] = '';
    include("../vista/panelWeb.php");
}
?>

