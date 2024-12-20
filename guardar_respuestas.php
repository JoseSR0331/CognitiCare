<?php
session_start();
header('Content-Type: application/json');

// Incluir la conexión existente
include("./API/conn/conexion.php");

// Leer el contenido JSON enviado desde JavaScript
$inputJSON = file_get_contents('php://input');
$datos = json_decode($inputJSON, true); // Decodificar a un arreglo asociativo

// Validar que se recibieron los datos necesarios
if (isset($datos['id_usuario'], $datos['id_prueba'], $datos['respuestas'])) {
    $id_usuario = $datos['id_usuario'];
    $id_prueba = $datos['id_prueba'];
    $respuestas = json_encode($datos['respuestas']); // Convertir respuestas a JSON para guardarlas

    // Iniciar una transacción para asegurar consistencia
    $conn->begin_transaction();

    try {
        // 1. Insertar en respuestas_usuario
        $sql_respuestas = "INSERT INTO respuestas_usuario (id_prueba, id_usuario, respuestas) VALUES (?, ?, ?)";
        $stmt_respuestas = $conn->prepare($sql_respuestas);
        $stmt_respuestas->bind_param("iis", $id_prueba, $id_usuario, $respuestas);

        if (!$stmt_respuestas->execute()) {
            throw new Exception("Error al insertar en respuestas_usuario: " . $stmt_respuestas->error);
        }

        // Obtener el ID del registro insertado
        $id_respuestas = $stmt_respuestas->insert_id;

        // 2. Insertar en pruebas_realizadas con la clave foránea
        $sql_pruebas_realizadas = "INSERT INTO pruebas_realizadas (id_usuario, id_prueba, realizada, id_respuestas) VALUES (?, ?, 1, ?)";
        $stmt_pruebas = $conn->prepare($sql_pruebas_realizadas);
        $stmt_pruebas->bind_param("iii", $id_usuario, $id_prueba, $id_respuestas);

        if (!$stmt_pruebas->execute()) {
            throw new Exception("Error al insertar en pruebas_realizadas: " . $stmt_pruebas->error);
        }

        // Confirmar la transacción
        $conn->commit();

        // Responder con éxito
        echo json_encode(['status' => 'success', 'message' => 'Datos guardados correctamente y prueba completada']);
    } catch (Exception $e) {
        // Revertir la transacción en caso de error
        $conn->rollback();

        // Responder con el error
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    } finally {
        // Cerrar los statements
        $stmt_respuestas->close();
        $stmt_pruebas->close();
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Datos incompletos']);
}

// Cerrar la conexión
$conn->close();
