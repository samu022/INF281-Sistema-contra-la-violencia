<?php


    include("../modelo/conexion.php");
    include("../modelo/usuarioClase.php");
    include("../modelo/administrador.php");
    include("control_cookies.php");
    
    $ci = $_GET['ci'];
    //include("../modelo/administrador.php");
    $car = new Usuario($ci, "", "", "", "");

    $res = $car->lista_especifica();
    $reg = $res->fetch_assoc();

    $nombre_usuario = $reg['nombre_usuario'];
    $contrasenia = $reg['contrasenia'];
    $contrasenia_app = $reg['contrasena_app'];
    $correo = $reg['correo'];    

    include("../vista/usuarioModifica.php");

    if (isset($_POST['ModificarUsuario'])) {

        $nombre_usuario = $_POST['nombre_usuario'];
        $nueva_contrasenia = $_POST['contrasenia'];
        $nueva_contrasenia_app = $_POST['contrasena_app'];
        $correo = $_POST['correo'];

        $car->setNombreUsuario($nombre_usuario);

        if($nueva_contrasenia != ""){
            $car->setContrasenia($nueva_contrasenia);
        }
        else
        {
            $car->setContrasenia_prev_hashed($contrasenia);
        }

        if($nueva_contrasenia_app != ""){
            $car->setContraseniaApp($nueva_contrasenia_app);
        }
        else
        {
            $car->setContraseniaApp($contrasenia_app);
        }

        //echo $car->getContraseniaApp();
        $car->setCorreo($correo);
        $res = $car->modifica();
        
        if ($res) {
            echo "<script>
                    alert('Se Modifico correctamente');
                    location.href='usuarioLista.php';
                  </script>";
        } else {
            echo "No se registró";
        }
        
    }
?>
