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
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" name="titulo" id="titulo" value="<?php echo $titulo; ?>">
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea class="form-control" name="descripcion" id="descripcion"><?php echo $descripcion; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="tipoViolencia" class="form-label">Seleccione el tipo de violencia:</label>
                <select class="form-select" name="tipoViolencia" id="tipoViolencia" required>
                    <option value="Violencia física" <?php if ($tipoViolencia === "Violencia física") echo "selected"; ?>>Violencia física</option>
                    <option value="Violencia psicológica o emocional" <?php if ($tipoViolencia === "Violencia psicológica o emocional") echo "selected"; ?>>Violencia psicológica o emocional</option>
                    <option value="Violencia verbal" <?php if ($tipoViolencia === "Violencia verbal") echo "selected"; ?>>Violencia verbal</option>
                    <option value="Violencia sexual" <?php if ($tipoViolencia === "Violencia sexual") echo "selected"; ?>>Violencia sexual</option>
                    <option value="Violencia doméstica o de pareja" <?php if ($tipoViolencia === "Violencia doméstica o de pareja") echo "selected"; ?>>Violencia doméstica o de pareja</option>
                    <option value="Violencia escolar o bullying" <?php if ($tipoViolencia === "Violencia escolar o bullying") echo "selected"; ?>>Violencia escolar o bullying</option>
                    <option value="Violencia racial o xenofobia" <?php if ($tipoViolencia === "Violencia racial o xenofobia") echo "selected"; ?>>Violencia racial o xenofobia</option>
                    <option value="Violencia económica" <?php if ($tipoViolencia === "Violencia económica") echo "selected"; ?>>Violencia económica</option>
                    <option value="Violencia política" <?php if ($tipoViolencia === "Violencia política") echo "selected"; ?>>Violencia política</option>
                    <option value="Violencia en línea o ciberacoso" <?php if ($tipoViolencia === "Violencia en línea o ciberacoso") echo "selected"; ?>>Violencia en línea o ciberacoso</option>
                    <option value="Violencia de género" <?php if ($tipoViolencia === "Violencia de género") echo "selected"; ?>>Violencia de género</option>
                </select>
            </div>

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
