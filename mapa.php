<?php
session_start();
include("./componentes/encabezado.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CognitiCare - Mapa</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="Estilos/styles.css">
</head>
<body>
    <!-- Contenido Principal -->
    <div id="content">
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

    <!-- Footer -->
    <?php
    include("./componentes/pie.php");
    ?>

    <!-- Sripts de la pagina -->
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Pasar el array de PHP a JavaScript
    const pages = <?php echo json_encode($pages); ?>;
    </script>
    <!-- Main JS -->
    <script src="Scripts/main.js"></script>
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <!-- Scripts del mapa -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-5wCXg/U9mrv8DYkkvrFySD4ThJuZrwntgGbkT0i2yHk=" crossorigin=""></script>
    <script src="Scripts/map.js"></script>
</body>
</html>
