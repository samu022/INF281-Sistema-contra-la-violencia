<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Seleccionar la Ubicación del Incidente en el Mapa</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        #map-container {
            width: 700px; /* Ancho del contenedor del mapa */
            height: 500px; /* Alto del contenedor del mapa */
            margin: 0 auto; /* Centrar el contenedor horizontalmente */
        }

        #map {
            height: 100%; /* Usar el 100% del alto del contenedor */
        }
    </style>
</head>
<body>
<section class="form-register">
    <h4>Seleccionar la Ubicación del Incidente en el Mapa</h4>
    <div id="map-container">
        <div id="map"></div>
    </div>
    <p><font size=6>Latitud: </font><span id="latitud"></span></p>
    <p><font size=6>Longitud: </font><span id="longitud"></span></p>

    <form id="ubicacionForm" action="" method="post">
        <input type="hidden" id="latitudInput" name="latitud">
        <input type="hidden" id="longitudInput" name="longitud">
        <button class="botons" type="submit">Guardar Ubicación</button> <!-- Agrega un botón de envío -->
    </form>

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

                // Actualizar los campos de formulario con las coordenadas
                document.getElementById('latitudInput').value = latlng.lat;
                document.getElementById('longitudInput').value = latlng.lng;
            });
        }

        // Escuchar el evento de arrastrar del marcador para obtener las coordenadas actualizadas
        marker.on('dragend', function(event) {
            var latlng = event.target.getLatLng();
            document.getElementById('latitud').textContent = latlng.lat;
            document.getElementById('longitud').textContent = latlng.lng;

            // Actualizar los campos de formulario con las coordenadas
            document.getElementById('latitudInput').value = latlng.lat;
            document.getElementById('longitudInput').value = latlng.lng;
        });
    </script>
</section> 
</body>
</html>
