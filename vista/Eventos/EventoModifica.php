<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Modificar Ley</title>
</head>
<body>
    <h1>Evento a modificar</h1>
    <table  class="table table-dark table-sm">
        
        <tr>
            <td>Codigo Del Evento</td>
            <td>Tipo</td>
            <td>Fecha</td>
            <td>Titulo</td>
            <td>Duracion</td>
        </tr>
        <?php
                echo "<tr>";
                echo "<td>".$codEvento."</td>";
                echo "<td>".$tipo."</td>";
                echo "<td>".$fecha."</td>";
                echo "<td>".$titulo."</td>";
                echo "<td>".$duracion."</td>";                
                echo "</tr>";
        ?>
    </table>

    <div class="container mt-5">
        <form action="" method="POST" enctype="multipart/form-data">
            <h1 class="mb-4">Modificar Evento</h1>
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo de evento:</label>
                <input type="text" class="form-control" name="tipo" id="tipo" value="<?php echo $tipo; ?>">
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha del evento (YYYY-MM-DD):</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $fecha; ?>" pattern="\d{4}-\d{2}-\d{2}" required>
            </div>
            <div class="mb-3">
                <label for="titulo" class="form-label">Título del evento:</label>
                <input type="text" class="form-control" name="titulo" id="titulo" value="<?php echo $titulo; ?>">
            </div>
            <div class="mb-3">
                <label for="duracion" class="form-label">Duración del evento:</label>
                <input type="text" class="form-control" name="duracion" id="duracion" value="<?php echo $duracion; ?>">
            </div>
            <div class="mb-3">
                <label for="rutaDirectorio" class="form-label">Cargar Archivo (rutaDirectorio):</label>
                <input type="file" class="form-control" name="rutaDirectorio" id="rutaDirectorio">
            </div>
            <button type="submit" class="btn btn-primary" name="ModificarEvento">Modificar Evento</button>
            <button type="button" class="btn btn-danger" onclick="window.location.href='../controlador/eventoLista.php'">Cancelar</button>
        </form>
    </div>
</body>
</html>
