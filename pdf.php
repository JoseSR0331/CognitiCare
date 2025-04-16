<?php
require_once('./componentes/fpdf/html2pdf.php');

// Crear una nueva instancia de FPDF
$pdf = new PDF_HTML();
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 11);

// Encabezado con logo y título
$pdf->Image('./imgs/logo-removebg.png', 10, 10, 30); // Ajusta la ruta y tamaño del logo
$pdf->SetFont('helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Reporte de Resultados de Pruebas', 0, 1, 'C');
$pdf->Ln(10); // Espacio debajo del título

// Conectar a la base de datos
$conn = new mysqli("localhost", "root", "", "cogniticare");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos de las pruebas realizadas
$result = $conn->query("
    SELECT u.usuario, p.nombre_p, p.descripcion, ru.respuestas, pr.fecha_completada
    FROM pruebas_realizadas pr
    INNER JOIN usuarios u ON pr.id_usuario = u.id_us
    INNER JOIN pruebas p ON pr.id_prueba = p.id_p
    INNER JOIN respuestas_usuario ru ON pr.id_respuestas = ru.id_registro
    WHERE pr.realizada = 1
");

// Mostrar información del usuario
if ($row = $result->fetch_assoc()) {
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(0, 10, 'Informacion del Usuario', 0, 1, 'L');
    $pdf->SetFont('helvetica', '', 11);
    $pdf->Cell(0, 10, 'Usuario: ' . $row['usuario'], 0, 1, 'L');
    $pdf->Ln(10); // Espacio debajo de la información del usuario
}

// Reiniciar el puntero del resultado para procesar las pruebas
$result->data_seek(0);

// Estilizar la tabla
$pdf->SetFont('helvetica', 'B', 12);
$pdf->SetFillColor(200, 220, 255); // Color de fondo para el encabezado
$pdf->Cell(40, 10, 'Prueba', 1, 0, 'C', true);
$pdf->Cell(50, 10, 'Descripcion', 1, 0, 'C', true);
$pdf->Cell(60, 10, 'Resultados', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Total Puntos', 1, 1, 'C', true);

$pdf->SetFont('helvetica', '', 11);
$pdf->SetFillColor(245, 245, 245); // Color de fondo alternativo para las filas
$fill = false;

while ($row = $result->fetch_assoc()) {
    $respuestas = json_decode($row['respuestas'], true);
    $respuestasTexto = '';
    $totalPuntos = 0;

    // Procesar las respuestas
    foreach ($respuestas as $respuesta) {
        // Obtener el puntaje de la respuesta desde la base de datos
        $preguntaId = $respuesta['pregunta'];
        $respuestaId = $respuesta['respuesta'];

        $puntajeQuery = $conn->query("
            SELECT puntaje 
            FROM respuestas 
            WHERE id_resp = $respuestaId
        ");

        $puntajeRow = $puntajeQuery->fetch_assoc();
        $puntos = $puntajeRow['puntaje'] ?? 0; // Si no se encuentra, asignar 0

        $respuestasTexto .= "P$preguntaId: R$respuestaId ($puntos puntos)\n";
        $totalPuntos += $puntos; // Sumar los puntos de cada respuesta
    }

    // Mostrar los datos de la prueba
    $pdf->Cell(40, 10, $row['nombre_p'], 1, 0, 'C', $fill);
    $pdf->Cell(50, 10, $row['descripcion'], 1, 0, 'C', $fill);

    // Usar MultiCell para mostrar respuestas largas
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->MultiCell(60, 10, $respuestasTexto, 1, 'L', $fill);
    $pdf->SetXY($x + 60, $y);

    $pdf->Cell(30, 10, $totalPuntos, 1, 1, 'C', $fill);

    $fill = !$fill; // Alternar color de fondo
}

// Cerrar conexión
$conn->close();

// Descargar el PDF
$pdf->Output('reporte.pdf', 'I');
?>
