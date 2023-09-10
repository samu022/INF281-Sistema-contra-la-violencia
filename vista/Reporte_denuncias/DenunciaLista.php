<!DOCTYPE html>
<html>
<head>
	<title>Denuncias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</head>
<body>
    <h2>Lista de Denuncias</h2>
    <table  >
        
        <tr>
            <td>Codigo Denuncia</td>
            <td>Tipo de Violencia</td>
            <td>Descripcion</td>
            <td>Fecha</td>
            <td>Más inf.</td>
            <td>Victimas</td>
            <td>Agresores</td>
            <td>Pruebas</td>
            <td>Ubicacion</td>
        </tr>
        <?php
            $cont=0;
            while($reg=mysqli_fetch_array($res)){
                $cont=$cont+1; 
                echo "<tr>";
                echo "<td>".$reg['codDenuncia']."</td>";
                echo "<td>".$reg['tipo']."</td>";
                echo "<td>".$reg['descripcion']."</td>";
                echo "<td>".$reg['fecha']."</td>";
                echo "<td><a href='../controlador/denunciaInformacion.php?cod=".$reg['codDenuncia']."' btn='btn-danger' class='btn btn-danger'>Más Inf.</a></td>";
                echo "<td><a href='../controlador/victimaInformacion.php?cod=".$reg['codDenuncia']."'  class='btn btn-success'>Victimas</a></td>";
                echo "<td><a href='../controlador/agresorInformacion.php?cod=".$reg['codDenuncia']."'  class='btn btn-success'>Agresores</a></td>";
                echo "<td><a href='../controlador/pruebasInformacion.php?cod=".$reg['codDenuncia']."'  class='btn btn-success'>Pruebas</a></td>";
                echo "<td><a href='../controlador/geoInformacion.php?cod=".$reg['codDenuncia']."'  class='btn btn-success'>Ubicación</a></td>";
                echo "<td><a href='../controlador/denunciaElimina.php?cod=".$reg['codDenuncia']."' btn='btn-danger' class='btn btn-danger'>Eliminar</a></td>";
                echo "<td><a href='../controlador/denunciaModificar.php?cod=".$reg['codDenuncia']."'  class='btn btn-success'>Modificar</a></td>";
                echo "</tr>";
                
            }
        ?>
    </table>
    
    <?php
        if($cont==0){
            echo "<div style='text-align: center;' class='alert alert-danger' role='alert'>";
            echo "<h3>No hay denuncias registradas actualmente</h3></div>";
        }
    ?>
    <button type="button" class="btn btn-info" onclick="window.location.href='../controlador/denunciaRegistro.php'">Ingresar nueva denuncia</button>
</body>
</html>