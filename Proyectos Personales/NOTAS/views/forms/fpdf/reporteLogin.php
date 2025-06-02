<?php
// Incluir la librería FPDF
require('./fpdf.php');
require_once('../../conexion/conexion.php');

// Consulta SQL para obtener los usuarios que han iniciado sesión
$sql = "SELECT u.id_usuario, u.nombre, u.username, l.fecha, l.hora FROM usuario u LEFT JOIN login l ON u.id_usuario = l.id_usuario";
$result = $conexion->query($sql);

// Crear una nueva instancia de FPDF
$pdf = new FPDF();
$pdf->AddPage();



// Establecer la fuente para el título del reporte
$pdf->SetTextColor(228, 100, 0);
$pdf->Cell(50); // mover a la derecha
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(100, 10,'REPORTE DE INICIO DE SESION ', 0, 1, 'C', 0);
$pdf->Ln(7);

// Encabezado de la tabla
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(173, 216, 230); // Color de fondo para el encabezado (azul claro)
$pdf->SetTextColor(0, 0, 0); // Color del texto para el encabezado (blanco)
$pdf->Cell(30, 10, 'ID Usuario', 1, 0, 'C', true);
$pdf->Cell(50, 10, 'Nombre', 1, 0, 'C', true);
$pdf->Cell(50, 10, 'Username', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Fecha', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Hora', 1, 0, 'C', true);
$pdf->Ln();

// Verificar si hay registros y rellenar la tabla con los datos
$pdf->SetFont('Arial', '', 12);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(30, 10, $row['id_usuario'], 1);
        $pdf->Cell(50, 10, $row['nombre'], 1);
        $pdf->Cell(50, 10, $row['username'], 1);
        $pdf->Cell(30, 10, $row['fecha'], 1);
        $pdf->Cell(30, 10, $row['hora'], 1);
        $pdf->Ln();
    }
} else {
    $pdf->Cell(0, 10, 'No se encontraron registros', 1, 1, 'C');
}

// Salida del archivo en formato PDF
$pdf->Output();
?>