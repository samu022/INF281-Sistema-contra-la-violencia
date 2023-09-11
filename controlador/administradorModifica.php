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
    $car = new Administrador($ci, "", "", "", "");

    $res = $car->lista_especifica();
    $reg = $res->fetch_assoc();

    $nombre_usuario = $reg['nombre_usuario'];
    $contrasenia = $reg['contrasenia'];
    $correo = $reg['correo'];
    $privilegios = $reg['privilegios'];

    include("../vista/administradorModifica.php");

    if (isset($_POST['ModificarAdministrador'])) {

        $nombre_usuario = $_POST['nombre_usuario'];
        $contrasenia = $_POST['contrasenia'];
        $correo = $_POST['correo'];
        $privilegios = $_POST['privilegios'];

        $car->setNombreUsuario($nombre_usuario);
        $car->setContrasenia($contrasenia);
        $car->setCorreo($correo);
        $car->setPrivilegios($privilegios);
        $res = $car->modifica();

        if ($res) {
            echo "<script>
                    alert('Se Modifico correctamente');
                    location.href='administradorListar.php';
                  </script>";
        } else {
            echo "No se registró";
        }
    }
?>
