<?php


    include("../modelo/conexion.php");
    include("../modelo/administrador.php");
    include("control_cookies.php");
    
    $ci = $_GET['ci'];
    //include("../modelo/administrador.php");
    $car = new Administrador($ci, "", "", "", "");

    $res = $car->lista_especifica();
    $reg = $res->fetch_assoc();

    $nombre_usuario = $reg['nombre_usuario'];
    $contrasenia = $reg['contrasenia'];
    $correo = $reg['correo'];

    $tmp_admin = new Administrador("", "", "", "");
    
    $total_roles = $tmp_admin->getRoles();
    //echo $ci;
    $roles_de_administrador_propio =  $car->getRolesUser();
    //print_r($roles_de_administrador_propio);

    $v_roles_administrador = [];

    while($rol_propio=mysqli_fetch_array($roles_de_administrador_propio)){
        array_push($v_roles_administrador, $rol_propio['idRol']);
    }

    

    include("../vista/administradorModifica.php");

    if (isset($_POST['ModificarAdministrador'])) {

        $nombre_usuario = $_POST['nombre_usuario'];
        $nueva_contrasenia = $_POST['contrasenia'];
        $correo = $_POST['correo'];


        $tmp_admin = new Administrador("", "", "", "");
        $car->delete_all_roles();
        $total_roles = $tmp_admin->getRoles();
        while($rol=mysqli_fetch_array($total_roles)){

            if (array_key_exists($rol["idRol"], $_POST)) {
                $car->setRol($rol["idRol"]);
                echo $rol["idRol"];
            }
        }

        
        $car->setNombreUsuario($nombre_usuario);

        if($nueva_contrasenia != ""){
            $car->setContrasenia($nueva_contrasenia);
        }
        else
        {
            $car->setContrasenia_prev_hashed($contrasenia);
        }
        
        $car->setCorreo($correo);
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
