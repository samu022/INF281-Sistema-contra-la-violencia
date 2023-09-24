<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Registro de nuevo Administrador</title>
</head>
<body>
    <div class="container mt-5">
        <form action="" method="POST">
            <h1 class="mb-4">Bienvenido al Registro de Administradores</h1>
            <div class="mb-3">
                <label for="nom" class="form-label">Escriba Ci:</label>
                <input type="text" class="form-control" name="ci" id="nom" >
            </div>

            <div class="mb-3">
                <label for="nom" class="form-label">Escriba Nombres:</label>
                <input type="text" class="form-control" name="nombre_completo" id="nom" >
            </div>
            
            <div class="mb-3">
                <label for="nom" class="form-label">Escriba Apellido Paterno:</label>
                <input type="text" class="form-control" name="apePaterno" id="nom">
            </div>

            <div class="mb-3">
                <label for="nom" class="form-label">Escriba Apellido Materno:</label>
                <input type="text" class="form-control" name="apeMaterno" id="nom">
            </div>

            <div class="mb-3">
                <label for="nom" class="form-label">Escriba Fecha Nacimiento:</label>
                <input type="Date" class="form-control" name="fechaNaci" id="nom">
            </div>

            <div class="mb-3">
                <label for="nom" class="form-label">Escriba Sexo:</label>
                <input type="text" class="form-control" name="sexo" id="nom">
            </div>

            <div class="mb-3">
                <label for="nom" class="form-label">Escriba Direccion:</label>
                <input type="text" class="form-control" name="direccion" id="nom">
            </div>

            <div class="mb-3">
                <label for="nom" class="form-label">Escriba Estado Civil:</label>
                <input type="text" class="form-control" name="estado_civil" id="nom" >
            </div>

            <div class="mb-3">
                <label for="nom" class="form-label">Escriba Profesion:</label>
                <input type="text" class="form-control" name="profesion" id="nom" >
            </div>

            <div class="mb-3">
                <label for="nom" class="form-label">Escriba Numero Telefonico:</label>
                <input type="text" class="form-control" name="numero_telefono" id="nom" >
            </div>

            <div class="mb-3">
                <label for="nom" class="form-label">Escriba Nombre de Usuario:</label>
                <input type="text" class="form-control" name="nombre_usuario" id="nom" >
            </div>
            
            <div class="mb-3">
                <label for="nom" class="form-label">Escriba Contraseña:</label>
                <input type="password" class="form-control" name="contrasenia" id="nom">
            </div>

            <div class="mb-3">
                <label for="nom" class="form-label">Escriba Correo:</label>
                <input type="text" class="form-control" name="correo" id="nom" placeholder="example@example.com">
            </div>

            <div class="mb-3">
                <label for="nom" class="form-label">Escriba rol:</label>
                <input type="text" class="form-control" name="rol" id="nom" placeholder="Ej: escritura/lectura">
            </div>

            <button type="submit" class="btn btn-primary" name="RegistrarAdministrador">Registrar Adminisrador</button>
            <button type="button" class="btn btn-danger" onclick="window.location.href='../controlador/administradorListar.php'">Volver</button>
        </form>
    </div>
    
</body>
</html>
