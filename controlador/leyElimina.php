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
    $cod=$_GET['cod'];
    $nom=$_POST['nom'];
    $fecha_prom=$_POST['fechaPromulgacion'];
    $tem=$_POST['tem'];
    $inf=$_POST['ref'];
    include("../modelo/Ley_NormativaClase.php");
    $carg=new Ley_Normativa($cod,"","","","");
    $res=$carg->elimina();
    if($res){
        echo "<script>
                alert('se Elimino');
                location.href='leyLista.php';
                </script>";
    }else{
        echo "No se elimino";
    }

?>
