<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Modificar Denuncia</title>
</head>
<body>
    <h1>Modificar Denuncia</h1>
    <form action="procesar_modificacion.php" method="POST">
        <input type="hidden" name="cod" value="<?php echo $cod; ?>">
        
        <label for="tipo">Tipo de Denuncia:</label>
        <input type="text" id="tipo" name="tipo" value="<?php echo $tipo; ?>"><br>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea><br>

        <label for="testigo">Testigo:</label>
        <input type="text" id="testigo" name="testigo" value="<?php echo $testigo; ?>"><br>

        <label for="seguimiento">Seguimiento:</label>
        <input type="text" id="seguimiento" name="seguimiento" value="<?php echo $seguimiento; ?>"><br>

        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" value="<?php echo $fecha; ?>"><br>

        <input type="submit" value="Guardar Cambios">
    </form>

