<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-with, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Datos del Agresor</title>
</head>
<body>
    <section class="form-register">
      <h4>Datos del Agresor</h4>
      <form action="../../controlador/agresorRegistro" method="POST">
        <input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese nombre agresor" required>
        <input class="controls" type="text" name="apellidoP" id="apellidoP" placeholder="Ingrese apellido Paterno" required>
        <input class="controls" type="text" name="apellidoM" id="apellidoM" placeholder="Ingrese apellido Materno">
        <label for="fechaNacimiento">Fecha de Nacimiento:</label>
        <input class="controls" type="date" name="fechaNacimiento" id="fechaNacimiento Agresor" required>
        <label for="sexo">Sexo del agresor:</label>
            <select class="controls" name="sexo" id="sexo" required>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </select>
        <input class="controls" type="text" name="dir" id="dir" placeholder="Ingrese domicilio agresor" required>
        <input class="controls" type="text" name="est" id="est" placeholder="Ingrese estado civil agresor">
        <input class="controls" type="text" name="prof" id="prof" placeholder="Ingrese profesion agresor">
        <input class="controls" type="text" name="carnet" id="carnet" placeholder="Ingrese su carnet de identidad" required>
        <input class="controls" type="text" name="tel" id="tel" placeholder="Telefono" >
        <input class="controls" type="text" name="descripcion" id="descripcion" placeholder="Ingrese una descripcion fisica" required>
        <p>Estoy de acuerdo con <a href="#">Terminos y Condiciones</a></p>
        <input class="botons" type="submit" value="Registrar Agresor" name="registrarAgresor">
    </form>
    </section>  
    <!--<footer>
        © 2023 Mi Página Web de Denuncias
    </footer>-->
</body>
</html>