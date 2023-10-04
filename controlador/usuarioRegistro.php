<?php
include("../modelo/conexion.php");
include("../modelo/administrador.php");

// Variable para almacenar el mensaje de error
$errorMsg = "";

if (isset($_POST['RegistrarUsuario'])) {
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

    // Verificar si el usuario ya existe en la tabla persona
    $db = new Conexion();
    $stmt = $db->prepare("SELECT ci FROM persona WHERE ci = ?");
    $stmt->bind_param("i", $ci);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // El usuario ya existe en la base de datos, muestra un mensaje de error
        $errorMsg = "El usuario con este número de CI ya existe. Por favor, inicie sesión.";
    } else {
        // El usuario no existe, procede con el registro
        $carg = new Usuario($ci, $nombre_usuario, $contrasenia, $correo, $contrasenia_app);
        $persona = new Persona($ci, $nombre_completo, $apePaterno, $apeMaterno, $fechaNaci,
            $sexo, $direccion, $estado_civil, $profesion, $numero_telefono);

        $res2 = $persona->grabarPersona();
        $res = $carg->grabarUsuario();

        if ($res) {
            // Redirigir al usuario a una página de éxito o mostrar un mensaje de éxito aquí
            header("Location: login.php");
            exit;
        } else {
            // Hubo un problema al registrar, establecer un mensaje de error genérico
            $errorMsg = "Hubo un problema al registrar. Por favor, inténtelo de nuevo más tarde.";
        }
    }
}



include("../vista/usuarioRegistro.php");
?>