<?php
    include("../modelo/usuarioClase.php");
    include("../modelo/administrador.php");
    include("../vista/login.php");
    include("../modelo/conexion.php");
    session_start();

    if(isset($_POST['login'])){  
       
        $usuario = $_POST['usuario'];
        $contrasenia = $_POST['contrasenia'];
        
        $user = new Usuario("", $usuario, $contrasenia, "","");
        // Hay rol de lectura y escritura, un usuario solo sera direccionado al index, en cambio un administrador al dashboard
        // Definimos 3 permisos: lectura/escritura/usuario
        // El hecho de que ya el usuario tenga permiso de lectura y escritura ya lo hace "administrador"
        $admin = new Administrador("", $usuario, $contrasenia, "", "");
        if($user->check_exists())
        {  
            $_SESSION['usuario'] = $usuario;
            $_SESSION['ci']=$user->obtenerCI();
            $_SESSION['tipo_usuario'] = "usuario";
            header("Location: ../controlador/panelweb.php");
            exit; // Añade esta línea para asegurarte de que se detenga la ejecución del script
        }
        else if($admin->check_exists())
        {   
            $_SESSION['usuario'] = $usuario;
            $_SESSION['tipo_usuario'] = "administrador";
            $_SESSION['ci']=$admin->obtenerCI();
            header("Location: ../controlador/dashboard.php");
            exit; // Añade esta línea para asegurarte de que se detenga la ejecución del script
        }else if($user->check_exists_basico()){
            echo '<script>
                var alertDiv = document.createElement("div");
                alertDiv.innerHTML = "Contraseña incorrecta, intentelo de nuevo";
                alertDiv.style.backgroundColor = "#f44336";
                alertDiv.style.color = "white";
                alertDiv.style.padding = "10px 20px";
                alertDiv.style.borderRadius = "5px";
                alertDiv.style.position = "fixed";
                alertDiv.style.top = "80%";
                alertDiv.style.left = "50%";
                alertDiv.style.transform = "translate(-50%, -50%)";
                alertDiv.style.zIndex = "1000";
                document.body.appendChild(alertDiv);
                setTimeout(function() {
                    alertDiv.style.display = "none";
                }, 3000);
            </script>';
        }else if($admin->check_exists_basico()){
            echo '<script>
                var alertDiv = document.createElement("div");
                alertDiv.innerHTML = "Contraseña incorrecta, intentelo de nuevo";
                alertDiv.style.backgroundColor = "#f44336";
                alertDiv.style.color = "white";
                alertDiv.style.padding = "10px 20px";
                alertDiv.style.borderRadius = "5px";
                alertDiv.style.position = "fixed";
                alertDiv.style.top = "80%";
                alertDiv.style.left = "50%";
                alertDiv.style.transform = "translate(-50%, -50%)";
                alertDiv.style.zIndex = "1000";
                document.body.appendChild(alertDiv);
                setTimeout(function() {
                    alertDiv.style.display = "none";
                }, 3000);
            </script>';
        }
        else
        {  
            echo '<script>
                var alertDiv = document.createElement("div");
                alertDiv.innerHTML = "No existe el usuario, registrese";
                alertDiv.style.backgroundColor = "#f44336";
                alertDiv.style.color = "white";
                alertDiv.style.padding = "10px 20px";
                alertDiv.style.borderRadius = "5px";
                alertDiv.style.position = "fixed";
                alertDiv.style.top = "80%";
                alertDiv.style.left = "50%";
                alertDiv.style.transform = "translate(-50%, -50%)";
                alertDiv.style.zIndex = "1000";
                document.body.appendChild(alertDiv);
                setTimeout(function() {
                    alertDiv.style.display = "none";
                }, 3000);
            </script>';
        }
    }
?>