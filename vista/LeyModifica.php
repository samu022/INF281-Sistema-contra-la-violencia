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
            <td>Codigo Ley</td>
            <td>Nombre</td>
            <td>Fecha Promulgacion</td>
            <td>Temática</td>
            <td>Información</td>

        </tr>
        <?php
            
            
                echo "<tr>";
                echo "<td>".$cod."</td>";
                echo "<td>".$nom."</td>";
                echo "<td>".$fecha."</td>";
                echo "<td>".$tematica."</td>";
                echo '<td><a href="' . $inf . '">' . $inf . '</a></td>';
                echo "</tr>";
                
            
        ?>
    </table>
    <h1>Ley a modificar</h1>

    <div class="container mt-5">
        <form action="" method="POST">
            <h1 class="mb-4">Modificacion de Ley</h1>
            <div class="mb-3">
                <label for="nom" class="form-label">Escriba Nombre Ley:</label>
                <input type="text" class="form-control" name="nom" id="nom" value="<?php echo $nom; ?>">
            </div>
            <div class="mb-3">
                <label for="fechaPromulgacion" class="form-label">Ingrese la fecha de promulgación (YYYY-MM-DD):</label>
                <input type="text" class="form-control" id="fechaPromulgacion" name="fechaPromulgacion" placeholder="YYYY-MM-DD" pattern="\d{4}-\d{2}-\d{2}" required>
            </div>
            <div class="mb-3">
                <label for="tem" class="form-label">Escriba Temática:</label>
                <input type="text" class="form-control" name="tem" id="tem" value="<?php echo $tematica; ?>">
            </div>
            <div class="mb-3">
                <label for="ref" class="form-label">Ingrese Link de Referencia:</label>
                <input type="text" class="form-control" name="ref" id="ref" value="<?php echo $inf; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="ModificarLey">Modificar Ley</button>
            <button type="button" class="btn btn-danger" onclick="window.location.href='../controlador/leyLista.php'">Volver</button>
        </form>
    </div>
</body>
</html>
