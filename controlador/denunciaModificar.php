<?php

include_once("../modelo/conexion.php");
include("../modelo/administrador.php");
include("control_cookies.php"); 

//include("../modelo/conexion.php");
$cod = $_GET['cod'];
include("../modelo/DenunciaClase.php");
$car = new Denuncia($cod, "", "", "", "","","");
$res = $car->lista_especifica();
$reg = $res->fetch_assoc();
$tipo = $reg['tipo'];
$descripcion = $reg['descripcion'];
// Check if 'testigo' is set in the $_POST array before accessing it
$testigo = isset($_POST['testigo']) ? $_POST['testigo'] : null;


$seguimiento = $reg['seguimiento'];
$fecha = $reg['fecha'];


include("../vista/Reporte_denuncias/denunciaModificar.php");

if (isset($_POST['ModificarDenuncia'])) {
    $tipo = $_POST['tipo'];
    $descripcion = $_POST['descripcion'];
    //$seguimiento = $_POST['seguimiento'];
    $fecha = $_POST['fecha']; // Supongamos que la fecha está en formato dd-mm-yyyy
    $fecha = date("Y-m-d", strtotime($fecha));

    // Check if 'testigo' is set in the $_POST array before accessing it
    $testigo = isset($_POST['testigo']) ? $_POST['testigo'] : null;

    // $carg=new Ley_Normativa($cod,$nom,$fecha_prom,$tem,$inf);
    $car->setTipo($tipo);
    $car->setDescripcion($descripcion);
    $car->setTestigo($testigo);
    //$car->setSeguimiento($seguimiento);
    $car->setFecha($fecha);
    $res = $car->modifica();

    if ($res) {
        echo "<script>
                alert('se Modifico correctamente');
                location.href='denunciaLista.php';
                </script>";
    } else {
        echo "No se registró";
    }
}

//datos victimas
include("../modelo/VictimaClase.php");
include("../modelo/PersonaClase.php");
$carVictima=new Victima("","",$cod);
$resVictima = $carVictima->lista_especifica_denuncia();
echo "<h1>VICTIMAS</h1>";
// Comprobar si se encontraron víctimas
if ($resVictima->num_rows > 0) {
    echo '<table class="table mt-4">';
    echo '<thead class="thead-dark">';
    echo '<tr>';
    echo '<th scope="col">Cédula</th>';
    echo '<th scope="col">Nombres</th>';
    echo '<th scope="col">Apellido Paterno</th>';
    echo '<th scope="col">Apellido Materno</th>';
    echo '<th scope="col">Fecha de Nacimiento</th>';
    echo '<th scope="col">Sexo</th>';
    echo '<th scope="col">Dirección</th>';
    echo '<th scope="col">Estado Civil</th>';
    echo '<th scope="col">Profesión</th>';
    echo '<th scope="col">Teléfono</th>';
    echo '<th scope="col">Relación Perpetrador</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($rowVictima = $resVictima->fetch_assoc()) {
        $ci = $rowVictima['ci'];
        $carPer = new Persona($ci, "", "", "", "","","","","","");
        $resPer = $carPer->lista_especifica();
        $regPer = $resPer->fetch_assoc();
        $nombres = $regPer['nombre'];
        $apellidoP = $regPer['apePaterno'];
        $apellidoM = $regPer['apeMaterno'];
        $fechaNacimiento = $regPer['fechaNaci'];
        $sexo = $regPer['sexo'];
        $direccion = $regPer['direccion'];
        $estadoCivil = $regPer['estado_civil'];
        $profesion = $regPer['profesion'];
        $telefono = $regPer['telefono'];
        $relacion = $rowVictima['relacion_perpetrador'];

        echo '<tr>';
        echo '<td>' . $ci . '</td>';
        echo '<td>' . $nombres . '</td>';
        echo '<td>' . $apellidoP . '</td>';
        echo '<td>' . $apellidoM . '</td>';
        echo '<td>' . $fechaNacimiento . '</td>';
        echo '<td>' . $sexo . '</td>';
        echo '<td>' . $direccion . '</td>';
        echo '<td>' . $estadoCivil . '</td>';
        echo '<td>' . $profesion . '</td>';
        echo '<td>' . $telefono . '</td>';
        echo '<td>' . $relacion . '</td>';
        // Agregar un botón "Modificar" que redirija a la página de modificación
        echo '<td><a href="victimaModificar.php?ci=' . $ci . '&cod=' . $cod . '" class="btn btn-primary">Modificar</a></td>';
    
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo "<div style='text-align: center;' class='alert alert-danger' role='alert'>";
    echo "<h3>No se encontraron victimas</h3></div>";
}
//agresores:
include("../modelo/AgresorClase.php");
include("../modelo/RealizaClase.php");
$carRealiza=new Realiza("",$cod,"","");
$resRealiza = $carRealiza->listaEspecifica();
echo "<h1>AGRESORES: </h1>";
// Comprobar si se encontraron víctimas
if ($resRealiza->num_rows > 0) {
    echo '<table class="table mt-4">';
    echo '<thead class="thead-dark">';
    echo '<tr>';
    echo '<th scope="col">Cédula</th>';
    echo '<th scope="col">Nombres</th>';
    echo '<th scope="col">Apellido Paterno</th>';
    echo '<th scope="col">Apellido Materno</th>';
    echo '<th scope="col">Fecha de Nacimiento</th>';
    echo '<th scope="col">Sexo</th>';
    echo '<th scope="col">Dirección</th>';
    echo '<th scope="col">Estado Civil</th>';
    echo '<th scope="col">Profesión</th>';
    echo '<th scope="col">Teléfono</th>';
    echo '<th scope="col">Descripción</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($rowRealiza = $resRealiza->fetch_assoc()) {
        $ci = $rowRealiza['ci'];
        $carAg = new Agresor($ci, "");
        $resAg = $carAg->lista_especifica();
        $regAg = $resAg->fetch_assoc();
        
        $carPer = new Persona($ci, "", "", "", "","","","","","");
        $resPer = $carPer->lista_especifica();
        $regPer = $resPer->fetch_assoc();
        $nombres = $regPer['nombre'];
        $apellidoP = $regPer['apePaterno'];
        $apellidoM = $regPer['apeMaterno'];
        $fechaNacimiento = $regPer['fechaNaci'];
        $sexo = $regPer['sexo'];
        $direccion = $regPer['direccion'];
        $estadoCivil = $regPer['estado_civil'];
        $profesion = $regPer['profesion'];
        $telefono = $regPer['telefono'];
        $descripcion = $regAg['descripcion'];

        echo '<tr>';
        echo '<td>' . $ci . '</td>';
        echo '<td>' . $nombres . '</td>';
        echo '<td>' . $apellidoP . '</td>';
        echo '<td>' . $apellidoM . '</td>';
        echo '<td>' . $fechaNacimiento . '</td>';
        echo '<td>' . $sexo . '</td>';
        echo '<td>' . $direccion . '</td>';
        echo '<td>' . $estadoCivil . '</td>';
        echo '<td>' . $profesion . '</td>';
        echo '<td>' . $telefono . '</td>';
        echo '<td>' . $descripcion . '</td>';
        echo '<td><a href="agresorModificar.php?ci=' . $ci . '&cod=' . $cod . '" class="btn btn-primary">Cambiar</a></td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo "<div style='text-align: center;' class='alert alert-danger' role='alert'>";
    echo "<h3>No se encontraron agresores</h3></div>";
}

//PRUEBAS
include("../modelo/PruebaClase.php");
include("../modelo/Incidente_PruebaClase.php");
$carIP=new Incidente_Prueba($cod,"");
$resIP = $carIP->lista_especifica();
echo "<h1>Pruebas</h1>";
// Comprobar si se encontraron pruebas
if ($resIP->num_rows > 0) {
    echo '<table class="table mt-4">';
    echo '<thead class="thead-dark">';
    echo '<tr>';
    echo '<th scope="col">Cod Prueba</th>';
    echo '<th scope="col">Tipo</th>';
    echo '<th scope="col">Descripción</th>';
    echo '<th scope="col">Ruta</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($rowIP = $resIP->fetch_assoc()) {
        $codPrueba = $rowIP['codPrueba'];
        $carPrueba = new Prueba($codPrueba, "", "", "");
        $resPrueba = $carPrueba->lista_especifica();
        $regPrueba = $resPrueba->fetch_assoc();
        $tipo = $regPrueba['tipo'];
        $descripcion = $regPrueba['descripcion'];
        $ruta = $regPrueba['ruta'];
        
        echo '<tr>';
        echo '<td>' . $codPrueba . '</td>';
        echo '<td>' . $tipo . '</td>';
        echo '<td>' . $descripcion . '</td>';
        echo '<td><a href="' . $ruta . '" target="_blank">Abrir</a></td>';
        echo '<td><a href="pruebaModificar.php?codPrueba=' . $codPrueba . '&cod=' . $cod . '" class="btn btn-primary">Cambiar</a></td>';
        echo '</tr>';
        
        // Determinar el tipo de archivo en función de la extensión
        $extension = pathinfo($ruta, PATHINFO_EXTENSION);
        echo '<tr>';
        echo '<td colspan="4" class="text-center">'; // Agrega la clase text-center
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
            // Si es una imagen
            echo '<img src="' . $ruta . '" alt="Multimedia" width="300">';
        } elseif (in_array($extension, ['mp4', 'avi', 'mov', 'mkv'])) {
            // Si es un video
            echo '<video width="320" height="240" controls>';
            echo '<source src="' . $ruta . '" type="video/mp4">';
            echo 'Tu navegador no admite la reproducción de video.';
            echo '</video>';
        } elseif (in_array($extension, ['pdf'])) {
            // Si es un PDF
            echo '<embed src="' . $ruta . '" type="application/pdf" width="100%" height="600px">';
        }
        echo '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo '<p class="mt-4">No se encontraron pruebas.</p>';
}

//Geolocalizacion
include("geoModificar.php");

?>
<button type="button" class="btn btn-primary mt-3" onclick="window.location.href='../controlador/denunciaLista.php'">Volver</button>
</body>
</html>
