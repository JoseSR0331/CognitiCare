<!DOCTYPE html>
<html lang="es">
<?php
include("./componentes/encabezado.php");
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CognitiCare - Mapa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
</head>
<body>
    <div class="container mt-5">
        <div class="map-container">
            <!-- Contenedor del Mapa -->
            <div id="map"></div>
            <!-- Información de la Ubicación -->
            <div class="map-info">
                <h2>Información de la Ubicación</h2>
                <p><strong>Nombre:</strong> Centro Metropolitano del Adulto Mayor (CEMAM)</p>
                <p><strong>Dirección:</strong> Cerrada Santa Laura, Av Sta Margarita S/N, Real del Parque, 45150 Zapopan, Jal.</p>
                <p><strong>Descripción:</strong> El CEMAM es un centro dedicado a actividades y servicios para el adulto mayor en el área de Zapopan.</p>
            </div>
        </div>
    </div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        // Inicializar el mapa en el contenedor 'map' con las coordenadas del CEMAM
        var map = L.map('map').setView([20.723761072414128, -103.41124152135987], 16);

        // Cargar y mostrar el mapa de OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Agregar un marcador en la ubicación del CEMAM
        var marker = L.marker([20.723761072414128, -103.41124152135987]).addTo(map);
        marker.bindPopup("<b>CEMAM</b><br>Centro Metropolitano del Adulto Mayor<br>Cerrada Santa Laura, Av Sta Margarita S/N, Real del Parque, Zapopan, Jalisco.").openPopup();
    </script>
</body>
</html>