<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Registro de nueva Ley</title>
</head>
<body>
    <div class="container mt-5">
        <form action="" method="POST">
            <h1 class="mb-4">Bienvenido al Registro de Ley Normativa</h1>
            <div class="mb-3">
                <label for="nom" class="form-label">Escriba Nombre Ley:</label>
                <input type="text" class="form-control" name="nom" id="nom" placeholder="Ej. Ley 348">
            </div>
            <div class="mb-3">
                <label for="fechaPromulgacion" class="form-label">Ingrese la fecha de promulgación (YYYY-MM-DD):</label>
                <input type="text" class="form-control" id="fechaPromulgacion" name="fechaPromulgacion" placeholder="YYYY-MM-DD" pattern="\d{4}-\d{2}-\d{2}" required>
            </div>
            
            <div class="mb-3">
                <label for="tem" class="form-label">Escriba Temática:</label>
                <input type="text" class="form-control" name="tem" id="tem" placeholder="Ley Integral para Garantizar a las Mujeres una Vida libre de Violencia">
            </div>
            <div class="mb-3">
                <label for="ref" class="form-label">Ingrese Link de Referencia:</label>
                <input type="text" class="form-control" name="ref" id="ref" placeholder="https://bolivia.unfpa.org/sites/default/files/pub-pdf/Ley_348_0_1.pdf">
            </div>
            <button type="submit" class="btn btn-primary" name="RegistrarLey">Registrar Ley</button>
            <button type="button" class="btn btn-danger" onclick="window.location.href='../controlador/leyLista.php'">Volver</button>
        </form>
    </div>
    
</body>
</html>
