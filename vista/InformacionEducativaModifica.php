<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Modificar Información Educativa</title>
</head>
<body>
    <div class="container mt-5">
        <form action="" method="POST" enctype="multipart/form-data">
            <h1 class="mb-4">Modificar Información Educativa</h1>
            <div class="mb-3">
                <label for="tipo" class="form-label">Seleccione el Tipo de Información:</label>
                <select class="form-select" id="tipo" name="tipo">
                    <option value="PDF" <?php echo ($tipo === "PDF") ? "selected" : ""; ?>>PDF</option>
                    <option value="Video" <?php echo ($tipo === "Video") ? "selected" : ""; ?>>Video</option>
                    <option value="Imagen" <?php echo ($tipo === "Imagen") ? "selected" : ""; ?>>Imagen</option>
                    <!-- Agrega otros tipos de archivos según tus necesidades -->
                </select>
            </div>


            <div class="mb-3">
                <label for="archivo" class="form-label">Cargar Archivo:</label>
                <input type="file" class="form-control" name="archivo" id="archivo">
            </div>
            <button type="submit" class="btn btn-primary" name="ModificarInformacion">Modificar Información</button>
            <button type="button" class="btn btn-danger" onclick="window.location.href='../controlador/informacionEducativaLista.php'">Cancelar</button>
        </form>
    </div>
</body>
</html>
