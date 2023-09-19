<?php
    

    include("../modelo/conexion.php");
    $ci = $_GET['ci'];
    $codDenunciante = $_GET['cod'];
    include("../modelo/VictimaClase.php");
    include("../modelo/PersonaClase.php");
    $carVictima=new Victima($ci,"","");
    $resVictima = $carVictima->lista_especifica();
    $reg = $resVictima->fetch_assoc();
    $ci = $reg['ci'];
    $carPer = new Persona($ci, "", "", "", "","","","","","");
    $resPer = $carPer->lista_especifica();
    $regPer = $resPer->fetch_assoc();
    $nombres = $regPer['nombre'];
    $apellidoP = $regPer['apePaterno'];
    $apellidoM = $regPer['apeMaterno'];
    $fechaNacimiento = $regPer['fechaNaci'];
    $sexo = $regPer['sexo'];
    $direccion = $regPer['direccion'];
    $estadoCivil = $regPer['estado_civil'];
    $profesion = $regPer['profesion'];
    $telefono = $regPer['telefono'];
    $relacion = $reg['relacion_perpetrador'];
    include("../vista/Reporte_denuncias/victimaModificar.php");
    if (isset($_POST['modificarVictima'])) {
        $nombres = $_POST['nombres'];
        $apellidoP = $_POST['apellidoP'];
        $apellidoM = $_POST['apellidoM'];
        $fechaNacimiento = $_POST['fechaNacimiento'];
        $fechaNacimiento = date("Y-m-d", strtotime($fechaNacimiento));
        $sexo = $_POST['sexo'];
        $direccion = $_POST['dir'];
        $estadoCivil = $_POST['est'];
        $profesion = $_POST['prof'];
        $telefono = $_POST['telefono'];
        $relacion = $_POST['rel'];
        
        
        // $carg=new Ley_Normativa($cod,$nom,$fecha_prom,$tem,$inf);
        $carPer->setNombre($nombres);
        $carPer->setApePaterno($apellidoP);
        $carPer->setApeMaterno($apellidoM);
        $carPer->setFechaNaci($fechaNacimiento);
        $carPer->setSexo($sexo);
        $carPer->setDireccion($direccion);
        $carPer->setEstadoCivil($estadoCivil);
        $carPer->setProfesion($profesion);
        $carPer->setNumeroTelefono($telefono);
        $carVictima->setRelacion_Perpetrador($relacion);
    
        $res = $carPer->modifica();
        $res = $carVictima->modifica();
        if (!$res) {
            echo "<script>
                    alert('se Modifico correctamente');
                    location.href='denunciaModificar.php?cod=$codDenunciante';
                    </script>";
        } else {
            echo "No se registró";
        }
    }
    ?>
?>
