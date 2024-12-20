<?php
function obtenerPreguntas($conn, $id_prueba) {
    $query = "SELECT 
                p.id_quest, 
                p.pregunta, 
                r.descripcion, 
                r.puntaje 
              FROM preguntas p
              JOIN pregunta_respuesta pr ON p.id_quest = pr.id_quest
              JOIN respuestas r ON pr.id_resp = r.id_resp
              WHERE p.id_p = ?
              ORDER BY p.id_quest, r.puntaje";

    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die("Error en la consulta: " . $conn->error);
    }
    $stmt->bind_param("i", $id_prueba);
    $stmt->execute();
    $result = $stmt->get_result();

    $preguntas = [];
    while ($row = $result->fetch_assoc()) {
        $id_quest = htmlspecialchars($row['id_quest']);
        if (!isset($preguntas[$id_quest])) {
            $preguntas[$id_quest] = [
                'pregunta' => htmlspecialchars($row['pregunta']),
                'respuestas' => []
            ];
        }
        $preguntas[$id_quest]['respuestas'][] = [
            'descripcion' => htmlspecialchars($row['descripcion']),
            'puntaje' => (int)$row['puntaje']
        ];
    }
    $stmt->close();
    return $preguntas;
}

// Verificar si la prueba ya fue realizada
$query = "SELECT 1 FROM pruebas_realizadas WHERE id_usuario = ? AND id_prueba = ? LIMIT 1";
$stmt = $conn->prepare($query);
if (!$stmt) {
    die("Error en la consulta: " . $conn->error);
}
$stmt->bind_param("ii", $id_usuario, $id_prueba);
$stmt->execute();
$stmt->store_result();
// Redirigir si la prueba ya fue realizada
if ($stmt->num_rows > 0) {
    $_SESSION['prueba_ya_realizada'] = 'Ya realizaste esta prueba. Selecciona otra disponible.';
    header("Location: pruebas.php");
    exit;
}
$stmt->close();
?>
