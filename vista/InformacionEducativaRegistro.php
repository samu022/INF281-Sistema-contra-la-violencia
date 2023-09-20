<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Registro de Información Educativa</title>
</head>
<body>
    <div class="container mt-5">
        <form action="" method="POST" enctype="multipart/form-data">
            <h1 class="mb-4">Registro de Información Educativa</h1>
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="tipoViolencia" class="form-label">Seleccione el tipo de violencia:</label>
                <select class="form-select" name="tipoViolencia" id="tipoViolencia" required>
                    <option value="Violencia física">Violencia física</option>
                    <option value="Violencia psicológica o emocional">Violencia psicológica o emocional</option>
                    <option value="Violencia verbal">Violencia verbal</option>
                    <option value="Violencia sexual">Violencia sexual</option>
                    <option value="Violencia doméstica o de pareja">Violencia doméstica o de pareja</option>
                    <option value="Violencia escolar o bullying">Violencia escolar o bullying</option>
                    <option value="Violencia racial o xenofobia">Violencia racial o xenofobia</option>
                    <option value="Violencia económica">Violencia económica</option>
                    <option value="Violencia política">Violencia política</option>
                    <option value="Violencia en línea o ciberacoso">Violencia en línea o ciberacoso</option>
                    <option value="Violencia de género">Violencia de género</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="tipo" class="form-label">Seleccione el Tipo de Información:</label>
                <select class="form-select" id="tipo" name="tipo">
                    <option value="PDF">PDF</option>
                    <option value="Video">Video</option>
                    <option value="Imagen">Imagen</option>
                    <!-- Agrega otros tipos de archivos según tus necesidades -->
                </select>
            </div>
            <div class="mb-3">
                <label for="archivo" class="form-label">Cargar Archivo:</label>
                <input type="file" class="form-control" name="archivo" id="archivo" required>
            </div>
            <button type="submit" class="btn btn-primary" name="registrarInformacion">Registrar Información</button>
            <button type="button" class="btn btn-danger" onclick="window.location.href='../controlador/informacionEducativaLista.php'">Volver</button>
        </form>
    </div>
</body>
</html>

