<?php
    include("../modelo/usuarioClase.php");
    include("../modelo/administrador.php");
    include("../vista/login.php");
    include("../modelo/conexion.php");
    session_start();

    if(isset($_POST['login'])){    
        $usuario = $_POST['usuario'];
        $contrasenia = $_POST['contrasenia'];

        $user = new Usuario("", $usuario, $contrasenia, "");
        // Hay rol de lectura y escritura, un usuario solo sera direccionado al index, en cambio un amdinistrador al dashboard
        // Definimos 3 permisos: lectura/escritura/usuario
        // El hecho de que ya el usuario tenga permiso de lectura y escritura ya lo hace "administrador"
        $admin = new Administrador("", $usuario, $contrasenia, "", "");
        if($user->check_exists())
        {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['ci']=$user->obtenerCI();
            $_SESSION['tipo_usuario'] = "usuario";
            header("Location: ../controlador/panelweb.php");
        }
        else if($admin->check_exists())
        {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['tipo_usuario'] = "administrador";
            $_SESSION['ci']=$admin->obtenerCI();
            header("Location: ../controlador/dashboard.php");
        }
         
        else
        {
            header("Location: ../controlador/login.php");
        }
    }
?>
