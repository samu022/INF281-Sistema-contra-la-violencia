<?php


    include("../modelo/conexion.php");
    include("../modelo/administrador.php");
    include("control_cookies.php");

//session_start();
include("../vista/Reporte_denuncias/geolocalizacion.php");

// Definir variables para almacenar las coordenadas de latitud y longitud
if (!isset($_SESSION['latitud'])) {
    $_SESSION['latitud'] = null;
}

if (!isset($_SESSION['longitud'])) {
    $_SESSION['longitud'] = null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener las coordenadas de latitud y longitud desde la solicitud POST
    $_SESSION['latitud'] = $_POST['latitud'];
    $_SESSION['longitud'] = $_POST['longitud'];
    //echo "<p>".$_POST['latitud']."</p>";
    echo '<script>
                var alertDiv = document.createElement("div");
                alertDiv.innerHTML = "Registro correcto.";
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
}
?>
