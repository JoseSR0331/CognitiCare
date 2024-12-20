// Inicializar el mapa en el contenedor 'map' con las coordenadas del CEMAM
document.addEventListener('DOMContentLoaded', function () {
    var map = L.map('map').setView([20.723761072414128, -103.41124152135987], 16);

    // Cargar y mostrar el mapa de OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    // Agregar un marcador en la ubicación del CEMAM
    var marker = L.marker([20.723761072414128, -103.41124152135987]).addTo(map);
    marker.bindPopup("<b>CEMAM</b><br>Centro Metropolitano del Adulto Mayor<br>Cerrada Santa Laura, Av Sta Margarita S/N, Real del Parque, Zapopan, Jalisco.").openPopup();
});
