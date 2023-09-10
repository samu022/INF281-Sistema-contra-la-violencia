<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
  <h1>Información de la denuncia cod=<?php echo $cod; ?></h1>
<table class="table table-success table-striped-columns">
    <tr>
        <td><b>Tipo</b></td>
        <td><?php echo $tipo; ?></td>
    </tr>
    <tr>
        <td><b>Descripción</b></td>
        <td><?php echo $descripcion; ?></td>
    </tr>
    <tr>
        <td><b>Testigo</b></td>
        <td><?php echo $testigo; ?></td>
    </tr>
    <tr>
        <td><b>Seguimiento</b></td>
        <td><?php echo $seguimiento; ?></td>
    </tr>
    <tr>
        <td><b>Fecha</b></td>
        <td><?php echo $fecha; ?></td>
    </tr>
</table>
<button type="button" class="btn btn-primary btn-lg"  onclick="window.location.href='../controlador/denunciaLista.php'">Volver</button>

  </body>
</html>
