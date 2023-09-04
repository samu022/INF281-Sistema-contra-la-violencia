<!DOCTYPE html>
<html>
<head>
	<title>Leyes Normativas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>
    <h2>Lista de Leyes contra la violencia</h2>
    <table  class="table table-dark table-sm">
        
        <tr>
            <td>Codigo Ley</td>
            <td>Nombre</td>
            <td>Fecha Promulgacion</td>
            <td>Temática</td>
            <td>Información</td>

        </tr>
        <?php
            $cont=0;
            while($reg=mysqli_fetch_array($res)){
                $cont=$cont+1;
                echo "<tr>";
                echo "<td>".$reg['codLey']."</td>";
                echo "<td>".$reg['nombre']."</td>";
                echo "<td>".$reg['fecha_promulgacion']."</td>";
                echo "<td>".$reg['tematica']."</td>";
                echo '<td><a href="' . $reg['informacion'] . '">' . $reg['informacion'] . '</a></td>';

                echo "<td><a href='../controlador/leyElimina.php?cod=".$reg['codLey']."' btn='btn-danger' class='btn btn-danger'>Eliminar</a></td>";
                echo "<td><a href='../controlador/leyModifica.php?cod=".$reg['codLey']."'  class='btn btn-success'>Modificar</a></td>";
                echo "</tr>";
                
            }
        ?>
    </table>
    
    <?php
        if($cont==0){
            echo "<div style='text-align: center;' class='alert alert-danger' role='alert'>";
            echo "<h3>No hay leyes registradas actualmente</h3></div>";
        }
    ?>
    <button type="button" class="btn btn-info" onclick="window.location.href='../controlador/leyRegistro.php'">Ingresar nueva ley</button>
</body>
</html>