<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
//Identificar ID de Usuario y de Prueba
$id_usuario = $_SESSION['user_id'];
$id_prueba = 2;
//Añadir los componentes para el funcionamiento especifico de la pagina
include("./componentes/encabezado.php");
include("./API/conn/conexion.php");
include("./Scripts/preguntas.php");

$preguntas = obtenerPreguntas($conn, $id_prueba);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CognitiCare - Prueba Escala de Ansiedad Geriatrica</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="Estilos/styles.css">
    <!-- Scripts JQuery y Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-5" id="content">
    <h1>Prueba Escala de Ansiedad Geriatrica</h1>
    <div id="message" class="alert alert-warning d-none"></div>
    <!-- Cuestionario -->
    <div class="question-container">
        <?php foreach ($preguntas as $id_pregunta => $pregunta_data): ?>
            <div class='question d-none' id='question<?= $id_pregunta ?>'>
                <label class='form-label'><?= $pregunta_data['pregunta'] ?></label>
                <?php foreach ($pregunta_data['respuestas'] as $respuesta): ?>
                    <div class='form-check'>
                        <input type='radio' class='form-check-input' id='p<?= $id_pregunta ?>_opcion<?= $respuesta['puntaje'] ?>' name='pregunta<?= $id_pregunta ?>' value='<?= $respuesta['puntaje'] ?>'>
                        <label class='form-check-label' for='p<?= $id_pregunta ?>_opcion<?= $respuesta['puntaje'] ?>'><?= $respuesta['descripcion'] ?></label>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- Botones de Navegacion -->
    <div class="navigation-buttons mt-3">
        <button id="prevBtn" onclick="navigateQuestion(-1)" class="btn btn-secondary d-none">Anterior</button>
        <button id="nextBtn" onclick="navigateQuestion(1)" class="btn btn-primary">Siguiente</button>
        <div id="submitBtnDiv" class="d-none">
            <button onclick="submitExam(<?= $id_usuario ?>, <?= $id_prueba ?>)" class="btn btn-success">Enviar Examen</button>
        </div>
    </div>
</div>

<!-- Footer -->
<?php 
include("./componentes/pie.php"); 
?>

<!-- Scripts de la Pagina -->
<!-- Scripts para las Pruebas -->
<script src="Scripts/evaluacion.js"></script>
<script>
    setQuestions(<?= json_encode(array_keys($preguntas)); ?>);
</script>
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
