<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modificar Contacto de Emergencia</title>
    <!-- Agregar enlaces a Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Agregar tu propio archivo de CSS para personalizar -->
    <link rel="stylesheet" href="tu_estilo.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Modificar Contacto de Emergencia</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>CI Contacto</th>
                    <th>Parentesco</th>
                    <th>Teléfono</th>
                    <th>CI Usuario</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $ci_contacto; ?></td>
                    <td><?php echo $parentesco; ?></td>
                    <td><?php echo $telefono; ?></td>
                    <td><?php echo $ci_usuario; ?></td>
                </tr>
            </tbody>
        </table>
        <form action="" method="POST">
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required>
            </div>
            <div class="form-group">
                <label for="parentesco">Parentesco:</label>
                <input type="text" class="form-control" id="parentesco" name="parentesco" required>
            </div>
            <button type="submit" class="btn btn-primary">Modificar</button>
            <a href="../controlador/contactoEmergencia.php" class="btn btn-danger">Volver</a>
        </form>
    </div>
    <!-- Agregar enlaces a Bootstrap JS y jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
