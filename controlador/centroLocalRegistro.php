<?php

    include("../modelo/conexion.php");
    include("../modelo/administrador.php");
    include("control_cookies.php");

    include("../vista/CentroLocalRegistro.php");
    //include("../modelo/conexion.php");
    if(isset($_POST['RegistrarCentro'])){
        $nombre=$_POST['nombre'];
        $telefono=$_POST['telefono'];
        $ubicacion=$_POST['ubicacion'];

        // Obtener la información del archivo cargado
        $archivoNombre = $_FILES['archivo']['name'];
        $archivoTipo = $_FILES['archivo']['type'];
        $archivoTmpName = $_FILES['archivo']['tmp_name'];
        $archivoError = $_FILES['archivo']['error'];
        $archivoSize = $_FILES['archivo']['size'];

        // Directorio donde se almacenarán los archivos cargados
        $directorioDestino = "../archivosCentrosLocales/";

        // Validar que se haya seleccionado un archivo y no haya errores
        if ($archivoError === 0) {
            // Generar un nombre único para el archivo
            $archivoNombreUnico = uniqid() . "_" . $archivoNombre;

            // Mover el archivo al directorio de destino
            $rutaArchivoDestino = $directorioDestino . $archivoNombreUnico;
            move_uploaded_file($archivoTmpName, $rutaArchivoDestino);

            $ci = 10001;//esto cambiara cuando ya se introdusca el login y capturemos el ci del admin
            include("../modelo/CentroLocalClase.php");
            $carg=new CentroLocal("",$nombre,$telefono,$ubicacion,$rutaArchivoDestino,$ci);
            $res=$carg->insertar();
            if($res){
                echo "<script>
                        alert('se Registro correctamente');
                        location.href='centroLocalLista.php';
                        </script>";
            }else{
                echo "No se registro";
            }
        }
        else{
            echo "error al cargar el archivo";
        }
    
    }
?>