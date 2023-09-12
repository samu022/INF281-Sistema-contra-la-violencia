<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Registro de nuevo centro</title>
</head>
<body>
    <div class="container mt-5">
        <form action="" method="POST">
            <h1 class="mb-4">Bienvenido al Registro Centro Local</h1>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del centro local:</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="centro contra la violencia">
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Ingrese el telefono del centro:</label>
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="" required>
            </div>
            
            <div class="mb-3">
                <label for="ubicacion" class="form-label">Ingrese la ubicacion del centro:</label>
                <input type="text" class="form-control" name="ubicacion" id="ubicacion" placeholder="Avenida 2,Zona Sur La Paz">
            </div>
            <button type="submit" class="btn btn-primary" name="RegistrarCentro">Registrar Centro</button>
            <button type="button" class="btn btn-danger" onclick="window.location.href='../controlador/centroLocalLista.php'">Volver</button>
        </form>
    </div>
    
</body>
</html>
