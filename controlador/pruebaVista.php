<?php
session_start();
$datosPruebas = $_SESSION['datosPruebas'];
if (isset($_POST['indiceEliminar'])) {
    $indice = $_POST['indiceEliminar'];
    
    if (isset($_SESSION['datosPruebas'][$indice])) {
        // Elimina la prueba del array
        unset($_SESSION['datosPruebas'][$indice]);
        // Reindexa el array para que los índices sean continuos
        $_SESSION['datosPruebas'] = array_values($_SESSION['datosPruebas']);
        // Redirige de nuevo a la página de pruebas registradas
        
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pruebas Registradas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <h1>Pruebas Registradas</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Archivo</th>
            <th>Descripción</th>
            <th>Acciones</th> <!-- Agregamos una nueva columna para las acciones -->
        </tr>
    </thead>
    <tbody>
        <?php
       
        if (isset($_SESSION['datosPruebas'])) {
            
            foreach ($datosPruebas as $indice => $datos) {
                echo '<tr>';
                echo '<td><a href="' . $datos['rutaArchivo'] . '" target="_blank">' . $datos['rutaArchivo'] . '</a></td>';
                echo '<td>' . $datos['descripcion'] . '</td>';
                echo '<td><form method="POST" action="">'; // Reemplaza 'eliminar_prueba.php' con la URL correcta
                echo '<input type="hidden" name="indiceEliminar" value="' . $indice . '">';
                echo '<button type="submit" class="btn btn-danger">Eliminar</button>';
                echo '</form></td>';
                echo '</tr>';
            }
        }
        ?>
    </tbody>
</table>
    <button type="button" class="btn btn-danger" onclick="window.location.href='../controlador/pruebaRegistro.php'">Atrás</button>
</body>
</html>
