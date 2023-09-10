<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-with, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Datos de la Victima</title>
</head>
<body>
    <section class="form-register">
      <h4>Datos de la Victima</h4>
      <form action="" method="POST">
      <input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese nombre" required value="<?php echo $nombres; ?>">
      <input class="controls" type="text" name="apellidoP" id="apellidoP" placeholder="Ingrese apellido Paterno" required value="<?php echo $apellidoP; ?>">
      <input class="controls" type="text" name="apellidoM" id="apellidoM" placeholder="Ingrese apellido Materno" value="<?php echo $apellidoM; ?>">
      <label for="fechaNacimiento">Fecha de Nacimiento:</label>
      <input class="controls" type="date" name="fechaNacimiento" id="fechaNacimiento" required value="<?php echo $fechaNacimiento; ?>">
      <label for="sexo">Sexo de la víctima:</label>
      <select class="controls" name="sexo" id="sexo" required>
        <option value="Masculino" <?php if ($sexo === 'Masculino') echo 'selected'; ?>>Masculino</option>
        <option value="Femenino" <?php if ($sexo === 'Femenino') echo 'selected'; ?>>Femenino</option>
      </select>
      <input class="controls" type="text" name="dir" id="dir" placeholder="Ingrese domicilio víctima" value="<?php echo $direccion; ?>">
      <input class="controls" type="text" name="est" id="est" placeholder="Ingrese estado civil víctima" value="<?php echo $estadoCivil; ?>">
      <input class="controls" type="text" name="prof" id="prof" placeholder="Ingrese profesión víctima" value="<?php echo $profesion; ?>">
      <input class="controls" type="text" name="carnet" id="carnet" placeholder="Ingrese su carnet de identidad" required value="<?php echo $ci; ?>">
      <input class="controls" type="text" name="rel" id="rel" placeholder="Relación Perpetrador" required value="<?php echo $relacion; ?>">
      <input class="controls" type="text" name="telefono" id="telefono" placeholder="Ingrese su número telefónico" value="<?php echo $telefono; ?>">
      <p>Estoy de acuerdo con <a href="#">Términos y Condiciones</a></p>
      <input class="btn btn-primary" type="submit" value="Modificar Víctima" name="modificarVictima">

    </form>
    <button type="button" class="btn btn-primary mt-3" onclick="window.location.href='../controlador/denunciaModificar.php?cod=<?php echo $codDenunciante; ?>'">Volver</button>

    </section>  
    <!--<footer>
        © 2023 Mi Página Web de Denuncias
    </footer>-->
</body>
</html>
