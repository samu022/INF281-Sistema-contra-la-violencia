<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Denuncias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Lista de Denuncias</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Código Denuncia</th>
                    <th>Tipo de Violencia</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Más Info</th>
                    <th>Víctimas</th>
                    <th>Agresores</th>
                    <th>Pruebas</th>
                    <th>Ubicación</th>
                    <th>Eliminar</th>
                    <th>Modificar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $cont = 0;
                    while ($reg = mysqli_fetch_array($res)) {
                        $cont++;
                        echo "<tr>";
                        echo "<td>".$reg['codDenuncia']."</td>";
                        echo "<td>".$reg['tipo']."</td>";
                        echo "<td>".$reg['descripcion']."</td>";
                        echo "<td>".$reg['fecha']."</td>";
                        echo "<td><a href='../controlador/denunciaInformacion.php?cod=".$reg['codDenuncia']."' class='btn btn-danger'>Más Info</a></td>";
                        echo "<td><a href='../controlador/victimaInformacion.php?cod=".$reg['codDenuncia']."' class='btn btn-success'>Víctimas</a></td>";
                        echo "<td><a href='../controlador/agresorInformacion.php?cod=".$reg['codDenuncia']."' class='btn btn-success'>Agresores</a></td>";
                        echo "<td><a href='../controlador/pruebasInformacion.php?cod=".$reg['codDenuncia']."' class='btn btn-success'>Pruebas</a></td>";
                        echo "<td><a href='../controlador/geoInformacion.php?cod=".$reg['codDenuncia']."' class='btn btn-success'>Ubicación</a></td>";
                        echo "<td><a href='../controlador/denunciaElimina.php?cod=".$reg['codDenuncia']."' class='btn btn-danger'>Eliminar</a></td>";
                        echo "<td><a href='../controlador/denunciaModificar.php?cod=".$reg['codDenuncia']."' class='btn btn-success'>Modificar</a></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <?php
            if ($cont == 0) {
                echo "<div class='alert alert-danger text-center' role='alert'>";
                echo "<h3>No hay denuncias registradas actualmente</h3></div>";
            }
        ?>
        <div class="text-center">
            <a href='../controlador/denunciaRegistro.php' class='btn btn-info'>Ingresar nueva denuncia</a>
        </div>
        <h3>Reportes de todas las denuncias</h3>
        <div class="text-center mt-3">
            <form action="../reportes/reporteDenuncia.php" method="post" accept-charset="utf-8">
                <button type="submit" class="btn btn-success">Reporte de Denuncias</button>
            </form>
        </div>
        <h3>Reportes de todas las victimas</h3>
        <div class="text-center mt-3">
            <form action="../reportes/reporteVictimas.php" method="post" accept-charset="utf-8">
                <button type="submit" class="btn btn-success">Reporte de Víctimas</button>
            </form>
        </div>
        <h3>Reportes de todos lo agresores registrados</h3>
        <div class="text-center mt-3">
            <form action="../reportes/reporteAgresores.php" method="post" accept-charset="utf-8">
                <button type="submit" class="btn btn-success">Reporte de Agresores</button>
            </form>
        </div>
        <h3>Reportes de las denuncias con todos los detalles</h3>
        <div class="text-center mt-3">
            <form action="../reportes/reporteDenunciaDetallada.php" method="post" accept-charset="utf-8">
                <button type="submit" class="btn btn-success">Reporte de Denuncia Detallada</button>
            </form>
        </div>
        <h3>Reportes de las denuncias por fecha</h3>
        <div class="text-center mt-3">
            <form action="../reportes/reporteDenunciaFecha.php" method="post" accept-charset="utf-8" onsubmit="return validateForm()">
                <input type="date" class="form-control" name="fecha" id="fecha" placeholder="" required>
                <button type="submit" class="btn btn-success">Reporte de denuncia por fecha</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
