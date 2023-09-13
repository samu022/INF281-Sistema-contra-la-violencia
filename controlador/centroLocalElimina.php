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
    $codCentro=$_GET['cod'];
    include("../modelo/CentroLocalClase.php");
    $carg=new CentroLocal($codCentro,"","","","");
    $res=$carg->eliminar();
    if($res){
        echo "<script>
                alert('se Elimino');
                location.href='centroLocalLista.php';
                </script>";
    }else{
        echo "No se elimino";
    }

?>
