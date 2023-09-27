<!DOCTYPE html>
<html>
<head>
	<title>Leyes Normativas</title>
    <style>
        body {
            background-color: #f7f7f7;
        }

        .table-responsive {
            padding: 15px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Agrega una sombra para un aspecto 3D */
        }

        table {
            margin-top: 20px;
            border: 1px solid #343a40; /* Cambia el color del borde de la tabla */
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border: 7px solid #343a40; /* Cambia el color del borde de las celdas */
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
    </style>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body style="background-color: #66ffff;">
    <div class="container">
        <h2>Lista de Centros Locales</h2>
        <table  class="table table-dark table-sm">
            
            <tr>
                <td>Codigo Centro</td>
                <td>Nombre</td>
                <td>Telefono</td>
                <td>Ubicacion</td>
            </tr>
            <?php
                $cont=0;
                while($reg=mysqli_fetch_array($res)){
                    $cont=$cont+1;
                    echo "<tr>";
                    echo "<td>".$reg['codCentro']."</td>";
                    echo "<td>".$reg['nombre']."</td>";
                    echo "<td>".$reg['telefono']."</td>";
                    echo "<td>".$reg['ubicacion']."</td>";

                    echo "<td><a href='../controlador/centroLocalElimina.php?cod=".$reg['codCentro']."' btn='btn-danger' class='btn btn-danger'>Eliminar</a></td>";
                    echo "<td><a href='../controlador/centroLocalModifica.php?cod=".$reg['codCentro']."'  class='btn btn-success'>Modificar</a></td>";
                    echo "</tr>";
                    
                }
            ?>
        </table>
        
        <?php
            if($cont==0){
                echo "<div style='text-align: center;' class='alert alert-danger' role='alert'>";
                echo "<h3>No hay centros registrados actualmente</h3></div>";
            }
        ?>
        <button type="button" class="btn btn-info" onclick="window.location.href='../controlador/centroLocalRegistro.php'">Ingresar centro</button>
    	<form action="../reportes/reporteCentroLocal.php" method="post" accept-charset="utf-8">
	    <div class="row">
		<button type="submit" class="btn btn-success mb-2">Reporte</button>
	    </div>
	</form>
    </div>
    
</body>
</html>
