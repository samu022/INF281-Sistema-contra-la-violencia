<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Lista de Contactos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        
        h1 {
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        
        .contact-card {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px 0;
            background-color: #fff;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
        }
        
        .contact-card h2 {
            margin-top: 0;
        }
        
        .contact-card p {
            margin: 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Lista de Contactos</h1>
    </header>
    <div class="container">
        <div class="contact-card">
            <h2>Nombre del Contacto 1</h2>
            <p>Correo Electrónico: contacto1@example.com</p>
            <p>Teléfono: 123-456-7890</p>
        </div>
        <div class="contact-card">
            <h2>Nombre del Contacto 2</h2>
            <p>Correo Electrónico: contacto2@example.com</p>
            <p>Teléfono: 987-654-3210</p>
        </div>
        <!-- Agrega más contactos aquí -->
        <!-- Botón Bootstrap -->
    <button type="button" class="btn btn-danger" onclick="window.location.href='../controlador/panelweb.php'">Volver</button>
    
    <!-- Incluir la biblioteca de Bootstrap (JavaScript) si es necesario -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </div>
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
</body>
</html>
