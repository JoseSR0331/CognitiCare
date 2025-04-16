<?php
require_once('./componentes/fpdf/html2pdf.php');

// Crear una nueva instancia de FPDF
$pdf = new PDF_HTML();
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 12);

// Conectar a la base de datos
$conn = new mysqli("localhost", "root", "", "cogniticare");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos de las pruebas realizadas
$result = $conn->query("
    SELECT pr.id_registro, u.usuario, p.nombre_p, p.descripcion, ru.respuestas, pr.fecha_completada
    FROM pruebas_realizadas pr
    INNER JOIN usuarios u ON pr.id_usuario = u.id_us
    INNER JOIN pruebas p ON pr.id_prueba = p.id_p
    INNER JOIN respuestas_usuario ru ON pr.id_respuestas = ru.id_registro
    WHERE pr.realizada = 1
");

$html = '<h1>Reporte de Resultados de Pruebas</h1>';
$html .= '<table border="1" cellspacing="3" cellpadding="4">
            <thead>
                <tr>
                    <th>ID Registro</th>
                    <th>Usuario</th>
                    <th>Prueba</th>
                    <th>Descripción</th>
                    <th>Respuestas</th>
                    <th>Fecha Completada</th>
                </tr>
            </thead>
            <tbody>';

while ($row = $result->fetch_assoc()) {
    $respuestas = json_decode($row['respuestas'], true);
    $respuestasTexto = '';
    foreach ($respuestas as $respuesta) {
        $respuestasTexto .= "Pregunta {$respuesta['pregunta']}: Respuesta {$respuesta['respuesta']}<br>";
    }

    $html .= '<tr>
                <td>' . $row['id_registro'] . '</td>
                <td>' . $row['usuario'] . '</td>
                <td>' . $row['nombre_p'] . '</td>
                <td>' . $row['descripcion'] . '</td>
                <td>' . $respuestasTexto . '</td>
                <td>' . $row['fecha_completada'] . '</td>
              </tr>';
}

$html .= '</tbody></table>';

// Agregar el HTML al PDF
$pdf->WriteHTML($html);

// Cerrar conexión
$conn->close();

// Descargar el PDF
$pdf->Output('reporte.pdf', 'I');
?>
