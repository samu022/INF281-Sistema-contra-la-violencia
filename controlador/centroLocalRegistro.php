<?php

    include("../modelo/conexion.php");
    include("../modelo/administrador.php");
    include("control_cookies.php");

    include("../vista/CentroLocalRegistro.php");
    //include("../modelo/conexion.php");
    if(isset($_POST['RegistrarCentro'])){
        $nombre=$_POST['nombre'];
        $telefono=$_POST['telefono'];
        $ubicacion=$_POST['ubicacion'];
        $ci = 10001;//esto cambiara cuando ya se introdusca el login y capturemos el ci del admin
        include("../modelo/CentroLocalClase.php");
        $carg=new CentroLocal("",$nombre,$telefono,$ubicacion,$ci);
        $res=$carg->insertar();
        if($res){
            echo "<script>
                    alert('se Registro correctamente');
                    location.href='centroLocalLista.php';
                    </script>";
        }else{
            echo "No se registro";
        }
    }
?>