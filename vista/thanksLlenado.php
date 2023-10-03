<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Evaluación de Riesgos</title>
    <!-- Agrega las hojas de estilo y archivos JavaScript de Bootstrap aquí -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        /* Estilos CSS personalizados aquí */
        body {
            background-color: #f0f0f0;
        }
        .container {
            background-color: #fff;
            max-width: 600px;
            margin: 100px auto; /* Centrar verticalmente */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .result {
            font-size: 24px;
            font-weight: bold;
            margin-top: 20px;
        }
        .message {
            font-size: 18px;
            margin-top: 20px;
        }
        .note {
            font-size: 14px;
            color: #888;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center">
            <i class="fas fa-check-circle fa-5x text-success"></i>
        </div>
        <h1 class="text-center">Confirmación de Evaluación de Riesgos</h1>
        <p class="text-center">Gracias por tomar el tiempo para completar nuestro formulario de evaluación de riesgos sobre violencia contra la mujer. Tu participación es fundamental para crear conciencia y abordar este problema de manera efectiva.</p>
        <p class="text-center">Hemos recibido tus respuestas de manera segura.</p>

        <div class="result text-center">
            Total de Puntos: <?php echo $puntaje; ?>
        </div>

        <div class="result text-center">
            Nivel de Riesgo: <?php echo $resultado; ?>
        </div>

        <div class="message">
            <p class="text-center">Valoración de Riesgo:</p>
            <ul>
                <li>RIESGO LEVE (0-57)</li>
                <li>RIESGO MODERADO (58-116)</li>
                <li>RIESGO SEVERO (117-228)</li>
            </ul>
        </div>

        <p class="text-center">¡Gracias por tu contribución!</p>

        <div class="text-center">
            <a href="../controlador/panelweb.php" class="btn btn-primary">Volver a la página principal</a>
        </div>
    </div>
</body>
</html>
