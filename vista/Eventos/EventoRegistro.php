<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Registro de nueva evento</title>
</head>
<body>
<div class="container mt-5">
        <form action="" method="POST" enctype="multipart/form-data">
            <h1 class="mb-4">Introduce los datos del evento</h1>
            <div class="mb-3">
                <label for="tipo" class="form-label">Escribe el Tipo de Evento:</label>
                <input type="text" class="form-control" name="tipo" id="tipo" placeholder="Ej. Seminario">
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Ingresa la fecha del evento (YYYY-MM-DD):</label>
                <input type="date" class="form-control" id="fecha" name="fecha" placeholder="YYYY-MM-DD" pattern="\d{4}-\d{2}-\d{2}" required>
            </div>
            <div class="mb-3">
                <label for="titulo" class="form-label">Escribe el título:</label>
                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Seminario para Garantizar a las Mujeres una Vida libre de Violencia">
            </div>
            <div class="mb-3">
                <label for="duracion" class="form-label">Ingresa la duración del evento:</label>
                <input type="text" class="form-control" name="duracion" id="duracion" placeholder="3 horas">
            </div>
            <div class="mb-3">
                <label for="rutaDirectorio" class="form-label">Cargar Archivo (rutaDirectorio):</label>
                <input type="file" class="form-control" name="rutaDirectorio" id="rutaDirectorio" required>
            </div>
            <button type="submit" class="btn btn-primary" name="registrarEvento">Registrar Evento</button>
            <button type="button" class="btn btn-danger" onclick="window.location.href='../controlador/eventoLista.php'">Volver</button>
        </form>
    </div>
    
</body>
</html>
