<div class="container-fluid">
<div class="container">
    <h2 style="color: #343a40; text-align: center; margin-top: 20px; font-size: 70px; font-weight: bold;">Lista de eventos</h2>
        <table  class="table table-dark table-sm" >
 
            <tr>
                <td>codigo evento</td>
                <td>tipo</td>
                <td>Fecha del evento</td>
                <td>titulo</td>
                <td>descripcion</td>
                <td>tipo de violencia</td>
                <td>Hora Inicio</td>
                <td>Hora Final</td>
                <td>Modalidad</td>
                <td>Detalle</td>
                <td>Expositor</td>
                <td>Fecha subida</td>
                <td>archivo</td>
                <td>Eliminar</td>
                <td>Modificar</td>
            </tr>
            <?php
                $cont=0;
                while($reg=mysqli_fetch_array($res)){
                    $cont=$cont+1;
                    echo "<tr>";
                    echo "<td>".$reg['codEvento']."</td>";
                    echo "<td>".$reg['tipo']."</td>";
                    echo "<td>".$reg['fecha']."</td>";
                    echo "<td>".$reg['titulo']."</td>";
                    echo "<td>".$reg['descripcion']."</td>";
                    echo "<td>".$reg['tipoViolencia']."</td>";
                    echo "<td>".$reg['horaInicio']."</td>";
                    echo "<td>".$reg['horaFinal']."</td>";
                    echo "<td>".$reg['modalidad']."</td>";
                    echo "<td>".$reg['detalleEvento']."</td>";
                    echo "<td>".$reg['expositor']."</td>";
                    echo "<td>".$reg['fechaSubida']."</td>";
                    $rutaDirectorio = $reg['rutaDirectorio'];
                    $extension = pathinfo($rutaDirectorio, PATHINFO_EXTENSION);

                    echo "<td>";

                    if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif'])) {
                        // Si es una imagen, muestra la imagen
                        echo "<img src='../archivosEventos/$rutaDirectorio' alt='' width='120px' height='100px'>";
                    } elseif (strtolower($extension) == 'pdf') {
                        // Si es un PDF, muestra el PDF en un iframe
                        echo "<iframe src='../archivosEventos/$rutaDirectorio' width='300' height='200'></iframe>";
                    } elseif (in_array(strtolower($extension), ['mp4', 'avi', 'mkv'])) {
                        // Si es un video, muestra el video en un elemento de video
                        echo "<video width='300' height='200' controls>";
                        echo "<source src='../archivosEventos/$rutaDirectorio' type='video/$extension'>";
                        echo "Tu navegador no admite la reproducción de video.";
                        echo "</video>";
                    } else {
                        // Si es otro tipo de archivo, muestra un enlace de descarga
                        echo "<a href='../archivosEventos/$rutaDirectorio' download>Descargar $extension</a>";
                    }

                    echo "</td>";

                    echo "<td><a href='../controlador/eventoElimina.php?cod=".$reg['codEvento']."' btn='btn-danger' class='btn btn-danger'>Eliminar</a></td>";
                    echo "<td><a href='../controlador/eventoModifica.php?cod=".$reg['codEvento']."'  class='btn btn-success'>Modificar</a></td>";
                    echo "</tr>";
                    
                }
            ?>
        </table>
    <?php
        if($cont==0){
            echo "<div style='text-align: center;' class='alert alert-danger' role='alert'>";
            echo "<h3>No hay eventos registrados</h3></div>";
        }
    ?>
    <button type="button" class="btn btn-info" onclick="window.location.href='../controlador/eventoRegistro.php'">Ingresar nuevo evento</button>
    <form action="../reportes/reporteEventos.php" method="post" accept-charset="utf-8">
        <div class="row">
            <button type="submit" class="btn btn-success mb-2">Reporte de eventos</button>
        </div>
    </form>
    <form action="../vista/eventos/calendario.php" method="post" accept-charset="utf-8">
        <div class="row">
            <button type="submit" class="btn btn-info mb-2">Ver calendario</button>
        </div>
    </form>  
</div>
    </div>
</body>
</html>
