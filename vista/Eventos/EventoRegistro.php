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
                <label for="descripcion" class="form-label">Descripción del evento:</label>
                <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Descripción del evento"></textarea>
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
                <label for="horaInicio" class="form-label">Hora de Inicio:</label>
                <input type="text" class="form-control" name="horaInicio" id="horaInicio" placeholder="Hora de Inicio">
            </div>
            <div class="mb-3">
                <label for="horaFinal" class="form-label">Hora de Finalización:</label>
                <input type="text" class="form-control" name="horaFinal" id="horaFinal" placeholder="Hora de Finalización">
            </div>
            <div class="mb-3">
                <label for="modalidad" class="form-label">Modalidad:</label>
                <select class="form-select" name="modalidad" id="modalidad" required>
                    <option value="Presencial">Presencial</option>
                    <option value="Virtual">Virtual</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="detalleEvento" class="form-label">Detalles del evento:</label>
                <textarea class="form-control" name="detalleEvento" id="detalleEvento" placeholder="Detalles del evento Link en caso de virtual y direccion en caso de presencial"></textarea>
            </div>
            <div class="mb-3">
                <label for="expositor" class="form-label">Expositor:</label>
                <input type="text" class="form-control" name="expositor" id="expositor" placeholder="Expositor del evento">
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

