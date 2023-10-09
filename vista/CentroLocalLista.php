<!DOCTYPE html>
<html>
<head>
	<title>Centros Locales</title>
    <style>
        body {
            background-color: #f7f7f7;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 4px solid #343a40; /* Cambia el color del borde de las celdas */
        }

        th {
            background-color: #343a40;
            color: #fff;
        }

        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }

        .btn-info:hover {
            background-color: #138496;
            border-color: #117a8b;
        }

        .btn-block {
            width: 100%;
        }

        .alert-danger {
            
        
        background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }

        .alert-danger h3 {
            color: #721c24;
        }
        /* Estilo para filas pares */
        table tr:nth-child(even) {
            background-color: #33cc33;
        }

        /* Estilo para filas impares */
        table tr:nth-child(odd) {
            background-color: #66ff33;
        }
        /* Cambia el color del texto en las celdas de la tabla */
        .table-dark th,
        .table-dark td {
            color: #000; /* Cambia el color del texto a negro (#000) */
        }
        /* Estilo para el título "Lista de Centros Locales" */
        h2 {
            font-size: 34px; /* Tamaño de fuente más grande */
            font-weight: bold; /* Hace que el título sea negrita */
            color: #333; /* Color de texto negro */
            text-align: center; /* Centra el título en la página */
            padding: 10px; /* Añade espacio alrededor del título para resaltarlo */
            background-color: #ffff66; /* Fondo gris claro */
            border-radius: 10px; /* Borde redondeado */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Agrega una sombra */
            margin-top: 20px; /* Espacio superior para separar del contenido anterior */
            margin-bottom: 20px; /* Espacio inferior para separar del contenido siguiente */
        }


    </style>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body style="background-color: #66ffff;">
    <div class="container">
        <h2>Lista de Centros Locales</h2>
        <div class="table-responsive">
            <table  class="table table-dark table-sm">
                
                <tr style = "font-size: 20px; background-color: #66ff99;">
                    <td>Codigo Centro</td>
                    <td>Nombre</td>
                    <td>Telefono</td>
                    <td>Ubicacion</td>
                    <td>Foto</td>
                    <td>pagina</td>
                    <td>eliminar</td>
                    <td>modificar</td>
                </tr>
                <?php
                    $cont=0;
                    while($reg=mysqli_fetch_array($res)){
                        $cont=$cont+1;
                        echo "<tr class='" . ($cont % 2 == 0 ? "even" : "odd") . "'>";
                        echo "<td>".$reg['codCentro']."</td>";
                        echo "<td>".$reg['nombre']."</td>";
                        echo "<td>".$reg['telefono']."</td>";
                        echo "<td>".$reg['ubicacion']."</td>";
                        echo "<td>";
                
                        $rutaDirectorio = $reg['archivo'];
                        $extension = pathinfo($rutaDirectorio, PATHINFO_EXTENSION);

                        if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif'])) {
                            // Si es una imagen, muestra la imagen
                            echo "<img src='../archivosCentrosLocales/$rutaDirectorio' alt='' width='120px' height='100px'>";
                        } elseif (strtolower($extension) == 'pdf') {
                            // Si es un PDF, muestra el PDF en un iframe
                            echo "<iframe src='../archivosCentrosLocales/$rutaDirectorio' width='300' height='200'></iframe>";
                        } elseif (in_array(strtolower($extension), ['mp4', 'avi', 'mkv'])) {
                            // Si es un video, muestra el video en un elemento de video
                            echo "<video width='300' height='200' controls>";
                            echo "<source src='../archivosCentrosLocales/$rutaDirectorio' type='video/$extension'>";
                            echo "Tu navegador no admite la reproducción de video.";
                            echo "</video>";
                        } else {
                            // Si es otro tipo de archivo, muestra un enlace de descarga
                            echo "<a href='../archivosCentrosLocales/$rutaDirectorio' download>Descargar $extension</a>";
                        }

                        echo "</td>";
                        echo "<td>".$reg['pagina']."</td>";

                        echo "<td><a href='../controlador/centroLocalElimina.php?cod=".$reg['codCentro']."' btn='btn-danger' class='btn btn-danger'>Eliminar</a></td>";
                        echo "<td><a href='../controlador/centroLocalModifica.php?cod=".$reg['codCentro']."'  class='btn btn-success'>Modificar</a></td>";
                        echo "</tr>";
                        
                    }
                ?>
            </table>
        </div>
        <?php
            if($cont==0){
                echo "<div style='text-align: center;' class='alert alert-danger' role='alert'>";
                echo "<h3>No hay centros registrados actualmente</h3></div>";
            }
        ?>
        <button type="button" class="btn btn-info" onclick="window.location.href='../controlador/centroLocalRegistro.php'">Ingresar centro</button>
    	<form action="../reportes/reporteCentroLocal.php" method="post" accept-charset="utf-8">
	    <div class="row">
		<button type="submit" class="btn btn-success mb-2">Reporte</button>
	    </div>
	</form>
    </div>
    
</body>
</html>
