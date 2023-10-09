<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agresores Registrados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <h1>Tabla de Agresores</h1>
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
                <th scope="col">Teléfono</th>
                <th scope="col">Descripción</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($agresores as $agresor) {
                echo '<tr>';
                echo '<th scope="row">' . $agresor['ci'] . '</th>';
                echo '<td>' . $agresor['nombres'] . '</td>';
                echo '<td>' . $agresor['apellidoP'] . '</td>';
                echo '<td>' . $agresor['apellidoM'] . '</td>';
                echo '<td>' . $agresor['fechaNacimiento'] . '</td>';
                echo '<td>' . $agresor['sexo'] . '</td>';
                echo '<td>' . $agresor['direccion'] . '</td>';
                echo '<td>' . $agresor['estado_civil'] . '</td>';
                echo '<td>' . $agresor['profesion'] . '</td>';
                echo '<td>' . $agresor['telefono'] . '</td>';
                echo '<td>' . $agresor['descripcion'] . '</td>';
                echo '<td>
                        <form method="POST">
                            <input type="hidden" name="idAgresorEliminar" value="' . $agresor['ci'] . '">
                            <button type="submit" name="eliminarAgresor" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
    <button type="button" class="btn btn-danger" onclick="window.location.href='../controlador/agresorRegistro.php'">Atrás</button>
</body>
</html>