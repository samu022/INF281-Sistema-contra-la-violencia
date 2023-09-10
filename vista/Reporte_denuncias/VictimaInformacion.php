<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Información de las Victima</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Información de las victimas de la denuncia (Código: <?php echo $cod; ?>)</h1>

    <?php
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
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<p class="mt-4">No se encontraron víctimas.</p>';
    }
    ?>

    <button type="button" class="btn btn-primary mt-3" onclick="window.location.href='../controlador/denunciaLista.php'">Volver</button>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</body>
</html>
