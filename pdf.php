<?php
require_once('../componentes/tcpdf/tcpdf.php');

// Crear una nueva instancia de TCPDF
$pdf = new TCPDF();
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 12);

// Conectar a la base de datos
$conn = new mysqli("localhost", "root", "", "pdf");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM user");

$html = '<pre>

        
        

















        <h1>Reporte de Datos</h1></pre>';
$html .= '<table border="1" cellspacing="3" cellpadding="4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pregunta 1</th>
                    <th>Respuesta 1</th>
                </tr>
            </thead>
            <tbody>';

while ($row = $result->fetch_assoc()) {
    $datos = json_decode($row['preguntas'],true);
    $pregunta = $datos["pregunta 1"];
    $respuesta = $datos["respuesta 1"];
    $html .= '<tr>
                <td>' . $row['id'] . '</td>
                <td>'. $pregunta .'</td>
                <td>' . $respuesta . '</td>
              </tr>';
}

$html .= '</tbody></table>';

$pdf->Image('C:/users/saul12/desktop/enclave.jpg', 30, 20, 140, 100 );
// Agregar el HTML al PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Cerrar conexión
$conn->close();

// Descargar el PDF
$pdf->Output('reporte.pdf', 'I');
?>
