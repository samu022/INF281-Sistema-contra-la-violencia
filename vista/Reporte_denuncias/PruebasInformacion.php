<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pruebas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Pruebas de la denuncia (Código: <?php echo $cod; ?>)</h1>

    <?php
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
    ?>

    <button type="button" class="btn btn-primary mt-3" onclick="window.location.href='../controlador/denunciaLista.php'">Volver</button>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</body>
</html>
