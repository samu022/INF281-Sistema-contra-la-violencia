<?php
    
    if (isset($_POST['eventos'])) {
        $_SESSION['formulario_enviado'] = 'eventos';
        include("../vista/panelWebEventos.php");
    } else if (isset($_POST['informacionEducativa'])) {
        $_SESSION['formulario_enviado'] = 'informacionEducativa';
        include("../vista/panelWebInformacionEducativa.php");
    } else if (isset($_POST['centrosLocales'])) {
        $_SESSION['formulario_enviado'] = 'centrosLocales';
        include("../vista/panelWebCentrosLocales.php");
    } else if (isset($_POST['leyes'])) {
        $_SESSION['formulario_enviado'] = 'leyes';
        include("../vista/panelWebLeyes.php");
    } else {
        // Aquí no se envió ningún formulario, mostrar los botones nuevamente
        $_SESSION['formulario_enviado'] = '';
        include("../vista/panelWeb.php");
    }
?>
