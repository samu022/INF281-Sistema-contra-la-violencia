<!DOCTYPE html>
<html lang="es">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Contra la Violencia</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.8/main.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.8/main.min.js"></script>
    <link rel="stylesheet" href="../controlador/estilos/style.css">
    
    <style>
        /* Estilo personalizado para el pie de página */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
        .animate__animated {
            animation-duration: 1s;
        }
        .custom-card {
            background-color: #ccffcc; /* Color de fondo */
            border: none; /* Quita el borde de las tarjetas */
            margin-bottom: 20px; /* Espacio entre las tarjetas */
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* Sombra */
            transition: transform 0.2s; /* Efecto de transformación al pasar el cursor */
        }

        .custom-card:hover {
            transform: scale(1.02); /* Efecto de aumento al pasar el cursor */
        }

        .custom-card-img-top {
            width: 100%; /* Asegura que la imagen se ajuste al ancho de la tarjeta */
            height: auto; /* Altura automática para mantener la proporción de la imagen */
        }

        .custom-card-body {
            padding: 15px; /* Espaciado interior del cuerpo de la tarjeta */
        }
        #informacion-educativa {
            background-color: #99ccff; /* Color de fondo que desees */
        }
        
        #informacion-educativa h1 {
            font-size: 90px; /* Tamaño de fuente */
            color: #ffffff; /* Color del texto */
            text-align: center; /* Alineación del texto */
            margin-bottom: 20px; /* Margen inferior para separar el título del contenido */
        }
        #eventos {
            background-color: #99ccff; /* Color de fondo que desees */
        }
        #eventos h1 {
            font-size: 90px; /* Tamaño de fuente */
            color: #ffffff; /* Color del texto */
            text-align: center; /* Alineación del texto */
            margin-bottom: 20px; /* Margen inferior para separar el título del contenido */
        }
        #leyes {
            background-color: #99ccff; /* Color de fondo que desees */
        }
        #leyes h1 {
            font-size: 90px; /* Tamaño de fuente */
            color: #ffffff; /* Color del texto */
            text-align: center; /* Alineación del texto */
            margin-bottom: 20px; /* Margen inferior para separar el título del contenido */
        }
        #centroLocal {
            background-color: #99ccff; /* Color de fondo que desees */
        }
        #centroLocal h1 {
            font-size: 90px; /* Tamaño de fuente */
            color: #ffffff; /* Color del texto */
            text-align: center; /* Alineación del texto */
            margin-bottom: 20px; /* Margen inferior para separar el título del contenido */
        }
        .circle-card {
            width: 180px; /* Tamaño del círculo */
            height: 180px; /* Tamaño del círculo */
            border-radius: 50%; /* Hace que el contenedor sea circular */
            overflow: hidden; /* Oculta las partes del contenido fuera del círculo */
            margin: 0 auto; /* Centra el contenedor horizontalmente */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Sombra para resaltar */
        }

        .circle-card .card-body {
            padding: 20px; /* Espaciado interno del contenido */
        }

        .circle-card h5.card-title {
            text-align: center; /* Centra el título del centro local */
        }

        .circle-card ul {
            list-style-type: none; /* Quita los puntos de la lista */
            padding: 0;
        }

        .circle-card ul li {
            margin-bottom: 10px; /* Espaciado entre elementos de la lista */
        }
        /* Estilos para los botones personalizados */
        /* Estilo para los botones */
        /* Contenedor de botones */
        .button-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px; /* Espacio entre las filas de botones */
        }

        /* Filas de botones */
        .button-row {
            display: flex;
            justify-content: center;
            gap: 20px; /* Espacio entre los botones en la misma fila */
        }

        /* Estilo para los botones */
        .custom-button {
            background-color: #007bff;
            border: none;
            padding: 10px; /* Ajusta el tamaño del botón */
            color: #fff;
            text-align: center;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 0px 16px 20px rgba(0, 0, 0, 0.9); /* Sombra tipo 3D */
        }

        .custom-button-image {
            width: 320px; /* Tamaño de la imagen */
            height: 280px; /* Tamaño de la imagen */
            margin-bottom: 5px; /* Espaciado entre la imagen y el texto */
        }
    </style>

    <!-- Agrega jQuery y la biblioteca animate.css -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Script para activar la animación -->
    <script>
        $(document).ready(function() {
            // Aplica la animación a todos los elementos con la clase animate__animated cuando el elemento entre en el área visible de la pantalla
            $(".animate__animated").waypoint(function() {
                $(this.element).addClass("animate__fadeInUp");
            }, {
                offset: "75%" // Ajusta este valor según sea necesario
            });
        });
    </script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <!-- Agrega un botón para Cerrar Sesión -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="../controlador/cerrar_sesion.php">Cerrar Sesión</a>
            </li>
        </ul>
        <!-- Resto del código de la barra de navegación... -->
    </div>
</nav>
    <!-- Menu delgado -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="logos/logo.png" alt="logo"></a>
            <p style="color:white;">Sistema contra la violencia</p>
            <ul class="navbar-nav ml-auto" style="display: flex; align-items: center;">
                <form action="" method="post" accept-charset="utf-8" style="display: inline;">
                    <button type="submit" class="nav-link text-white" name="inicio" style="background: none; border: none; padding: 0; margin: 0; cursor: pointer;">Inicio</button>
                </form>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../controlador/contactosLista.php">Contactos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Acerca de nosotros</a>
                </li>
            </ul>

        </div>
    </nav>

    <!-- Línea blanca sin margen -->
    <hr class="bg-white" style="margin: 0;">

    <!-- Barra de navegación grande -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Sistema contra violencia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="denunciaRegistro.php">Registrar denuncia</a>
                    </li>
                    <li class="nav-item">
                        <form action="" method="post" accept-charset="utf-8" style="display: inline;">
                            <button type="submit" class="btn btn-link nav-link text-white" name="eventos">Eventos</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <form action="" method="post" accept-charset="utf-8" style="display: inline;">
                            <button type="submit" class="btn btn-link nav-link text-white" name="informacionEducativa">Informacion Educativa</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <form action="" method="post" accept-charset="utf-8" style="display: inline;">
                            <button type="submit" class="btn btn-link nav-link text-white" name="leyes">Leyes Normativas</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <form action="" method="post" accept-charset="utf-8" style="display: inline;">
                            <button type="submit" class="btn btn-link nav-link text-white" name="centrosLocales">Centros Locales</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="usuarioRegistro.php">Registro</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
    <!-- Slider -->
    <div class="container mt-4" id="slider-inicial">
        <?php include("slide.php"); ?>
        <!-- Agrega el contenido del slider aquí -->
    </div>

     <!-- Botones para redirigir a las páginas -->
     <div class="button-container">
    <div class="row justify-content-center">
        <!-- Botón Eventos -->
        <div class="col-md-6 col-12 mx-auto"> <!-- Agregamos la clase mx-auto -->
            <form action="" method="post" accept-charset="utf-8">
                <button type="submit" class="custom-button" name="eventos">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQN4T_Iq-aWFjkh1ZlsQlzdZa6dqAby6gOnDWwsjw4up-UR87ZVp-Gn85he6OQ2mHoX-gI&usqp=CAU" alt="Eventos" class="custom-button-image">
                    <span class="custom-button-text">Eventos</span>
                </button>
            </form>
        </div>

        <!-- Botón Información Educativa -->
        <div class="col-md-6 col-12 mx-auto"> <!-- Agregamos la clase mx-auto -->
            <form action="" method="post" accept-charset="utf-8">
                <button type="submit" class="custom-button" name="informacionEducativa">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRPV2MD7wChF43cfvGNGwJgk_e3P8nGez8wRh9gyYqj3CeOuZuC7lrfJz7z-OkGdJ_Yg3A&usqp=CAUg" alt="Información Educativa" class="custom-button-image">
                    <span class="custom-button-text">Información Educativa</span>
                </button>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <!-- Botón Centros Locales -->
        <div class="col-md-6 col-12 mx-auto"> <!-- Agregamos la clase mx-auto -->
            <form action="" method="post" accept-charset="utf-8">
                <button type="submit" class="custom-button" name="centrosLocales">
                    <img src="https://img2.freepng.es/20190520/oya/kisspng-black-white-m-building-logo-font-home-home2-5ce3448fd27d53.4147901115583980958622.jpg" alt="Centros Locales" class="custom-button-image">
                    <span class="custom-button-text">Centros Locales</span>
                </button>
            </form>
        </div>

        <!-- Botón Leyes Normativas -->
        <div class="col-md-6 col-12 mx-auto"> <!-- Agregamos la clase mx-auto -->
            <form action="" method="post" accept-charset="utf-8">
                <button type="submit" class="custom-button" name="leyes">
                    <img src="https://www.gobiernoelectronico.gob.ec/wp-content/uploads/2019/10/Leyes-8-449x298.png" alt="Leyes Normativas" class="custom-button-image">
                    <span class="custom-button-text">Leyes Normativas</span>
                </button>
            </form>
        </div>
    </div>
</div>





    <!-- Pie de página -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; 2023 Sistema Contra la Violencia</p>
                </div>
                <div class="col-md-6">
                    <!-- Iconos de redes sociales -->
                    <a href="#" class="social-icons"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="social-icons"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icons"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p>Información de contacto</p>
                    <p>Dirección: Calle Principal, Ciudad</p>
                    <p>Teléfono: (123) 456-7890</p>
                    <p>Correo electrónico: info@example.com</p>
                </div>
                <div class="col-md-6">
                    <p>Enlaces útiles</p>
                    <ul>
                        <li><a href="#">Política de privacidad</a></li>
                        <li><a href="#">Términos de servicio</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts de Bootstrap (jQuery y Popper.js) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Script de Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <!-- Aquí se colocará el chatbot -->
    <div id="chat-container"></div>

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
