<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body {
            background-color: #333;
            color: #fff;
            padding: 20px;
        }
        .form-label {
            color: #fff;
        }
    </style>
    <title>Modificar Denuncia</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Modificar Denuncia</h1>
        <form action="" method="POST">
            <input type="hidden" name="cod" value="<?php echo $cod; ?>">
            
            <div class="mb-3">
                <label for="tipo" class="form-label">Seleccione el tipo de denuncia:</label>
                <select class="form-select" name="tipo" id="tipo">
                    <?php
                    $options = array(
                        "Violencia física",
                        "Violencia psicológica o emocional",
                        "Violencia verbal",
                        "Violencia sexual",
                        "Violencia doméstica o de pareja",
                        "Violencia escolar o bullying",
                        "Violencia racial o xenofobia",
                        "Violencia económica",
                        "Violencia política",
                        "Violencia en línea o ciberacoso",
                        "Violencia de género"
                    );

                    foreach ($options as $option) {
                        $selected = ($tipo == $option) ? ' selected' : '';
                        echo "<option value=\"$option\"$selected>$option</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="anonima" name="anonima" onchange="toggleTestigo(this)">
                    <label class="form-check-label" for="anonima">Denuncia Anónima</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="testigo" class="form-label">Testigo:</label>
                <input class="form-control" type="text" id="testigo" name="testigo" value="<?php echo $testigo; ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="seguimiento" class="form-label">Seguimiento:</label>
                <input class="form-control" type="text" id="seguimiento" name="seguimiento" value="<?php echo $seguimiento; ?>">
            </div>

            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha:</label>
                <input class="form-control" type="date" id="fecha" name="fecha" value="<?php echo $fecha; ?>">
            </div>

            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Guardar Cambios" name="ModificarDenuncia">
            </div>
        </form>
    </div>
    
    <script>
        function toggleTestigo(checkbox) {
            var testigoInput = document.getElementById("testigo");
            testigoInput.disabled = !checkbox.checked;
            if (!checkbox.checked) {
                testigoInput.value = "";
            }
        }
    </script>
</body>
</html>
