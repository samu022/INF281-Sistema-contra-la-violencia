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

    include("../vista/administradorRegistro.php");
    if(isset($_POST['RegistrarAdministrador'])){
        $ci = $_POST['ci'];
        $nombre_usuario = $_POST['nombre_usuario'];
        $contrasenia = $_POST['contrasenia'];
        $correo = $_POST['correo'];
        $rol = $_POST['rol'];

        // Datos de la Persona

        $nombre_completo = $_POST['nombre_completo'];
        $apePaterno = $_POST['apePaterno'];
        $apeMaterno = $_POST['apeMaterno'];
        $fechaNaci = $_POST['fechaNaci'];
        $sexo = $_POST['sexo'];
        $direccion = $_POST['direccion'];
        $estado_civil = $_POST['estado_civil'];
        $profesion = $_POST['profesion'];
        $numero_telefono = $_POST['numero_telefono'];
        include("../modelo/administrador.php");
        include("../modelo/PersonaClase.php");
        $carg=new Administrador($ci, $nombre_usuario, $contrasenia, $correo, $rol);
        $persona = new Persona($ci, $nombre_completo, $apePaterno, $apeMaterno, $fechaNaci,
            $sexo, $direccion, $estado_civil, $profesion, $numero_telefono);
        //public function __construct($ci, $nombre, $apePaterno, $apeMaterno, $fechaNaci,
         //            $sexo, $direccion, $estado_civil, $profesion, $numero_telefono) {
        
        $res2 =  $persona->grabarPersona();
        $res = $carg->grabarAdministrador();
        
        if($res){
            echo "<script>
                    alert('se Registro correctamente');
                    
                    </script>";
        }else{
            echo "No se registro";
        }
    }
?>
