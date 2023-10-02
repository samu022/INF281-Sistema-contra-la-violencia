<?php
    include("../modelo/conexion.php");
    include("../modelo/contactoEmergenciaClase.php");
    include("../modelo/tieneClase.php");
    include("../vista/contactoEmergenciaRegistro.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        session_start();
        $ci_usuario=$_SESSION['ci'];
        $parentesco=$_POST['parentesco'];
        $telefono=$_POST['telefono'];
        //Verificar si existe
        $cargC=new ContactoEmergencia("",$telefono);
        
        $resC=$cargC->telefonoExistente($telefono);
        
        $ci_contacto=$resC;
        if($resC===false){
            $resGT=$cargC->grabarContacto();
            $ci_contacto=$cargC->getCiContacto();
            //echo $ci_contacto;

         
        } 
      
        $cargT=new Tiene($ci_usuario,$parentesco,$ci_contacto);
        $resT=$cargT->usuarioTieneContacto();
        if ($resT===true) {
            //echo "pasa";
            echo "<script>alert('Ya está registrado ese contacto');</script>";
            //header("Location: ../controlador/contactoEmergenciaLista.php");
        } else {
            //echo "no pasa";
            $resGr = $cargT->grabarTiene();
            echo "<script>alert('Registro exitoso');</script>";
           //header("Location: ../controlador/contactoEmergenciaLista.php");
        }
    }
    
   
?>