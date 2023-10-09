<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Denuncias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f2f2f2;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        h1 {
            font-size: 36px;
        }

        nav {
            background-color: #444;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
        }

        .server-info {
            padding: 20px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        /* Añade estilos personalizados para el formulario */
        .form-label {
            font-weight: bold;
        }

        .form-select,
        .form-control {
            width: 100%;
            margin-bottom: 15px;
        }

        .mb-4 {
            margin-bottom: 30px;
        }

        .btn-primary {
            margin-right: 10px;
        }

        .btn-danger {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>DENUNCIA</h1>
    </header>

    <nav>
        <a href="#prueba">Prueba</a>
        <a href="#agresor">Agresor</a>
        <a href="#victima">Victima</a>
    </nav>
    <div class="container mt-5">
        <form action="" method="POST">
            <h1 class="mb-4">Bienvenido al Registro de Denuncias</h1>

            <div class="mb-3">
                <label for="tipo" class="form-label">Seleccione el tipo de denuncia:</label>
                <select class="form-select" name="tipo" id="tipo" required>
                    <option value="Violencia física">Violencia física</option>
                    <option value="Violencia psicológica o emocional">Violencia psicológica o emocional</option>
                    <option value="Violencia verbal">Violencia verbal</option>
                    <option value="Violencia sexual">Violencia sexual</option>
                    <option value="Violencia doméstica o de pareja">Violencia doméstica o de pareja</option>
                    <option value="Violencia escolar o bullying">Violencia escolar o bullying</option>
                    <option value="Violencia racial o xenofobia">Violencia racial o xenofobia</option>
                    <option value="Violencia económica">Violencia económica</option>
                    <option value="Violencia política">Violencia política</option>
                    <option value="Violencia en línea o ciberacoso">Violencia en línea o ciberacoso</option>
                    <option value="Violencia de género">Violencia de género</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="des" class="form-label">Descripción:</label>
                <textarea class="form-control" name="des" id="des" rows="4" placeholder="Escriba aquí su descripción" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">¿La denuncia será anónima?</label>
                <label class="form-check-label">
                    <input type="radio" name="respuesta" value="no"> No
                </label>
                <label class="form-check-label">
                    <input type="radio" name="respuesta" value="si"> Si
                </label>
            </div>
            <div class="mb-3">
                <label for="tes" class="form-label">Ingrese nombre del testigo:</label>
                <input type="text" class="form-control" name="tes" id="tes" placeholder="Escriba aquí el nombre del testigo" disabled>
            </div>

           <h1>Datos Victima</h1>
            <iframe id="victima" src="../controlador/victimaRegistro.php" width="100%" height="1400px" frameborder="0"></iframe>
            <h1>Datos Agresor</h1>
            <iframe id="agresor" src="../controlador/agresorRegistro.php" width="100%" height="1450px" frameborder="0"></iframe>
            <h1>Pruebas</h1>
            <iframe id="prueba" src="../controlador/pruebaRegistro.php" width="100%" height="500px" frameborder="0"></iframe>
            <h1>Ubicación</h1>
            <iframe src="../controlador/geoRegistro.php" width="100%" height="1000px" frameborder="0"></iframe>
            
            <button type="submit" class="btn btn-primary" name="RegistrarDenuncia">Registrar Denuncia</button>
            <button type="button" class="btn btn-danger" onclick="window.location.href='../controlador/panelweb.php'">Volver</button>
        </form>
    </div>
    <div class="container">
        <!-- Contenido adicional -->
    </div>
    <script>
        // Obtener referencias a los elementos del DOM
        const radioRespuesta = document.getElementsByName('respuesta');
        const campoTestigo = document.getElementById('tes'); // Reemplaza 'campoTestigo' con el ID real de tu campo

        // Agregar un evento change a los radios de respuesta
        for (let i = 0; i < radioRespuesta.length; i++) {
            radioRespuesta[i].addEventListener('change', function () {
                // Habilitar o deshabilitar el campo de testigo según la respuesta seleccionada
                campoTestigo.disabled = radioRespuesta[1].checked; // Deshabilita si "No" está seleccionado
            });
        }
    </script>
<script>
  window.watsonAssistantChatOptions = {
    integrationID: "b5720f5e-69c2-4db5-9923-cb183ac44279", // The ID of this integration.
    region: "us-east", // The region your integration is hosted in.
    serviceInstanceID: "409cab03-959f-4d95-991c-8b1d8852b2af", // The ID of your service instance.
    onLoad: function(instance) { instance.render(); }
  };
  setTimeout(function(){
    const t=document.createElement('script');
    t.src="https://web-chat.global.assistant.watson.appdomain.cloud/versions/" + (window.watsonAssistantChatOptions.clientVersion || 'latest') + "/WatsonAssistantChatEntry.js";
    document.head.appendChild(t);
  });
</script>
 <footer>
        © 2023 Mi Página Web de Denuncias
    </footer>
</body>
</html>
