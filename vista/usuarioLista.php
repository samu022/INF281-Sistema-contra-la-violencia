<!-- Begin Page Content -->
<div class="container-fluid">
    <h2>Lista Usuarios</h2>
    <table  class="table table-dark table-sm">
        
        <tr>
            <td>ci</td>
            <td>Nombre de Usuario</td>
            <td>Correo</td>

        </tr>
        <?php
            $cont=0;
            while($reg=mysqli_fetch_array($res)){
                $cont=$cont+1;
                echo "<tr>";
                echo "<td>".$reg['ci_usuario']."</td>";
                echo "<td>".$reg['nombre_usuario']."</td>";
                echo "<td>".$reg['correo']."</td>";

                echo "<td><a href='../controlador/usuarioElimina.php?ci=".$reg['ci_usuario']."' btn='btn-danger' class='btn btn-danger'>Eliminar</a></td>";
                echo "<td><a href='../controlador/usuarioModifica.php?ci=".$reg['ci_usuario']."'  class='btn btn-success'>Modificar</a></td>";
                echo "</tr>";
                
            }
        ?>
    </table>
    
    <?php
        if($cont==0){
            echo "<div style='text-align: center;' class='alert alert-danger' role='alert'>";
            echo "<h3>No hay usuarios registrados actualmente</h3></div>";
        }
    ?>
    <button type="button" class="btn btn-info" onclick="window.location.href='../controlador/usuarioRegistro.php'">Ingresar nuevo usuario</button>

</div>
