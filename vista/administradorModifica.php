<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Modificar Ley</title>
</head>
<body>
    <?php
        /*$cod=$_GET['cod'];
        include("../modelo/Ley_NormativaClase.php");
        $car=new Ley_Normativa($cod,"","","","");
        $res=$car->lista_especifica();
        $reg = $res->fetch_assoc();
        $nom=$reg['nombre'];
        $fecha=$reg['fecha_promulgacion'];
        $tematica=$reg['tematica'];
        $inf=$reg['informacion'];*/
    ?>
    <table  class="table table-dark table-sm">
        
        <tr>
            <td>CI</td>
            <td>Nombre de Usuario</td>
            <td>Contrasenia</td>
            <td>Correo</td>
            <td>rol</td>
        </tr>
        <?php
                echo "<tr>";
                echo "<td>".$ci."</td>";
                echo "<td>".$nombre_usuario."</td>";
                echo "<td>".$contrasenia."</td>";
                echo "<td>".$correo."</td>";
                echo "</tr>";
        ?>
    </table>
    <h1>Administrador a modificar</h1>

    <div class="container mt-5">
        <form action="" method="POST">
            <h1 class="mb-4">Modificacion de Administrador</h1>
            <div class="mb-3">
                <label for="nom" class="form-label">Escriba Nombre de Usuario:</label>
                <input type="text" class="form-control" name="nombre_usuario" id="nom" value="<?php echo $nombre_usuario; ?>">
            </div>
            
            <div class="mb-3">
                <label for="nom" class="form-label">Escriba Nueva Contrasenia o la que tenia con anterioridad:</label>
                <input type="password" class="form-control" name="contrasenia" id="nom" value="">
            </div>

            <div class="mb-3">
                <label for="nom" class="form-label">Escriba Correo:</label>
                <input type="text" class="form-control" name="correo" id="nom" value="<?php echo $correo; ?>">
            </div>

            <?php
                            while($rol=mysqli_fetch_array($total_roles)){

                                if(in_array($rol['idRol'], $v_roles_administrador))
                                {
                                    echo '<div class="form-check">';
                                        echo '<input class="form-check-input" type="checkbox" id="opcion1" value="'.$rol['nombreRol'].'" name="'.$rol['idRol'].'" checked>';
                                        echo '<label class="form-check-label" for="opcion1">';
                                            echo $rol['nombreRol'];
                                        echo '</label>';
                                    echo '</div>';
                                }
                                else
                                {
                                    echo '<div class="form-check">';
                                        echo '<input class="form-check-input" type="checkbox" id="opcion1" value="'.$rol['nombreRol'].'" name="'.$rol['idRol'].'">';
                                        echo '<label class="form-check-label" for="opcion1">';
                                            echo $rol['nombreRol'];
                                        echo '</label>';
                                    echo '</div>';
                                }
                            }
                        ?>

            <button type="submit" class="btn btn-primary" name="ModificarAdministrador">Modificar Administrador</button>
            <button type="button" class="btn btn-danger" onclick="window.location.href='../controlador/administradorListar.php'">Volver</button>
        </form>
    </div>
</body>
</html>
