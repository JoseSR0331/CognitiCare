<?php
$id_prueba = 3; // ID de la prueba correspondiente a esta página

// Verificar si la prueba ya fue realizada
$query = "SELECT COUNT(*) as total FROM pruebas_realizadas WHERE id_usuario = ? AND id_prueba = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $id_usuario, $id_prueba);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row['total'] > 0) {
    $_SESSION['prueba_ya_realizada'] = 'Ya realizaste esta prueba. Selecciona otra disponible.';
    header("Location: pruebas.php");
    exit;
}

// Obtener preguntas y respuestas
$query = "SELECT 
            p.id_quest, 
            p.pregunta, 
            r.descripcion, 
            r.puntaje 
          FROM 
            preguntas p
          JOIN 
            pregunta_respuesta pr ON p.id_quest = pr.id_quest
          JOIN 
            respuestas r ON pr.id_resp = r.id_resp
          WHERE
            p.id_p = ?
          ORDER BY 
            p.id_quest, r.puntaje";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_prueba);
$stmt->execute();
$result = $stmt->get_result();

$preguntas = [];
while ($row = $result->fetch_assoc()) {
    if (!isset($preguntas[$row['id_quest']])) {
        $preguntas[$row['id_quest']] = [
            'pregunta' => $row['pregunta'],
            'respuestas' => []
        ];
    }
    $preguntas[$row['id_quest']]['respuestas'][] = [
        'descripcion' => $row['descripcion'],
        'puntaje' => $row['puntaje']
    ];
}
?>