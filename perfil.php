<?php
session_start();
include("./componentes/encabezado.php");
require_once './API/conn/conexion.php'; // Conexión a la base de datos
include("./componentes/procesa_perfil.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CognitiCare - Perfil de Usuario</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="Estilos/styles.css">
</head>
<body>
    <div class="container py-5" id="content-perfil">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Tarjeta de información del usuario -->
                <div class="card shadow-sm custom-card">
                    <div class="card-body text-center">
                        <div class="mb-4">
                            <img src="./imgs/user.png" alt="Foto de perfil" class="img-fluid rounded-circle" style="max-height: 100px;">
                        </div>
                        <h3 class="card-title"><?php echo htmlspecialchars($nombre . ' ' . $apellidos); ?></h3>
                        <p class="text-muted mb-2">Usuario: <?php echo htmlspecialchars($nombreUsuario); ?></p>
                        <p class="text-muted mb-2">Correo: <?php echo htmlspecialchars($email); ?></p>
                        <p class="text-muted mb-2">Edad: <?php echo htmlspecialchars($edad); ?> años</p>
                        <p class="text-muted mb-2">Fecha de registro: <?php echo htmlspecialchars($fecha_registro); ?></p>
                    </div>
                </div>
            
                <!-- Tarjeta de historial de pruebas -->
                <div class="card mt-4 shadow-sm custom-card">
                    <div class="card-header bg-dark text-white">
                        <h4>Historial de Pruebas</h4>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($pruebas)): ?>
                            <ul class="list-group">
                                <?php foreach ($pruebas as $prueba): ?>
                                    <li class="list-group-item">
                                        <h5><?php echo htmlspecialchars(strtoupper($prueba['descripcion'])); ?></h5>
                                        <p><strong>Fecha:</strong> <?php echo htmlspecialchars($prueba['fecha']); ?></p>
                                        <a href="pdf.php?id=<?php echo $prueba['idPrueba']; ?>" class="btn btn-primary btn-sm mt-2">Ver Resultados en PDF</a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p class="text-muted">No se han encontrado pruebas realizadas.</p>
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
    <script>
    // Pasar el array de PHP a JavaScript
    const pages = <?php echo json_encode($pages); ?>;
    </script>
    <!-- Main JS -->
    <script src="Scripts/main.js"></script>
</body>
</html>