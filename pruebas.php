<?php
session_start();
include("./componentes/encabezado.php");
require_once './API/conn/conexion.php'; // Conexión a la base de datos
include("./componentes/procesa_menuPruebas.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CognitiCare - Menú de Pruebas Cognitivas</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="Estilos/styles.css">
</head>
<body class="bodyPruebas">
    <div class="container mt-5" id="content">
        <h1 class="text-center mb-4">Bienvenido al Menú de Pruebas de CognitiCare</h1>
        <p class="text-center mb-5">Accede a las pruebas cognitivas diseñadas para apoyar el bienestar de los adultos mayores. Selecciona una prueba a continuación:</p>

        <div class="row row-cols-1 row-cols-md-2 g-4">
            <!-- Prueba 1 -->
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Escala de Quejas Subjetivas de Memoria</h5>
                        <p class="card-text">Evalúa las quejas subjetivas de memoria para detectar posibles problemas cognitivos.</p>
                        
                        <?php if (!in_array(1, $pruebas_realizadas)): ?>
                            <a href="prueba_EscaladeQuejasSubjetivasdeMemoria.php" class="btn btn-primary mt-3">Acceder a la Prueba</a>
                        <?php else: ?>
                            <button class="btn btn-secondary mt-3" disabled>Prueba ya realizada</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <!-- Prueba 2 -->
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Escala de Ansiedad Geriátrica</h5>
                        <p class="card-text">Mide niveles de ansiedad en adultos mayores para facilitar el diagnóstico y tratamiento.</p>
                        <?php if (!in_array(2, $pruebas_realizadas)): ?>
                            <a href="prueba_EscalaAnsiedadGeriatrica.php" class="btn btn-primary mt-3">Acceder a la Prueba</a>
                        <?php else: ?>
                            <button class="btn btn-secondary mt-3" disabled>Prueba ya realizada</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <!-- Prueba 3 -->
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Escala de Depresión Geriátrica (GDS)</h5>
                        <p class="card-text">Una herramienta de tamizaje para evaluar síntomas de depresión en adultos mayores.</p>

                        <?php if (!in_array(3, $pruebas_realizadas)): ?>
                            <!-- Mostrar el botón si la prueba no ha sido realizada -->
                            <a href="prueba_GDS.php" class="btn btn-primary mt-3">Acceder a la Prueba</a>
                        <?php else: ?>
                            <!-- Mostrar un mensaje si la prueba ya ha sido realizada -->
                            <button class="btn btn-secondary mt-3" disabled>Prueba ya realizada</button>
                        <?php endif; ?>                        
                    </div>
                </div>
            </div>
            <!-- Prueba 4 -->
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">IQCODE</h5>
                        <p class="card-text">Cuestionario para observar cambios cognitivos con el tiempo, útil en la detección de demencia.</p>

                        <?php if (!in_array(4, $pruebas_realizadas)): ?>
                            <!-- Mostrar el botón si la prueba no ha sido realizada -->
                            <a href="prueba_IQCODE.php" class="btn btn-primary mt-3">Acceder a la Prueba</a>
                        <?php else: ?>
                            <!-- Mostrar un mensaje si la prueba ya ha sido realizada -->
                            <button class="btn btn-secondary mt-3" disabled>Prueba ya realizada</button>
                        <?php endif; ?>
                    </div>
                </div>
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
    <!-- Main JS (Funcionalidad del navbar y sidebar) -->
    <script>
    // Pasar el array de PHP a JavaScript
    const pages = <?php echo json_encode($pages); ?>;
    </script>
    <script src="Scripts/main.js"></script>
</body>
</html>
