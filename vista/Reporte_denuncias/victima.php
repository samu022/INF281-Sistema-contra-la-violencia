<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-with, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Datos de la Victima</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <section class="form-register">
      <h4>Datos de la Victima</h4>
      <form action="" class="formulario" method="POST">
      <div class="formulario__grupo-input">
            <label for="nombre">Nombres:</label>
            <input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese nombre agresor" required>
        </div>
        <div class="formulario__grupo-input">
            <label for="paterno">Apellido Paterno:</label>
            <input class="controls" type="text" name="apellidoP" id="apellidoP" placeholder="Ingrese apellido Paterno" required>
        </div>
        <div class="formulario__grupo-input">
            <label for="Materno">Apellido Materno:</label>
            <input class="controls" type="text" name="apellidoM" id="apellidoM" placeholder="Ingrese apellido Materno">
        </div>
        <div class="formulario__grupo-input">
            <label for="fechaNacimiento">Fecha de Nacimiento:</label>
            <input class="controls" type="date" name="fechaNacimiento" id="fechaNacimiento Agresor" required>
        </div>
        <div class="formulario__grupo-input">
            <label for="sexo">Sexo de la victima:</label>
            <select class="controls" name="sexo" id="sexo" required>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </select>
        </div>
        <div class="formulario__grupo-input">
            <label for="domicilioVictima">Domicilio:</label>
            <input class="controls" type="text" name="dir" id="dir" placeholder="Ingrese domicilio victima">
        </div>
        <div class="formulario__grupo-input">
            <label for="estadoCivil">Estado Civil:</label>
            <input class="controls" type="text" name="est" id="est" placeholder="Ingrese estado civil victima">
        </div>
        <div class="formulario__grupo-input">
            <label for="profesion">Profesion:</label>
            <input class="controls" type="text" name="prof" id="prof" placeholder="Ingrese profesion victima">
        </div>
        <div class="formulario__grupo-input">
            <label for="carnet">Carnet de Identidad:</label>
            <input class="controls" type="text" name="carnet" id="carnet" placeholder="Ingrese su carnet de identidad" required>
        </div>
        <div class="formulario__grupo-input">
            <label for="relacion">Relacion con el perpetrador:</label>
            <input class="controls" type="text" name="rel" id="rel" placeholder="familiar,pareja,amistad..." required>
        </div>
        <div class="formulario__grupo-input">
            <label for="telefono">Telefono:</label>
            <input class="controls" type="text" name="telefono" id="telefono" placeholder="Ingrese su numero telefonico">
        </div>
        <p>Estoy de acuerdo con <a href="terminos.php">Terminos y Condiciones</a></p>
        <input class="botons" type="submit" value="Registrar Víctima" name="registraVictima">
    </form>
       
    <button type="button" class="btn btn-success" onclick="window.location.href='../controlador/victimaVista.php'">Ver las victimas registradas</button>
    </section>  
   
</body>
</html>
