<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registrar Contacto de Emergencia</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Registrar Contacto de Emergencia</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required>
            </div>
            <div class="form-group">
                <label for="parentesco">Parentesco:</label>
                <input type="text" class="form-control" id="parentesco" name="parentesco" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
            <a href="../controlador/contactoEmergenciaLista.php" class="btn btn-danger">Volver</a>
        </form>
    </div>
    <!-- Enlaces a Bootstrap JS y jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    if (typeof mensaje !== 'undefined') {
        alert(mensaje);
    }
</script>
</body>
</html>
