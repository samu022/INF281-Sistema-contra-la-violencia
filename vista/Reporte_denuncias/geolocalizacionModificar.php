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

    <form id="ubicacionForm" action="" method="post">
        <input type="hidden" id="latitudInput" name="latitud">
        <input type="hidden" id="longitudInput" name="longitud">
        <button type="submit">Modificar Ubicación</button>
    </form>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([0, 0], 2);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker = L.marker([0, 0], {
            draggable: true
        }).addTo(map);

        if ("geolocation" in navigator) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var latlng = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                map.setView(latlng, 15);
                marker.setLatLng(latlng);
                document.getElementById('latitud').textContent = latlng.lat;
                document.getElementById('longitud').textContent = latlng.lng;

                document.getElementById('latitudInput').value = latlng.lat;
                document.getElementById('longitudInput').value = latlng.lng;
            });
        }

        marker.on('dragend', function(event) {
            var latlng = event.target.getLatLng();
            document.getElementById('latitud').textContent = latlng.lat;
            document.getElementById('longitud').textContent = latlng.lng;

            document.getElementById('latitudInput').value = latlng.lat;
            document.getElementById('longitudInput').value = latlng.lng;
        });
    </script>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //include("../modelo/conexion.php");
    $cod = $_GET['cod'];
    $codDenunciante = $_GET['cod'];
    //include("../modelo/DenunciaClase.php");
    include("../modelo/GeoClase.php");

    $latitud = $_POST["latitud"];
    $longitud = $_POST["longitud"];
    $carDen=new Denuncia($cod,"","","","","","");
    $resDen = $carDen->lista_especifica();
    $carGeo=new Geolocalizacion($carDen->getCodGeo(),"","");
    $resGeo = $carGeo->lista_especifica();
    $carGeo->setLatitud($latitud);
    $carGeo->setLongitud($longitud);
    $res = $carGeo->modifica();
    
} else {
    echo "El formulario no se ha enviado correctamente.";
}
?>
