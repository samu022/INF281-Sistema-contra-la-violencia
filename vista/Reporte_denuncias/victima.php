<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-with, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Datos de la Victima</title>
</head>
<body>
    <section class="form-register">
      <h4>Datos de la Victima</h4>
      <form action="" method="POST">
      <input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese nombre" required>
      <input class="controls" type="text" name="apellidoP" id="apellidoP" placeholder="Ingrese apellidos Paterno" required>
      <input class="controls" type="text" name="apellidoM" id="apellidoM" placeholder="Ingrese apellido Materno">
      <label for="fechaNacimiento">Fecha de Nacimiento:</label>
      <input class="controls" type="date" name="fechaNacimiento" id="fechaNacimiento" required>
      <input class="controls" type="text" name="sexo" id="sexo" placeholder="Ingrese Sexo victima" required>
      <input class="controls" type="text" name="dir" id="dir" placeholder="Ingrese domicilio victima">
      <input class="controls" type="text" name="est" id="est" placeholder="Ingrese estado civil victima">
      <input class="controls" type="text" name="prof" id="prof" placeholder="Ingrese profesion victima">
      <input class="controls" type="text" name="carnet" id="carnet" placeholder="Ingrese su carnet de identidad" required>
      <input class="controls" type="text" name="telefono" id="telefono" placeholder="Ingrese su numero telefonico">
      <p>Estoy de acuerdo con <a href="#">Terminos y Condiciones</a></p>
      <input class="botons" type="submit" value="Registrar Victima">
    </form>
    </section>  
    <!--<footer>
        © 2023 Mi Página Web de Denuncias
    </footer>-->
</body>
</html>