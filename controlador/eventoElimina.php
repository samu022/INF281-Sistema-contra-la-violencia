<?php
    include("../modelo/conexion.php");
    include("../modelo/administrador.php");
    include("control_cookies.php");

    $codEvento=$_GET['cod'];
    //$tipo=$_POST['tipo'];
    //$fecha=$_POST['fecha'];
    //$titulo=$_POST['titulo'];
    //$duracion=$_POST['duracion'];
    //include ("../modelo/conexion.php");
    include("../modelo/EventoClase.php");
    $carg=new Evento($codEvento,"","","","","","","","","","","","");
    $res=$carg->elimina();
    if($res){
        echo "<script>
                alert('se Elimino');
                location.href='eventoLista.php';
                </script>";
    }else{
        echo "No se elimino";
    }

?>
