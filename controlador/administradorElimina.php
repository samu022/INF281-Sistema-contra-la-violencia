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


    $ci = $_GET['ci'];
    
    include("../modelo/administrador.php");
    $carg = new Administrador($ci,"","","","");
    try{
        $res = $carg->elimina();
        if($res){
            echo "<script>
                    alert('Se elimino');
                    location.href='administradorListar.php';
                    </script>";
        }else{
            echo "<script>
                    alert('No se elimino');
                    location.href='administradorListar.php';
                    </script>";
        }
    }catch(Exception $e){
        echo "<script>
                    alert('No se elimino');
                    location.href='administradorListar.php';
                    </script>";
    }
    /*
    $res = $carg->elimina();
    if($res){
        echo "<script>
                alert('se Elimino');
                location.href='administradorLista.php';
                </script>";
    }else{
        echo "No se elimino";
    }*/

?>