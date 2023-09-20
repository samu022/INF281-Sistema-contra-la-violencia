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
        <h1>Evento a modificar</h1>
        <table  class="table table-dark table-sm">
            
            <tr>
                <td>Codigo Del Evento</td>
                <td>Tipo</td>
                <td>Fecha</td>
                <td>Titulo</td>
                <td>Duracion</td>
            </tr>
            <?php
            /*
                    echo "<tr>";
                    echo "<td>".$codEvento."</td>";
                    echo "<td>".$tipo."</td>";
                    echo "<td>".$fecha."</td>";
                    echo "<td>".$titulo."</td>";
                    echo "<td>".$duracion."</td>";                
                    echo "</tr>";
            */
            ?>
        </table>

        <div class="container mt-5">
            <form action="" method="POST" enctype="multipart/form-data">
                <h1 class="mb-4">Modificar Evento</h1>
                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo de evento:</label>
                    <input type="text" class="form-control" name="tipo" id="tipo" value="<?php echo $tipo; ?>">
                </div>
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha del evento (YYYY-MM-DD):</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $fecha; ?>" pattern="\d{4}-\d{2}-\d{2}" required>
                </div>
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título del evento:</label>
                    <input type="text" class="form-control" name="titulo" id="titulo" value="<?php echo $titulo; ?>">
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripcion del evento:</label>
                    <input type="text" class="form-control" name="descripcion" id="descripcion" value="<?php echo $descripcion; ?>">
                </div>
                <div class="mb-3">
                    <label for="tipoViolencia" class="form-label">Seleccione el tipo de violencia:</label>
                    <select class="form-select" name="tipoViolencia" id="tipoViolencia" required>
                        <option value="Violencia física" <?php if ($tipoViolencia === "Violencia física") echo "selected"; ?>>Violencia física</option>
                        <option value="Violencia psicológica o emocional" <?php if ($tipoViolencia === "Violencia psicológica o emocional") echo "selected"; ?>>Violencia psicológica o emocional</option>
                        <option value="Violencia verbal" <?php if ($tipoViolencia === "Violencia verbal") echo "selected"; ?>>Violencia verbal</option>
                        <option value="Violencia sexual" <?php if ($tipoViolencia === "Violencia sexual") echo "selected"; ?>>Violencia sexual</option>
                        <option value="Violencia doméstica o de pareja" <?php if ($tipoViolencia === "Violencia doméstica o de pareja") echo "selected"; ?>>Violencia doméstica o de pareja</option>
                        <option value="Violencia escolar o bullying" <?php if ($tipoViolencia === "Violencia escolar o bullying") echo "selected"; ?>>Violencia escolar o bullying</option>
                        <option value="Violencia racial o xenofobia" <?php if ($tipoViolencia === "Violencia racial o xenofobia") echo "selected"; ?>>Violencia racial o xenofobia</option>
                        <option value="Violencia económica" <?php if ($tipoViolencia === "Violencia económica") echo "selected"; ?>>Violencia económica</option>
                        <option value="Violencia política" <?php if ($tipoViolencia === "Violencia política") echo "selected"; ?>>Violencia política</option>
                        <option value="Violencia en línea o ciberacoso" <?php if ($tipoViolencia === "Violencia en línea o ciberacoso") echo "selected"; ?>>Violencia en línea o ciberacoso</option>
                        <option value="Violencia de género" <?php if ($tipoViolencia === "Violencia de género") echo "selected"; ?>>Violencia de género</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="horaInicio" class="form-label">Hora de Inicio:</label>
                    <input type="text" class="form-control" name="horaInicio" id="horaInicio" value="<?php echo $horaInicio; ?>">
                </div>

                <div class="mb-3">
                    <label for="horaFinal" class="form-label">Hora de Finalización:</label>
                    <input type="text" class="form-control" name="horaFinal" id="horaFinal" value="<?php echo $horaFinal; ?>" placeholder="Hora de Finalización">
                </div>
                <div class="mb-3">
                    <label for="modalidad" class="form-label">Modalidad:</label>
                    <select class="form-select" name="modalidad" id="modalidad" required>
                        <option value="Presencial" <?php if ($modalidad === "Presencial") echo "selected"; ?>>Presencial</option>
                        <option value="Virtual" <?php if ($modalidad === "Virtual") echo "selected"; ?>>Virtual</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="detalleEvento" class="form-label">Detalles del evento:</label>
                    <textarea class="form-control" name="detalleEvento" id="detalleEvento" placeholder="Detalles del evento Link en caso de virtual y dirección en caso de presencial"><?php echo $detalleEvento; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="expositor" class="form-label">Expositor:</label>
                    <input type="text" class="form-control" name="expositor" id="expositor" value="<?php echo $expositor; ?>" placeholder="Expositor del evento">
                </div>

                <div class="mb-3">
                    <label for="rutaDirectorio" class="form-label">Cargar Archivo (rutaDirectorio):</label>
                    <input type="file" class="form-control" name="rutaDirectorio" id="rutaDirectorio">
                </div>
                <button type="submit" class="btn btn-primary" name="ModificarEvento">Modificar Evento</button>
                <button type="button" class="btn btn-danger" onclick="window.location.href='../controlador/eventoLista.php'">Cancelar</button>
            </form>
        </div>
    </body>
    </html>
