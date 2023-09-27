<?php
    include("../modelo/conexion.php");
    include("../modelo/administrador.php");
    include("control_cookies.php");

    $cod=$_GET['cod'];
    include("../modelo/Ley_NormativaClase.php");
    //include("../modelo/conexion.php");
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