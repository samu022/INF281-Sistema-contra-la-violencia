<?php
    //incluimos modelo
    include("../modelo/conexion.php");
    include("../modelo/EventoClase.php");
    include("../modelo/InformacionEducativaClase.php");
    include("../modelo/Ley_NormativaClase.php");
    include("../modelo/CentroLocalClase.php");
    $informacion=new InformacionEducativa("","","","","","","");
    $eventos=new Evento("","","","","","","","","","","","","");
    $centro=new CentroLocal("","","","","");
    $leyNormativa = new Ley_Normativa("","","","","");
    $res=$eventos->lista();
    if (isset($_POST['filtrarInformacion'])) {
        //echo "estoy aqui";
        $tipoViolencia = $_POST['tipoViolencia'];
        //echo $tipoViolencia;
        $res2=$informacion->filtrarTipoViolencia($tipoViolencia);
    }
    else{
        $res2 = $informacion->lista();
    }
    $res3 = $leyNormativa->lista();
    $res4 = $centro->lista();
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
