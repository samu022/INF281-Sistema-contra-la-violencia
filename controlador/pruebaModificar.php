<?php

    include("../modelo/conexion.php");
    $codPrueba = $_GET['codPrueba'];
    $codDenunciante = $_GET['cod'];
    include("../modelo/PruebaClase.php");
    $carPrueba=new Prueba($codPrueba,"","","");
    $resPrueba = $carPrueba->lista_especifica();
    $reg = $resPrueba->fetch_assoc();
    $descripcion = $reg['descripcion'];
    include("../vista/Reporte_denuncias/pruebaModificar.php");
    if (isset($_POST['modificaPrueba'])) {
        $descripcion = $_POST['descripcion'];
        $carPrueba->setDescripcion($descripcion);
        
    
        $res = $carPrueba->modifica();
        if ($res) {
            echo "<script>
                    alert('se Modifico correctamente');
                    location.href='denunciaModificar.php?cod=$codDenunciante';
                    </script>";
        } else {
            echo "No se registró";
        }
    }
?>
