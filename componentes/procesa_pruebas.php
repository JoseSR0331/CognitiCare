<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Define el directorio base
define('BASE_PATH', __DIR__ . '/../');

// Incluye el archivo de conexión
$file = BASE_PATH . 'API/conn/conexion.php';
if (!file_exists($file)) {
    die(json_encode(['success' => false, 'message' => 'Error: No se encontró el archivo de conexión.']));
}
include($file);

// Verificar si la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $id_usuario = $data['id_usuario'] ?? null;
    $id_prueba = $data['id_prueba'] ?? null;
    $respuestas = $data['respuestas'] ?? [];

    if ($id_usuario && $id_prueba && !empty($respuestas)) {
        $conn->begin_transaction();

        try {
            $query = "INSERT INTO pruebas_realizadas (id_usuario, id_prueba, fecha) VALUES (?, ?, NOW())";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ii", $id_usuario, $id_prueba);
            $stmt->execute();

            $id_prueba_realizada = $conn->insert_id;

            $query = "INSERT INTO respuestas_realizadas (id_prueba_realizada, id_pregunta, respuesta, puntaje) 
                      VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($query);

            foreach ($respuestas as $respuesta) {
                $id_pregunta = $respuesta['pregunta'];
                $valor_respuesta = $respuesta['respuesta'];
                $puntaje = is_numeric($valor_respuesta) ? intval($valor_respuesta) : null;

                $stmt->bind_param("iisi", $id_prueba_realizada, $id_pregunta, $valor_respuesta, $puntaje);
                $stmt->execute();
            }

            $conn->commit();
            echo json_encode(['success' => true, 'message' => 'Examen guardado correctamente.']);
        } catch (Exception $e) {
            $conn->rollback();
            echo json_encode(['success' => false, 'message' => 'Error al guardar el examen.', 'error' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Datos incompletos enviados.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método de solicitud no permitido.']);
}
?>
