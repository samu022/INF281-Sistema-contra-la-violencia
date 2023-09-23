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
    <!-- Menu delgado -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="logos/logo.png" alt="logo"></a>
            <p style="color:white;">Sistema contra la violencia</p>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Inicio</a>
                </li>
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
                        <a class="nav-link text-white" href="#eventos">Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#informacion-educativa">Información Educativa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#leyes">Leyes Normativas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#centroLocal">Centros Locales</a>
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

  <!-- Información Educativa -->
<div class="container mt-4" id="informacion-educativa">
    <h1 style="text-align: center;">Información Educativa</h1>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="tipoViolencia" class="form-label">Seleccione el tipo de violencia:</label>
            <select class="form-select" name="tipoViolencia" id="tipoViolencia" required>
                <option value="Violencia fisica">Violencia física</option>
                <option value="Violencia psicológica o emocional">Violencia psicológica o emocional</option>
                <option value="Violencia verbal">Violencia verbal</option>
                <option value="Violencia sexual">Violencia sexual</option>
                <option value="Violencia doméstica o de pareja">Violencia doméstica o de pareja</option>
                <option value="Violencia escolar o bullying">Violencia escolar o bullying</option>
                <option value="Violencia racial o xenofobia">Violencia racial o xenofobia</option>
                <option value="Violencia económica">Violencia económica</option>
                <option value="Violencia política">Violencia política</option>
                <option value="Violencia en línea o ciberacoso">Violencia en línea o ciberacoso</option>
                <option value="Violencia de genero">Violencia de género</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="filtrarInformacion">Buscar</button>
    </form>
    

    <div class="row">
        <?php
        $count = 0;
        while ($reg = mysqli_fetch_array($res2)) {
            $count++;
        ?>
        <div class="col-md-4 animate__animated animate__fadeInUp">
            <div class="custom-card">
                <?php
                $rutaDirectorio = $reg['rutaDirectorio'];
                $extension = pathinfo($rutaDirectorio, PATHINFO_EXTENSION);

                if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif'])) {
                    // Si es una imagen, muestra la imagen
                    echo "<img src='../archivosInformacionEducativa/$rutaDirectorio' class='custom-card-img-top' alt=''>";
                } elseif (strtolower($extension) == 'pdf') {
                    // Si es un PDF, muestra el PDF en un iframe
                    echo "<iframe src='../archivosInformacionEducativa/$rutaDirectorio' class='custom-card-img-top' width='300' height='200'></iframe>";
                    echo "<a href='../archivosInformacionEducativa/$rutaDirectorio' target='_blank'>Ver PDF</a>";
                } elseif (in_array(strtolower($extension), ['mp4', 'avi', 'mkv'])) {
                    // Si es un video, muestra el video en un elemento de video
                    echo "<video class='custom-card-img-top' width='300' height='200' controls>";
                    echo "<source src='../archivosInformacionEducativa/$rutaDirectorio' type='video/$extension'>";
                    echo "Tu navegador no admite la reproducción de video.";
                    echo "</video>";
                }
                ?>
                <div class="custom-card-body">
                    <h5 class="card-title"><?php echo $reg['titulo']; ?></h5>
                    <p class="card-text"><?php echo $reg['descripcion']; ?></p>
                    <p class="card-text"><strong>Tipo de Violencia:</strong> <?php echo $reg['tipoViolencia']; ?></p>
                    <p class="card-text"><strong>Tipo:</strong> <?php echo $reg['tipo']; ?></p>
                    <p class="card-text"><strong>Fecha de publicacion :</strong> <?php echo $reg['fechaSubida']; ?></p>
                    <a href="../archivosInformacionEducativa/<?php echo $rutaDirectorio; ?>" class="btn btn-primary" download>Descargar</a>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>

    <?php
    if ($count == 0) {
        echo "<div style='text-align: center;' class='alert alert-danger' role='alert'>";
        echo "<h3>No hay informaciones registradas</h3></div>";
    }
    ?>
</div>

    <!-- Eventos -->
    <div class="container mt-4" id="eventos">
        <h1>Eventos</h1>
        <div class="row" >
            <?php
            $cont = 0;
            while ($reg = mysqli_fetch_array($res)) {
                $cont = $cont + 1;
                ?>
                <div class="col-md-4 animate__animated animate__fadeInUp">
                    <div class="custom-card">
                        <?php
                        $rutaDirectorio = $reg['rutaDirectorio'];
                        $extension = pathinfo($rutaDirectorio, PATHINFO_EXTENSION);

                        if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif'])) {
                            // Si es una imagen, muestra la imagen
                            echo "<img src='../archivosEventos/$rutaDirectorio' class='card-img-top' alt=''>";
                        } elseif (strtolower($extension) == 'pdf') {
                            // Si es un PDF, muestra el PDF en un iframe
                            echo "<iframe src='../archivosEventos/$rutaDirectorio' class='card-img-top' width='300' height='200'></iframe>";
                            echo "<a href='../archivosEventos/$rutaDirectorio' target='_blank'>Ver PDF</a>";
                        } elseif (in_array(strtolower($extension), ['mp4', 'avi', 'mkv'])) {
                            // Si es un video, muestra el video en un elemento de video
                            echo "<video class='card-img-top' width='300' height='200' controls>";
                            echo "<source src='../archivosEventos/$rutaDirectorio' type='video/$extension'>";
                            echo "Tu navegador no admite la reproducción de video.";
                            echo "</video>";
                        }
                        ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $reg['titulo']; ?></h5>
                            <p class="card-text"><?php echo $reg['descripcion']; ?></p>
                            <p class="card-text"><strong>Tipo de Violencia:</strong> <?php echo $reg['tipoViolencia']; ?></p>
                            <p class="card-text"><strong>Fecha:</strong> <?php echo $reg['fecha']; ?></p>
                            <p class="card-text"><strong>Hora Inicio:</strong> <?php echo $reg['horaInicio']; ?></p>
                            <p class="card-text"><strong>Hora Final:</strong> <?php echo $reg['horaFinal']; ?></p>
                            <p class="card-text"><strong>Modalidad:</strong> <?php echo $reg['modalidad']; ?></p>
                            <p class="card-text"><strong>Expositor:</strong> <?php echo $reg['expositor']; ?></p>
                            <p class="card-text"><strong>Fecha de Publicacion:</strong> <?php echo $reg['fechaSubida']; ?></p>
                            <a href="../archivosEventos/<?php echo $rutaDirectorio; ?>" class="btn btn-primary" download>Descargar</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
        if ($cont == 0) {
            echo "<div style='text-align: center;' class='alert alert-danger' role='alert'>";
            echo "<h3>No hay eventos registrados</h3></div>";
        }
        ?>
    </div>


    <!-- Leyes Normativas -->
    <div class="container mt-4" id="leyes">
        <h1 class="text-center">Leyes Normativas</h1>
        <div class="row">
            <?php
            $cont = 0;
            while ($reg = mysqli_fetch_array($res3)) {
                $cont = $cont + 1;
                ?>
                <div class="col-md-4 animate__animated animate__fadeInUp">
            <div class="custom-card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $reg['nombre']; ?></h5>
                            <ul class="list-unstyled">
                                <li><strong>Fecha de Promulgación:</strong> <?php echo $reg['fecha_promulgacion']; ?></li>
                                <li><strong>Temática:</strong> <?php echo $reg['tematica']; ?></li>
                            </ul>
                            <a href="<?php echo $reg['informacion']; ?>" class="btn btn-primary btn-block" target="_blank">Ver Ley</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
        if ($cont == 0) {
            echo "<div style='text-align: center;' class='alert alert-danger' role='alert'>";
            echo "<h3>No hay leyes registradas actualmente</h3></div>";
        }
        ?>
    </div>


    <!-- Centros Locales -->
    <div class="container mt-4" id="centroLocal">
        <h1 class="text-center">Centros Locales</h1>
        <div class="row">
            <?php
            $cont = 0;
            while ($reg = mysqli_fetch_array($res4)) {
                $cont = $cont + 1;
                ?>
                <div class="col-md-4 animate__animated animate__fadeInUp">
                    <div class="custom-card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $reg['nombre']; ?></h5>
                            <ul class="list-unstyled">
                                <li><strong>Código Centro:</strong> <?php echo $reg['codCentro']; ?></li>
                                <li><strong>Teléfono:</strong> <?php echo $reg['telefono']; ?></li>
                                <li><strong>Ubicación:</strong> <?php echo $reg['ubicacion']; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
        if ($cont == 0) {
            echo "<div style='text-align: center;' class='alert alert-danger' role='alert'>";
            echo "<h3>No hay centros registrados actualmente</h3></div>";
        }
        ?>
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
