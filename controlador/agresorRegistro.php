<?php



    include("../vista/Reporte_denuncias/agresor.php");
    include("../modelo/conexion.php");
    include("../modelo/administrador.php");
    include("control_cookies.php");

    if(isset($_POST['registrarAgresor'])){
        $nom=$_POST['nombres'];
        $apeP=$_POST['apellidoP'];
        $apeM=$_POST['apellidoM'];
        $fechanac=$_POST['fechaNacimiento']; 
        // Convierte la fecha de DD-MM-AAAA a AAAA-MM-DD
        $fechanac = date('Y-m-d', strtotime(str_replace('-', '/', $fechanac)));
        $sexo=$_POST['sexo'];
        $dir=$_POST['dir'];
        $est=$_POST['est'];
        $prof=$_POST['prof'];
        $ci=$_POST['carnet'];
        $tel=$_POST['tel'];
        $descripcion=$_POST['descripcion'];
        $agresor = array(
            'ci' => $ci,
            'nombres' => $nom,
            'apellidoP' => $apeP,
            'apellidoM' => $apeM,
            'fechaNacimiento' => $fechanac,
            'sexo' => $sexo,
            'direccion' => $dir,
            'estado_civil' => $est,
            'profesion' => $prof,
            'telefono' => $tel,
            'descripcion' => $descripcion
        );

        // Agregar el array de la víctima actual al array principal
        $_SESSION['datosAgresor'][] = $agresor;
        echo '<script>
                var alertDiv = document.createElement("div");
                alertDiv.innerHTML = "El agresor se registro correctamente";
                alertDiv.style.backgroundColor = "#00ff00";
                alertDiv.style.color = "black";
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
                }, 6000);
            </script>';
        /*include("../modelo/PersonaClase.php");
        $carg1=new Victima($ci, $nom, $apeP, $apeM, $fechanac, $sexo, $dir, $est, $prof);
        $res1=$carg1->grabarPersona();
        include("../modelo/VictimaClase.php");
        $carg2=new Victima($ci, $rel, $codDenuncia);
        $res1=$carg2->grabarVictima();*/
        
        
    }
?>
<?php
//session_start();

