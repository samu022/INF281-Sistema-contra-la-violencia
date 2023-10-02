<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contacto de Emergencia</title>
    <!-- Agregar enlaces a Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Contactos de Emergencia</h1>
        <?php
        if (mysqli_num_rows($res) > 0) {
        ?>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Teléfono</th>
                    <th>Parentesco</th>
                    <th>Acciones</th> <!-- Columna para botones de acciones -->
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($res)) {
                    $ci_contacto = $row['ci_contacto'];
                    $contacto = new ContactoEmergencia($ci_contacto, "");
                    $resC = $contacto->listaEspecifica();
                    $row2 = mysqli_fetch_array($resC);
                    $parentescoContacto = $row['parentesco'];
                    $telefonoContacto = $row2['telefono'];
                ?>
                <tr>
                    <td><?php echo $telefonoContacto; ?></td>
                    <td><?php echo $parentescoContacto; ?></td>
                    <td>
                        <!-- Botones para acciones -->
                        <a href="../controlador/contactoEmergenciaModifica.php?ci_contacto=<?php echo $ci_contacto; ?>" class="btn btn-success btn-sm" class="btn btn-primary btn-sm">Modificar</a>
                        <a href="../controlador/contactoEmergenciaEliminar.php?ci_contacto=<?php echo $ci_contacto; ?>" class="btn btn-danger btn-sm">Eliminar</a>

                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <?php
        } else {
        ?>
        <div class='alert alert-danger text-center' role='alert'>
            <p class="mt-4">No hay contactos de emergencia registrados.</p>
        </div>
        <?php
        }
        ?>
        <!-- Botón para agregar un nuevo contacto de emergencia -->
        <a href="../controlador/panelWeb.php" class="btn btn-danger">Volver</a>
        <a href="../controlador/contactoEmergenciaRegistro.php" class="btn btn-success">Agregar Contacto</a>
        
    </div>
    <!-- Agregar enlaces a Bootstrap JS y jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
