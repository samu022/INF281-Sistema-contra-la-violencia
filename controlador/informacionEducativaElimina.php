<?php
    $codInformacion=$_GET['codInformacion'];
    //$tipo=$_POST['tipo'];
    //$fecha=$_POST['fecha'];
    //$titulo=$_POST['titulo'];
    //$duracion=$_POST['duracion'];
    include("../modelo/InformacionEducativaClase.php");
    $carg=new InformacionEducativa($codInformacion,"","");
    $res=$carg->eliminar();
    if($res){
        echo "<script>
                alert('se Elimino');
                location.href='informacionEducativaLista.php';
                </script>";
    }else{
        echo "No se elimino";
    }

?>