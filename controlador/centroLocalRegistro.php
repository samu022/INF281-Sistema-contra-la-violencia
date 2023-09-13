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
    include("../vista/CentroLocalRegistro.php");
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
