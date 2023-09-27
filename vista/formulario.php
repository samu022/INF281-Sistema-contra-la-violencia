<!DOCTYPE html>
<html>
<head>
    <title>Formulario de evaluación de riesgos</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4">Formulario para evaluar tipo de violencia</h1>

            <!-- Aquí se incrusta el formulario de Google Forms -->
            <iframe src="https://form.jotform.com/232692464799676" width="100%" height="500" frameborder="0" marginheight="0" marginwidth="0">Cargando...</iframe>
            
            <br>

            <button class="btn btn-primary" onclick="goBack()">Volver</button>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Función para volver a la página anterior
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
