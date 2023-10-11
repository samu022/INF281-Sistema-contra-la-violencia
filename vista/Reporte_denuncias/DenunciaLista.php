<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"> 
    <title>Lista de Denuncias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body {
            background-color: #f7f7f7;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 4px solid #343a40; /* Cambia el color del borde de las celdas */
        }

        th {
            background-color: #343a40;
            color: #fff;
        }

        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }

        .btn-info:hover {
            background-color: #138496;
            border-color: #117a8b;
        }

        .btn-block {
            width: 100%;
        }

        .alert-danger {
            
        
        background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }

        .alert-danger h3 {
            color: #721c24;
        }
       /* Estilo para filas pares */
       table tr:nth-child(even) {
            background-color: #66ccff;
        }

        /* Estilo para filas impares */
        table tr:nth-child(odd) {
            background-color: #3399ff;
        }
        /* Cambia el color del texto en las celdas de la tabla */
        .table-dark th,
        .table-dark td {
            color: #000; /* Cambia el color del texto a negro (#000) */
        }
        /* Estilo para el título "Lista de Centros Locales" */
        h2 {
            font-size: 34px; /* Tamaño de fuente más grande */
            font-weight: bold; /* Hace que el título sea negrita */
            color: #333; /* Color de texto negro */
            text-align: center; /* Centra el título en la página */
            padding: 10px; /* Añade espacio alrededor del título para resaltarlo */
            background-color: #ffff66; /* Fondo gris claro */
            border-radius: 10px; /* Borde redondeado */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Agrega una sombra */
            margin-top: 20px; /* Espacio superior para separar del contenido anterior */
            margin-bottom: 20px; /* Espacio inferior para separar del contenido siguiente */
        } 
        h3 {
            font-size: 30px; /* Tamaño de fuente más grande */
            font-weight: bold; /* Hace que el título sea negrita */
            color: #333; /* Color de texto negro */
            text-align: center; /* Centra el título en la página */
            padding: 10px; /* Añade espacio alrededor del título para resaltarlo */
            background-color: #ffff66; /* Fondo gris claro */
            border-radius: 10px; /* Borde redondeado */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Agrega una sombra */
            margin-top: 20px; /* Espacio superior para separar del contenido anterior */
            margin-bottom: 20px; /* Espacio inferior para separar del contenido siguiente */
        } 
    </style>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container-fluid">
        <h2 class="text-center">Lista de Denuncias</h2>
        <div class="table-responsive">
        <form method="post" action="">
        <table>
            <thead>
                <tr style = "font-size: 20px; background-color: #66ff99;">
                    <th>Código Denuncia</th>
                    <th>Tipo de Violencia</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Más Info</th>
                    <th>Víctimas</th>
                    <th>Agresores</th>
                    <th>Pruebas</th>
                    <th>Ubicación</th>
                    <th>Finalizar Caso</th>
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
                        echo '<td><input type="checkbox" name="denuncia_atendida[]" class="atender-checkbox" value="' . $reg['codDenuncia'] . '"></td>';
                        echo "<td><a href='../controlador/denunciaElimina.php?cod=".$reg['codDenuncia']."' class='btn btn-danger'>Eliminar</a></td>";
                        echo "<td><a href='../controlador/denunciaModificar.php?cod=".$reg['codDenuncia']."' class='btn btn-success'>Modificar</a></td>";
                        echo "</tr>";
                    }
                ?>
                
            </tbody>
            
        </table>
        <button class="btn btn-danger float-right" type="submit">Confirmar Denuncias Finalizadas</button>
        </form>
    </div>
        
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
        <h3>Reportes de las denuncias por tipo de violencia</h3>
        <div class="text-center mt-3">
            <form action="../reportes/reporteDenunciaTipoViolencia.php" method="post" accept-charset="utf-8" onsubmit="return validateForm()">
                <div class="mb-3">
                    <label for="tipo" class="form-label">Seleccione el tipo de denuncia:</label>
                    <select class="form-select" name="tipo" id="tipo" required>
                        <option value="Violencia física">Violencia física</option>
                        <option value="Violencia psicológica o emocional">Violencia psicológica o emocional</option>
                        <option value="Violencia verbal">Violencia verbal</option>
                        <option value="Acoso sexual">Acoso sexual</option>
                        <option value="Violencia doméstica">Violencia doméstica o de pareja</option>
                        <option value="Violencia escolar o bullying">Violencia escolar o bullying</option>
                        <option value="Violencia racial o xenofobia">Violencia racial o xenofobia</option>
                        <option value="Violencia económica">Violencia económica</option>
                        <option value="Violencia política">Violencia política</option>
                        <option value="Violencia en línea o ciberacoso">Violencia en línea o ciberacoso</option>
                        <option value="Violencia de género">Violencia de género</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Reporte de denuncia por tipo violencia</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    

</body>
</html>
