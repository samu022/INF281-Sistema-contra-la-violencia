<?php
    session_start();
    
    if(array_key_exists('tipo_usuario', $_SESSION))
    {
        
        
        $nombreScriptActual = $_SERVER['SCRIPT_NAME'];

        //echo $_SESSION['tipo_usuario'];
        
        
        if(((strpos($nombreScriptActual, "agresorRegistro.php") ||
        strpos($nombreScriptActual, "agresorModificar.php") ||
        strpos($nombreScriptActual, "denunciaRegistro.php") ||
        strpos($nombreScriptActual, "geoRegistro.php") ||
        strpos($nombreScriptActual, "pruebaRegistro.php") ||
        strpos($nombreScriptActual, "victimaRegistro.php")
        )))
        {
            if($_SESSION['tipo_usuario'] != "usuario" && $_SESSION['tipo_usuario'] != "administrador")
                header("Location: ../controlador/login.php");
        }

        else if($_SESSION['tipo_usuario'] == "administrador")
        {
            
            $tmp_admin = new Administrador($_SESSION['ci'], $_SESSION['usuario'], "", "");

            if(((strpos($nombreScriptActual, "administradorListar.php") ||
                strpos($nombreScriptActual, "administradorElimina.php") ||
                strpos($nombreScriptActual, "administradorModifica.php") ||
                strpos($nombreScriptActual, "administradorRegistro.php"))))
            {
                
                if(!$tmp_admin->check_role("administrador"))
                    header("Location: ../controlador/dashboard.php");
                
            }
            
            else if(((strpos($nombreScriptActual, "agresorInformacion.php") ||
                strpos($nombreScriptActual, "agresorModificar.php"))))
            {
                
                if(!$tmp_admin->check_role("agresor"))
                    header("Location: ../controlador/dashboard.php");
            }
            
            else if(((strpos($nombreScriptActual, "centroLocalLista.php") ||
                strpos($nombreScriptActual, "centroLocalElimina.php") ||
                strpos($nombreScriptActual, "centroLocalModifica.php") ||
                strpos($nombreScriptActual, "centroLocalRegistro.php"))))
            {
                
                if(!$tmp_admin->check_role("centrolocal"))
                    header("Location: ../controlador/dashboard.php");
            }
            
            else if(((strpos($nombreScriptActual, "denunciaLista.php") ||
                strpos($nombreScriptActual, "denunciaElimina.php") ||
                strpos($nombreScriptActual, "denunciaModificar.php"))))
            {
                if(!$tmp_admin->check_role("denuncia"))
                    header("Location: ../controlador/dashboard.php");
            }
            
            else if(((strpos($nombreScriptActual, "eventoLista.php") ||
                strpos($nombreScriptActual, "eventoElimina.php") ||
                strpos($nombreScriptActual, "eventoModifica.php") ||
                strpos($nombreScriptActual, "eventoRegistro.php"))))
            {
                
                if(!$tmp_admin->check_role("evento"))
                    header("Location: ../controlador/dashboard.php");
            }
            
            else if(((strpos($nombreScriptActual, "geoInformacion.php") ||
                strpos($nombreScriptActual, "geoModificar.php"))))
            {
                if(!$tmp_admin->check_role("geolocalizacion"))
                    header("Location: ../controlador/dashboard.php");
            }
            
            else if(((strpos($nombreScriptActual, "informacionEducativaLista.php") ||
                strpos($nombreScriptActual, "informacionEducativaElimina.php") ||
                strpos($nombreScriptActual, "informacionEducativaModifica.php") ||
                strpos($nombreScriptActual, "informacionEducativaRegistro.php"))))
            {
                
                if(!$tmp_admin->check_role("informacioneducativa"))
                    header("Location: ../controlador/dashboard.php");
            }

            else if(((strpos($nombreScriptActual, "leyLista.php") ||
                strpos($nombreScriptActual, "leyElimina.php") ||
                strpos($nombreScriptActual, "leyModifica.php") ||
                strpos($nombreScriptActual, "leyRegistro.php"))))
            {
                
                if(!$tmp_admin->check_role("leynormativa"))
                    header("Location: ../controlador/dashboard.php");
            }
            else if(((strpos($nombreScriptActual, "pruebaModificar.php") ||
                strpos($nombreScriptActual, "pruebaInformacion.php"))))
            {
                if(!$tmp_admin->check_role("prueba"))
                    header("Location: ../controlador/dashboard.php");
            }
            else if(((strpos($nombreScriptActual, "usuarioLista.php") ||
                strpos($nombreScriptActual, "usuarioModificar.php") || 
                strpos($nombreScriptActual, "usuarioEliminar.php"))))
            {
                
                if(!$tmp_admin->check_role("usuario"))
                    header("Location: ../controlador/dashboard.php");
            }
            else if(((strpos($nombreScriptActual, "victimaInformacion.php") ||
                strpos($nombreScriptActual, "victimaModificar.php"))))
            {
                
                if(!$tmp_admin->check_role("informacioneducativa"))
                    header("Location: ../controlador/dashboard.php");
            }

        }
        else
        {
            header("Location: ../controlador/login.php");
        }

    }
    else{
            
        header("Location: ../controlador/panelweb.php");
    }
    
    

?>