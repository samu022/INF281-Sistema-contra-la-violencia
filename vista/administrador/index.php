<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Descripción de la página">
    <meta name="author" content="Nombre del autor">
    <title>SB Admin 2 - Dashboard</title>
    <!-- Agrega Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body> <!-- Agregado el elemento <body> -->
    <div class="row">
       <div class="col-xl-3 col-md-6">
            <div class="card bg-primary">
                <div class="card-body d-flex text-white">
                    <span>Usuarios</span>
                    <i class="fas fa-user fa-2x ml-auto"></i>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between" >
                    <a href="../controlador/usuarioLista.php" class="text-white">Ver Detalles</a>
                    <span class="text-white">
                        <?php
                        // Incluye los archivos de conexión y la clase de usuario
                        include("../modelo/conexion.php");
                        include("../modelo/usuarioClase.php");

                        // Crea una instancia de la clase Usuario
                        $cargU = new Usuario("","","","","");

                        // Obtiene el número de usuarios
                        $resp = $cargU->cuenta();
                        echo $resp;
                        ?>
                    </span>
                </div>
            </div> 
            

        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success">
                <div class="card-body d-flex text-white">
                    <span>Eventos</span>
                    <i class="fas fa-users fa-2x ml-auto"></i>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between" >
                    <a href="../controlador/eventoLista.php" class="text-white">Ver Detalles</a>
                    <span class="text-white">
                    <?php
                        // Incluye los archivos de conexión y la clase de usuario
                        //include("../../modelo/conexion.php");
                        include("../modelo/EventoClase.php");

                        // Crea una instancia de la clase Usuario
                        $cargU = new Evento("","","","","","","","","","","","","");

                        // Obtiene el número de usuarios
                        $resp = $cargU->cuenta();
                        echo $resp;
                        ?>
                    </span>
                </div>
            </div> 
            

        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger">
                <div class="card-body d-flex text-white">
                    <span>Denuncias</span>
                    <i class="fab fa-product-hunt  fa-2x ml-auto"></i>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between" >
                    <a href="../controlador/denunciaLista.php" class="text-white">Ver Detalles</a>
                    <span class="text-white">
                    <?php
                        // Incluye los archivos de conexión y la clase de usuario
                        //include("../../modelo/conexion.php");
                        include("../modelo/DenunciaClase.php");

                        // Crea una instancia de la clase Usuario
                        $cargU = new Denuncia("","","","","","","");

                        // Obtiene el número de usuarios
                        $resp = $cargU->cuenta();
                        echo $resp;
                        ?>
                    </span>
                </div>
            </div> 
            

        </div>
    </div>    
     
    <!--SEGUNDA LINEA-->
    <div class="row">
            <div class="col-xl-3 col-md-6">
            <div class="card bg-info"> <!-- Cambiar la clase "bg-primary" por "bg-info" para cambiar el color de fondo -->
                <div class="card-body d-flex text-white">
                    <span>Información educativa</span>
                    <i class="fas fa-graduation-cap fa-2x ml-auto"></i> <!-- Cambiar el icono a uno relacionado con educación -->
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="../controlador/informacionEducativaLista.php" class="text-white">Ver Detalles</a>
                    <span class="text-white">
                        <?php
                        // Incluye los archivos de conexión y la clase de usuario
                        include("../modelo/InformacionEducativaClase.php");

                        // Crea una instancia de la clase InformacionEducativa
                        $cargU = new InformacionEducativa("","","","","","","");

                        // Obtiene el número de registros de información educativa
                        $resp = $cargU->cuenta();
                        echo $resp;
                        ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning"> <!-- Cambia la clase "bg-success" por "bg-warning" para cambiar el color de fondo -->
                <div class="card-body d-flex text-white">
                    <span>Leyes Normativas</span>
                    <i class="fas fa-gavel fa-2x ml-auto"></i> <!-- Cambia el icono a uno relacionado con leyes -->
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="../controlador/leyLista.php" class="text-white">Ver Detalles</a> <!-- Cambia el enlace a "LeyesNormativas.php" si es necesario -->
                    <span class="text-white">
                        <?php
                        // Incluye los archivos de conexión y la clase de Ley_Normativa
                        include("../modelo/Ley_NormativaClase.php");

                        // Crea una instancia de la clase Ley_Normativa
                        $cargU = new Ley_Normativa("","","","","");

                        // Obtiene el número de registros de Leyes Normativas
                        $resp = $cargU->cuenta();
                        echo $resp;
                        ?>
                    </span>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-info"> <!-- Cambia la clase "bg-danger" por "bg-info" para cambiar el color de fondo -->
                <div class="card-body d-flex text-white">
                    <span>Centros Locales</span>
                    <i class="fas fa-hospital  fa-2x ml-auto"></i> <!-- Cambia el icono a uno relacionado con centros locales de ayuda -->
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="../controlador/centroLocalLista.php" class="text-white">Ver Detalles</a> <!-- Cambia el enlace a "CentrosLocales.php" si es necesario -->
                    <span class="text-white">
                        <?php
                        // Incluye los archivos de conexión y la clase de CentroLocal
                        include("../modelo/CentroLocalClase.php");

                        // Crea una instancia de la clase CentroLocal
                        $cargU = new CentroLocal("","","","","","");

                        // Obtiene el número de registros de Centros Locales de Ayuda
                        $resp = $cargU->cuenta();
                        echo $resp;
                        ?>
                    </span>
                </div>
            </div>
        </div>

    </div>  
     <!--Grafico de Denuncias por Tipo -->
     <div class="row">
        <div class="col-md-12">
            <canvas id="graficoDenunciasTipo"></canvas>
        </div>
    </div>

    <!-- Agrega la referencia a la biblioteca Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Obtén los datos de la función PHP
        <?php
        $carg = new Denuncia("","","","","","","");
        ?>
        var datosDenuncias = <?php echo json_encode($carg->grafico_tipo()); ?>;

        // Extrae las etiquetas (tipos de denuncias) y la cantidad de denuncias
        var etiquetas = [];
        var cantidadDenuncias = [];

        for (var i = 0; i < datosDenuncias.length; i++) {
            etiquetas.push(datosDenuncias[i].tipo);
            cantidadDenuncias.push(datosDenuncias[i].cantidad_denuncias);
        }

        // Obtén el elemento canvas del gráfico
        var ctx = document.getElementById('graficoDenunciasTipo').getContext('2d');

        // Crea el gráfico de barras
        var graficoDenuncias = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: etiquetas,
                datasets: [{
                    label: 'Cantidad de Denuncias por Tipo',
                    data: cantidadDenuncias,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>