<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Seleccionar la Ubicación del Incidente en el Mapa</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #map-container {
            width: 500px; /* Ancho del contenedor del mapa */
            height: 500px; /* Alto del contenedor del mapa */
            margin: 0 auto; /* Centrar el contenedor horizontalmente */
        }

        #map {
            height: 100%; /* Usar el 100% del alto del contenedor */
        }
    </style>
</head>
<body>
    <h1>Seleccionar la Ubicación del Incidente en el Mapa</h1>
    <div id="map-container">
        <div id="map"></div>
    </div>
    <p>Latitud: <span id="latitud"></span>
    Longitud: <span id="longitud"></span></p>

    <button id="guardarUbicacion">Guardar Ubicación</button> <!-- Agrega un botón -->

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([0, 0], 2); // Coordenadas iniciales (centro del mundo) y nivel de zoom

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker = L.marker([0, 0], {
            draggable: true // Permitir arrastrar el marcador
        }).addTo(map);

        // Obtener la ubicación del dispositivo del usuario
        if ("geolocation" in navigator) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var latlng = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                map.setView(latlng, 15); // Centrar el mapa en la ubicación del dispositivo
                marker.setLatLng(latlng);
                document.getElementById('latitud').textContent = latlng.lat;
                document.getElementById('longitud').textContent = latlng.lng;
            });
        }

        // Escuchar el evento de arrastrar del marcador para obtener las coordenadas actualizadas
        marker.on('dragend', function(event) {
            var latlng = event.target.getLatLng();
            document.getElementById('latitud').textContent = latlng.lat;
            document.getElementById('longitud').textContent = latlng.lng;
        });

        document.getElementById('guardarUbicacion').addEventListener('click', function() {
            var latitud = document.getElementById('latitud').textContent;
            var longitud = document.getElementById('longitud').textContent;

            // Crear un objeto XMLHttpRequest
            var xhr = new XMLHttpRequest();

            // Definir el método HTTP (en este caso, POST) y la URL del archivo PHP que procesará los datos
            xhr.open('POST', '../../controlador/geoRegistro.php', true);

           
            // Crear los datos que se enviarán al servidor (en este caso, latitud y longitud)
            var datos = 'latitud=' + encodeURIComponent(latitud) + '&longitud=' + encodeURIComponent(longitud);

            // Enviar la solicitud al servidor
            xhr.send(datos);
        });

    </script>
</body>
</html>
