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
      <form action="" method="POST">
        <input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese nombre agresor" value="<?php echo $nombres; ?>" required>
        <input class="controls" type="text" name="apellidoP" id="apellidoP" placeholder="Ingrese apellido Paterno" value="<?php echo $apellidoP; ?>" required>
        <input class="controls" type="text" name="apellidoM" id="apellidoM" placeholder="Ingrese apellido Materno" value="<?php echo $apellidoM; ?>">
        <label for="fechaNacimiento">Fecha de Nacimiento:</label>
        <input class="controls" type="date" name="fechaNacimiento" id="fechaNacimiento Agresor" value="<?php echo $fechaNacimiento; ?>" required>
        <label for="sexo">Sexo del agresor:</label>
            <select class="controls" name="sexo" id="sexo" required>
                <option value="Masculino" <?php if ($sexo == "Masculino") echo "selected"; ?>>Masculino</option>
                <option value="Femenino" <?php if ($sexo == "Femenino") echo "selected"; ?>>Femenino</option>
            </select>
        <input class="controls" type="text" name="dir" id="dir" placeholder="Ingrese domicilio agresor" value="<?php echo $direccion; ?>" required>
        <input class="controls" type="text" name="est" id="est" placeholder="Ingrese estado civil agresor" value="<?php echo $estadoCivil; ?>">
        <input class="controls" type="text" name="prof" id="prof" placeholder="Ingrese profesion agresor" value="<?php echo $profesion; ?>">
        <input class="controls" type="text" name="carnet" id="carnet" placeholder="Ingrese su carnet de identidad" value="<?php echo $ci; ?>" required>
        <input class="controls" type="text" name="tel" id="tel" placeholder="Telefono" value="<?php echo $telefono; ?>">
        <input class="controls" type="text" name="descripcion" id="descripcion" placeholder="Ingrese una descripcion fisica" value="<?php echo $descripcion; ?>" required>
        <p>Estoy de acuerdo con <a href="#">Terminos y Condiciones</a></p>
        <input class="btn btn-primary" type="submit" value="Modificar Agresor" name="modificarAgresor">
    </form>
    <button type="button" class="btn btn-primary mt-3" onclick="window.location.href='../controlador/denunciaModificar.php?cod=<?php echo $codDenunciante; ?>'">Volver</button>
    </section>  
    <!--<footer>
        © 2023 Mi Página Web de Denuncias
    </footer>-->
</body>
</html>
