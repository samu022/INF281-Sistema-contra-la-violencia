<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-with, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Pruebas</title>
</head>
<body>
  <form action="" method="POST" >
    <section class="form-register">
      <h4>Pruebas de la Denuncia</h4>

     
      <textarea class="descripcion" name="descripcion" id="descripcion" rows="4" placeholder="Describa la prueba aquí." aria-required="true"><?php echo $descripcion; ?></textarea>


      <input class="botons" type="submit" value="Modificar descripción" name="modificaPrueba">
      <button type="button" class="btn btn-primary mt-3" onclick="window.location.href='../controlador/denunciaModificar.php?cod=<?php echo $codDenunciante; ?>'">Volver</button>
    </section>
  </form>
  

  <!--<footer>
        <center>© 2023 Mi Página Web de Denuncias</center>
    </footer>-->
</body>

</html>