<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Víctimas Registradas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <h1>Tabla de Víctimas</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">CI</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellido Paterno</th>
                <th scope="col">Apellido Materno</th>
                <th scope="col">Fecha de Nacimiento</th>
                <th scope="col">Sexo</th>
                <th scope="col">Dirección</th>
                <th scope="col">Estado Civil</th>
                <th scope="col">Profesión</th>
                <th scope="col">Relación</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($victimas as $victima) {
                echo '<tr>';
                echo '<th scope="row">' . $victima['ci'] . '</th>';
                echo '<td>' . $victima['nombres'] . '</td>';
                echo '<td>' . $victima['apellidoP'] . '</td>';
                echo '<td>' . $victima['apellidoM'] . '</td>';
                echo '<td>' . $victima['fechaNacimiento'] . '</td>';
                echo '<td>' . $victima['sexo'] . '</td>';
                echo '<td>' . $victima['direccion'] . '</td>';
                echo '<td>' . $victima['estado_civil'] . '</td>';
                echo '<td>' . $victima['profesion'] . '</td>';
                echo '<td>' . $victima['relacion'] . '</td>';
                echo '<td>' . $victima['telefono'] . '</td>';
                echo '<td>
                        <form method="POST">
                            <input type="hidden" name="idVictimaEliminar" value="' . $victima['ci'] . '">
                            <button type="submit" name="eliminarVictima" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
    <button type="button" class="btn btn-danger" onclick="window.location.href='../controlador/victimaRegistro.php'">Atrás</button>
</body>
</html>
