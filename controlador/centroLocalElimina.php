<?php
    $codCentro=$_GET['cod'];
    include("../modelo/CentroLocalClase.php");
    include("../modelo/conexion.php");
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