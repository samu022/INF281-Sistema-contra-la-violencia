<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Modificar Centro Local</title>
</head>
<body>
<h1>Centro Local a modificar</h1>
    <table  class="table table-dark table-sm">
        <tr>
            <td>Codigo Centro</td>
            <td>Nombre</td>
            <td>Telefono</td>
            <td>Ubicacion</td>
        </tr>
        <?php
            echo "<tr>";
            echo "<td>".$cod."</td>";
            echo "<td>".$nombre."</td>";
            echo "<td>".$telefono."</td>";
            echo "<td>".$ubicacion."</td>";
            echo "</tr>";
        ?>
    </table>

    <div class="container mt-5">
        <form action="" method="POST" enctype="multipart/form-data">
            <h1 class="mb-4">Modificacion del centro Local</h1>
            <div class="mb-3">
                <label for="nombre" class="form-label">Escriba Nombre del centro:</label>
                <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $nombre; ?>">
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Escriba el telefono del centro:</label>
                <input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo $telefono; ?>">
            </div>
            <div class="mb-3">
                <label for="ubicacion" class="form-label">Ingrese la ubicacion del centro:</label>
                <input type="text" class="form-control" name="ubicacion" id="ubicacion" value="<?php echo $ubicacion; ?>">
            </div>
            <div class="mb-3">
                <label for="archivo" class="form-label">Cargar Archivo:</label>
                <input type="file" class="form-control" name="archivo" id="archivo">
            </div>
            <button type="submit" class="btn btn-primary" name="ModificarCentro">Modificar Centro</button>
            <button type="button" class="btn btn-danger" onclick="window.location.href='../controlador/centroLocalLista.php'">Volver</button>
        </form>
    </div>
</body>
</html>
