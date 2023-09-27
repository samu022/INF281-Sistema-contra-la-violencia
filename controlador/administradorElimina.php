<?php

 
    include("../modelo/conexion.php");
    include("../modelo/administrador.php");
    include("control_cookies.php");

    $ci = $_GET['ci'];
    
    
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
