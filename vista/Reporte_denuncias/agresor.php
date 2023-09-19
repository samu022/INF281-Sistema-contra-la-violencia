<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-with, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Datos del Agresor</title>
</head>
<body>
    <section class="form-register">
      <h4>Datos del Agresor</h4>
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
            <label for="sexo">Sexo del agresor:</label>
            <select class="controls" name="sexo" id="sexo" required>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </select>
        </div>
        <div class="formulario__grupo-input">
            <label for="domicilioAgresor">Domicilio:</label>
            <input class="controls" type="text" name="dir" id="dir" placeholder="Ingrese domicilio agresor" required>
        </div>
        <div class="formulario__grupo-input">
            <label for="estadoCivil">Estado Civil:</label>
            <input class="controls" type="text" name="est" id="est" placeholder="Ingrese estado civil agresor">
        </div>
        <div class="formulario__grupo-input">
            <label for="profesion">Profesion:</label>
            <input class="controls" type="text" name="prof" id="prof" placeholder="Ingrese profesion agresor">
        </div>
        <div class="formulario__grupo-input">
            <label for="carnet">Carnet de Identidad:</label>
            <input class="controls" type="text" name="carnet" id="carnet" placeholder="Ingrese su carnet de identidad" required>
        </div>
        <div class="formulario__grupo-input">
            <label for="telefono">Telefono:</label>
            <input class="controls" type="text" name="tel" id="tel" placeholder="Telefono" >
        </div>
        <div class="formulario__grupo-input">
            <label for="descripcion">Descripcion:</label>
            <textarea class="descripcion" name="form_fields[message]" id="form-field-message" rows="4" placeholder="Describa al agresor aqui." required="required" aria-required="true"></textarea>
        </div>
        <p>Estoy de acuerdo con <a href="#">Terminos y Condiciones</a></p>
        <input class="botons" type="submit" value="Registrar Agresor" name="registrarAgresor">
    </form>
        
    </section>  
</body>
</html>
