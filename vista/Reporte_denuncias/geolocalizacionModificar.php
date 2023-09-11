<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Seleccionar la Ubicación del Incidente en el Mapa</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #map-container {
            width: 500px;
            height: 500px;
            margin: 0 auto;
        }

        #map {
            height: 100%;
        }
    </style>
</head>
<body>
    <h1>Seleccionar la Ubicación del Incidente en el Mapa</h1>
    <div id="map-container">
        <div id="map"></div>
    </div>
    <p>Latitud: <span id="latitud"></span> Longitud: <span id="longitud"></span></p>

    <form id="ubicacionForm" action="" method="POST">
        <input type="hidden" id="latitudInput" name="latitud">
        <input type="hidden" id="longitudInput" name="longitud">
        <button type="submit">Modificar Ubicación</button>
    </form>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        // Latitud y longitud iniciales (puedes establecerlas en las coordenadas que desees)
        var latitud = <?php echo $latitud; ?>;
        var longitud = <?php echo $longitud; ?>;

        var map = L.map('map').setView([latitud, longitud], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker = L.marker([latitud, longitud], {
            draggable: true // Permite que el marcador sea arrastrable
        }).addTo(map);

        // Función para actualizar el formulario con las coordenadas del marcador
        function updateForm(lat, lng) {
            document.getElementById('latitud').textContent = lat;
            document.getElementById('longitud').textContent = lng;

            document.getElementById('latitudInput').value = lat;
            document.getElementById('longitudInput').value = lng;
        }

        // Evento que se activa cuando el marcador se arrastra
        marker.on('dragend', function (event) {
            var newLatLng = event.target.getLatLng();
            updateForm(newLatLng.lat, newLatLng.lng);
        });
    </script>
</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["latitud"]) && isset($_POST["longitud"])) {
    //include("../modelo/conexion.php");
    
    //include("../modelo/DenunciaClase.php");
    //include("../modelo/GeoClase.php");

    $latitud = $_POST["latitud"];
    $longitud = $_POST["longitud"];
    $carDen=new Denuncia($cod,"","","","","","");
    $resDen = $carDen->lista_especifica();
    $reg = $resDen->fetch_assoc();
    $codGeo=$reg['codGeo'];
    $carGeo=new Geolocalizacion($codGeo,"","");
    $resGeo = $carGeo->lista_especifica();
    $carGeo->setLatitud($latitud);
    $carGeo->setLongitud($longitud);
    $res = $carGeo->modifica();
} 

?>
