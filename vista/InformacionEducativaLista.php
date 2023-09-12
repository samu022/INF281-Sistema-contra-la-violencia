<!DOCTYPE html>
<html>
<head>
    
	<title>Informacion Educativa</title>
    <!-- Incluye el archivo de estilos de Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    -->
</head>
<body style="background-color: #66ffff;">
<div class="container">
    <h2 style="color: #343a40; text-align: center; margin-top: 20px; font-size: 70px; font-weight: bold;">Lista de informacion educativa</h2>
        <table  class="table table-dark table-bordered"  >
            <tr>
                <td>codigo informacion</td>
                <td>Informacion Educativa</td>
                <td>Tipo</td>
                <td>Eliminar</td>
                <td>Modificar</td>
            </tr>
            <?php
            $cont = 0;
            while ($reg = mysqli_fetch_array($res)) {
                $cont = $cont + 1;
                echo "<tr>";
                echo "<td>" . $reg['codInformacion'] . "</td>";
                echo "<td>" . $reg['tipo'] . "</td>";

                $rutaDirectorio = $reg['rutaDirectorio'];
                $extension = pathinfo($rutaDirectorio, PATHINFO_EXTENSION);

                echo "<td>";

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

                echo "<td><a href='../controlador/informacionEducativaElimina.php?codInformacion=" . $reg['codInformacion'] . "' btn='btn-danger' class='btn btn-danger'>Eliminar</a></td>";
                echo "<td><a href='../controlador/informacionEducativaModifica.php?codInformacion=" . $reg['codInformacion'] . "'  class='btn btn-success'>Modificar</a></td>";
                echo "</tr>";
            }
            ?>

        </table>
    <?php
        if($cont==0){
            echo "<div style='text-align: center;' class='alert alert-danger' role='alert'>";
            echo "<h3>No hay informaciones registrados</h3></div>";
        }
    ?>
    <button type="button" class="btn btn-info" onclick="window.location.href='../controlador/informacionEducativaRegistro.php'">Ingresar nuevo informacion eductiva</button>
    </div>
</body>
</html>