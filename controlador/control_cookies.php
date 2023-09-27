<?php
    session_start();
    $nombreScriptActual = $_SERVER['SCRIPT_NAME'];

    if($_SESSION['tipo_usuario'] == "usuario")
    {
        
    }
    else if($_SESSION['tipo_usuario'] == "administrador")
    {
        if(strpos($nombreScriptActual, "administradorElimina.php") == false){
            echo "estamos en elimina";
        }
    }
    else
    {
        header("../controlador/login.php");
    }

    

?>