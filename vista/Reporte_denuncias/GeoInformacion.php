<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ubicación denuncia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
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
    <h1>Ubicación de la denuncia (Código: <?php echo $cod; ?>)</h1>
    <div id="map-container">
        <div id="map"></div>
    </div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        var latitud = <?php echo $latitud; ?>; // Latitud deseada
        var longitud = <?php echo $longitud; ?>; // Longitud deseada

        var map = L.map('map').setView([latitud, longitud], 15); // Centrar el mapa en las coordenadas deseadas

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker = L.marker([latitud, longitud]).addTo(map); // Agregar un marcador en la ubicación deseada
    </script>
    <button type="button" class="btn btn-primary mt-3" onclick="window.location.href='../controlador/denunciaLista.php'">Volver</button>
</body>
</html>
