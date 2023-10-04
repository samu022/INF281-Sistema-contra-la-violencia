<?php
include("../modelo/conexion.php");
include("../modelo/administrador.php");



if(isset($_POST['RegistrarUsuario'])){
    $ci = $_POST['ci'];
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasenia = $_POST['contrasenia'];
    $contrasenia_app = $_POST['app'];
    $correo = $_POST['correo'];

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
    include("../modelo/usuarioClase.php");
    include("../modelo/PersonaClase.php");
    $carg=new Usuario($ci, $nombre_usuario, $contrasenia,  $correo,$contrasenia_app);
    $persona = new Persona($ci, $nombre_completo, $apePaterno, $apeMaterno, $fechaNaci,
        $sexo, $direccion, $estado_civil, $profesion, $numero_telefono);
    
    $res2 =  $persona->grabarPersona();
    $res = $carg->grabarUsuario();
    
    if($res){
        
        header("Location: login.php");
        echo "<script>
                alert('Se registró correctamente');
                </script>";
        exit;
    }else{
        
        header("Location: usuarioRegistro.php");
        echo "<script>
                alert('Hubo un problema al registrar');
                </script>";
        exit;
    }
    
}
include("../vista/usuarioRegistro.php");
?>
