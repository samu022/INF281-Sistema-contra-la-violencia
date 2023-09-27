<!DOCTYPE html>
<html>
<head>
    <title>Informacion Educativa</title>
    <!-- Incluye el archivo de estilos de Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #66ffff;">
<div class="container">
    <h2 style="color: #343a40; text-align: center; margin-top: 20px; font-size: 70px; font-weight: bold;">Lista de informacion educativa</h2>
    <table class="table table-dark table-bordered">
        <tr>
            <th>Código Información</th>
            <th>Título</th>
            <th>Descripción</th>
            <th>Tipo de Violencia</th>
            <th>Tipo</th>
            <th>Fecha de Subida</th>
            <th>Archivo</th>
            <th>Acciones</th>
        </tr>
        <?php
        $cont = 0;
        while ($reg = mysqli_fetch_array($res)) {
            $cont = $cont + 1;
            echo "<tr>";
            echo "<td>" . $reg['codInformacion'] . "</td>";
            echo "<td>" . $reg['titulo'] . "</td>";
            echo "<td>" . $reg['descripcion'] . "</td>";
            echo "<td>" . $reg['tipoViolencia'] . "</td>";
            echo "<td>" . $reg['tipo'] . "</td>";
            echo "<td>" . $reg['fechaSubida'] . "</td>";
            echo "<td>";
            
            $rutaDirectorio = $reg['rutaDirectorio'];
            $extension = pathinfo($rutaDirectorio, PATHINFO_EXTENSION);

            if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif'])) {
                // Si es una imagen, muestra la imagen
                echo "<img src='../archivosInformacionEducativa/$rutaDirectorio' alt='' width='120px' height='100px'>";
            } elseif (strtolower($extension) == 'pdf') {
                // Si es un PDF, muestra el PDF en un iframe
                echo "<iframe src='../archivosInformacionEducativa/$rutaDirectorio' width='300' height='200'></iframe>";
            } elseif (in_array(strtolower($extension), ['mp4', 'avi', 'mkv'])) {
                // Si es un video, muestra el video en un elemento de video
                echo "<video width='300' height='200' controls>";
                echo "<source src='../archivosInformacionEducativa/$rutaDirectorio' type='video/$extension'>";
                echo "Tu navegador no admite la reproducción de video.";
                echo "</video>";
            } else {
                // Si es otro tipo de archivo, muestra un enlace de descarga
                echo "<a href='../archivosInformacionEducativa/$rutaDirectorio' download>Descargar $extension</a>";
            }

            echo "</td>";

            echo "<td>";
            echo "<a href='../controlador/informacionEducativaElimina.php?codInformacion=" . $reg['codInformacion'] . "' btn='btn-danger' class='btn btn-danger'>Eliminar</a>";
            echo "<a href='../controlador/informacionEducativaModifica.php?codInformacion=" . $reg['codInformacion'] . "' class='btn btn-success'>Modificar</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <?php
    if ($cont == 0) {
        echo "<div style='text-align: center;' class='alert alert-danger' role='alert'>";
        echo "<h3>No hay informaciones registradas</h3></div>";
    }
    ?>
    <button type="button" class="btn btn-info" onclick="window.location.href='../controlador/informacionEducativaRegistro.php'">Ingresar nueva Información Educativa</button>
    <form action="../reportes/reporteInformacionEducativa.php" method="post" accept-charset="utf-8">
        <div class="row">
            <button type="submit" class="btn btn-success mb-2">Reporte de informacion educativa</button>
        </div>
    </form>
</div>
</body>
</html>
