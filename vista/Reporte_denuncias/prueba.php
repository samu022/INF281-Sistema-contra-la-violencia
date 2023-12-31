<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Pruebas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
</head> 
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <section class="form-register">
            <h4>Pruebas de la Denuncia</h4>

            <label for="archivo">Archivo:</label>
            <input type="file" name="archivo" id="archivo" class="archivo" accept="*">
            <!-- El atributo accept="*" permite cualquier tipo de archivo -->

            <textarea class="descripcion" name="descripcion" id="descripcion" rows="4" placeholder="Descripción de las pruebas." required="required" aria-required="true"></textarea>

            <input class="botons" type="submit" value="Subir Prueba" name="subePrueba">
            <button type="button" class="btn btn-success" onclick="window.location.href='../controlador/pruebaVista.php'">Ver las pruebas registradas</button>
        </section>
        
    </form>
    
</body>
</html>