
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
       /* Primary Card */
       
.primary-card {
    background-color: #007bff;
    color: #ffffff;
}

/* Success Card */
.success-card {
    background-color: #28a745;
    color: #ffffff;
}

/* Danger Card */
.danger-card {
    background-color: #dc3545;
    color: #ffffff;
}

/* Info Card */
.info-card {
    background-color: #17a2b8;
    color: #ffffff;
}

/* Warning Card */
.warning-card {
    background-color: #ffc107;
    color: #000000;
}

/* Card Title */
.card-title {
    color: #333; /* Adjust the color to make the title more readable */
    margin-bottom: 10px;
}

/* Card Text */
.card-text {
    color: #555; /* Adjust the color to make the text more readable */
}

/* Card Footer Text */
.card-footer-text {
    color: #555; /* Adjust the color to make the footer text more readable */
}
    </style>
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
    <div class="container">
    <h4>Reporte de tipos de denuncia</h4>
        <div class="row mb-1">
            <!-- Columna para el primer gráfico -->
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <canvas id="graficoDenunciasTipo"></canvas>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Columna para el segundo gráfico -->
            <div class="col-md-6">
            <h4>Reporte de edades de todos los usuarios</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <canvas id="graficoEdadesUsuarios"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h4>Edades de las victimas</h4>
        <div class="row mb-2">
            <!-- Columna para el primer gráfico -->
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <canvas id="graficoEdadVictima"></canvas>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Columna para el segundo gráfico -->
        
         
            
           <!-- Gráfico por Día, Mes y Año -->
    <div class="col-md-6">
    <h4>Reporte de tipos de denuncia desde fecha dada</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Gráfico por Día, Mes y Año</h5>
                        <form id="formularioDiaMesAnio" method="POST" action="">
                            <div class="form-group">
                                <label for="dia">Seleccione el Día:</label>
                                <input type="date" class="form-control" id="dia" name="dia">
                            </div>
                            <button type="submit" class="btn btn-primary">Generar Gráfico</button>
                        </form>
                        <canvas id="graficoDiaViolencia"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>



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
    <br>
    <!--Grafico por edad de usuarios rangos-->
   <!-- Agrega el elemento canvas para el gráfico -->
  


   <?php
$carg = new Usuario("", "", "", "", "");
$edadesData = $carg->edades();
?>

<script>
    // Obtén los datos de PHP y analízalos en un objeto JavaScript
    var datosEdades = <?php echo $edadesData; ?>;

    // Verifica si se obtuvieron datos correctamente
    if (datosEdades !== null) {
        // Obtiene el elemento canvas del gráfico
        var ctx = document.getElementById('graficoEdadesUsuarios').getContext('2d');

        // Crea el gráfico de barras
        var graficoEdadesUsuarios = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: Object.keys(datosEdades),
                datasets: [{
                    label: 'Cantidad de Usuarios por Edad',
                    data: Object.values(datosEdades),
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
    } else {
        console.log("No se obtuvieron datos de edades de usuarios.");
    }
</script>


<!-- Agrega el elemento canvas para el gráfico circular -->



<?php
include("../modelo/victimaClase.php");
$carg = new Victima("", "", "");
$edadesData = $carg->edades();
?>

<script>
    // Obtén los datos de PHP y analízalos en un objeto JavaScript
    var datosEdades = <?php echo $edadesData; ?>;
    
    // Verifica si se obtuvieron datos correctamente
    if (datosEdades !== null) {
        // Obtiene el elemento canvas del gráfico circular
        var ctx = document.getElementById('graficoEdadVictima').getContext('2d');
    
        // Crea el gráfico circular
        var graficoEdadesVictimas = new Chart(ctx, {
            type: 'pie', // Cambia el tipo de gráfico a pie
            data: {
                labels: Object.keys(datosEdades),
                datasets: [{
                    data: Object.values(datosEdades),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // Evita que el gráfico se ajuste automáticamente
                plugins: {
                    legend: {
                        display: true,
                        position: 'right' // Cambia la posición de la leyenda a la derecha
                    }
                }
            }
        });
    } else {
        console.log("No se obtuvieron datos de edades de víctimas.");
    }
</script>

<!-- Agrega el elemento canvas para el gráfico -->


<!-- Script PHP para obtener datos -->
<?php
$carg1 = new Denuncia("", "", "", "", "", "", "");
$fecha = "2023-01-01";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si se envió el formulario

    // Obtiene la fecha seleccionada desde $_POST
    $fecha = $_POST["dia"];
    $fecha = date("Y-m-d", strtotime($fecha));
    // Puedes hacer lo que necesites con la fecha, por ejemplo, mostrarla
   
}

$datosDenuncias = $carg1->denunciasPorFecha($fecha);

//print_r($datosDenuncias);
?>

<!-- Script JavaScript para crear el gráfico -->
<script>
    var datosDenuncias = <?php echo json_encode($datosDenuncias); ?>;

    // Extrae las etiquetas (tipos de denuncias) y la cantidad de denuncias
    var etiquetas = [];
    var cantidadDenuncias = [];

    for (var i = 0; i < datosDenuncias.length; i++) {
        etiquetas.push(datosDenuncias[i].tipo);
        cantidadDenuncias.push(datosDenuncias[i].cantidad);
    }
    console.log(etiquetas);
console.log(cantidadDenuncias);

    // Obtiene el elemento canvas del gráfico
    var ctx = document.getElementById('graficoDiaViolencia').getContext('2d');

    // Crea el gráfico de barras
    var graficoDiaViolencia = new Chart(ctx, {
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

