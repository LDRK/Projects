<?php
require(__DIR__ . '/fpdf.php');

//Reportes de Usuario Administrador
class ReporteUsuarios extends FPDF
{
    public function generarPdf($usuarios)
    {
        $this->AddPage();
        $this->SetTextColor(228, 100, 0);
        $this->Cell(50); // mover a la derecha
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(100, 10, 'REPORTE DE USUARIOS ', 0, 1, 'C', 0);
        $this->Ln(7);

        // Encabezado de la tabla
        $this->SetFont('Arial', 'B', 10);
        $this->SetFillColor(173, 216, 230);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(30, 10, 'ID', 1, 0, 'C', true);
        $this->Cell(45, 10, 'Nombre', 1, 0, 'C', true);
        $this->Cell(30, 10, 'Apellido', 1, 0, 'C', true);
        $this->Cell(30, 10, 'Usuario', 1, 0, 'C', true);
        $this->Cell(30, 10, 'Rol', 1, 0, 'C', true);
        $this->Ln();

        // Rellenar la tabla
        $this->SetFont('Arial', '', 9);
        foreach ($usuarios as $usuario) {
            $this->Cell(30, 10, $usuario['id_usuario'], 1);
            $this->Cell(45, 10, $usuario['nombre'], 1);
            $this->Cell(30, 10, $usuario['apellido'], 1);
            $this->Cell(30, 10, $usuario['username'], 1);
            $this->Cell(30, 10, $usuario['rol'], 1);
            $this->Ln();
        }

        // Salida del archivo en formato PDF
        $this->Output('I', 'reporteUsuarios.pdf');
    }
}


class ReporteProfesores extends FPDF
{
    public function generarPdfP($usuarios)
    {
        $this->AddPage();
        $this->SetTextColor(228, 100, 0);
        $this->Cell(50); // mover a la derecha
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(100, 10, 'REPORTE DE USUARIOS ', 0, 1, 'C', 0);
        $this->Ln(7);

        // Encabezado de la tabla
        $this->SetFont('Arial', 'B', 10);
        $this->SetFillColor(173, 216, 230);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(30, 10, 'ID', 1, 0, 'C', true);
        $this->Cell(45, 10, 'Nombre', 1, 0, 'C', true);
        $this->Cell(30, 10, 'Apellido', 1, 0, 'C', true);
        $this->Cell(30, 10, 'Usuario', 1, 0, 'C', true);
        $this->Cell(30, 10, 'Rol', 1, 0, 'C', true);
        $this->Ln();

        // Rellenar la tabla
        $this->SetFont('Arial', '', 9);
        foreach ($usuarios as $usuario) {
            $this->Cell(30, 10, $usuario['id_usuario'], 1);
            $this->Cell(45, 10, $usuario['nombre'], 1);
            $this->Cell(30, 10, $usuario['apellido'], 1);
            $this->Cell(30, 10, $usuario['username'], 1);
            $this->Cell(30, 10, $usuario['rol'], 1);
            $this->Ln();
        }

        // Salida del archivo en formato PDF
        $this->Output('I', 'reporteUsuarios.pdf');
    }
}



class ReporteEstudiantes extends FPDF
{
    public function generarPdfE($usuarios)
    {
        $this->AddPage();
        $this->SetTextColor(228, 100, 0);
        $this->Cell(50); // mover a la derecha
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(100, 10, 'REPORTE DE USUARIOS ', 0, 1, 'C', 0);
        $this->Ln(7);

        // Encabezado de la tabla
        $this->SetFont('Arial', 'B', 10);
        $this->SetFillColor(173, 216, 230);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(30, 10, 'ID', 1, 0, 'C', true);
        $this->Cell(45, 10, 'Nombre', 1, 0, 'C', true);
        $this->Cell(30, 10, 'Apellido', 1, 0, 'C', true);
        $this->Cell(30, 10, 'Usuario', 1, 0, 'C', true);
        $this->Cell(30, 10, 'Rol', 1, 0, 'C', true);
        $this->Ln();

        // Rellenar la tabla
        $this->SetFont('Arial', '', 9);
        foreach ($usuarios as $usuario) {
            $this->Cell(30, 10, $usuario['id_usuario'], 1);
            $this->Cell(45, 10, $usuario['nombre'], 1);
            $this->Cell(30, 10, $usuario['apellido'], 1);
            $this->Cell(30, 10, $usuario['username'], 1);
            $this->Cell(30, 10, $usuario['rol'], 1);
            $this->Ln();
        }

        // Salida del archivo en formato PDF
        $this->Output('I', 'reporteUsuarios.pdf');
    }
}


//Reportes 
class ReporteUEstudiantes extends FPDF
{
    public function generarPdfE($usuarios)
    {
        $this->AddPage();
        $this->SetTextColor(228, 100, 0);
        $this->Cell(50); // mover a la derecha
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(100, 10, 'REPORTE DE USUARIOS ', 0, 1, 'C', 0);
        $this->Ln(7);

        // Encabezado de la tabla
        $this->SetFont('Arial', 'B', 10);
        $this->SetFillColor(173, 216, 230);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(50, 10, 'ID', 1, 0, 'C', true);
        $this->Cell(50, 10, 'Nombre', 1, 0, 'C', true);
        $this->Cell(50, 10, 'Apellido', 1, 0, 'C', true);

        $this->Ln();

        // Rellenar la tabla
        $this->SetFont('Arial', '', 9);
        foreach ($usuarios as $usuario) {
            $this->Cell(50, 10, $usuario['id_usuario'], 1);
            $this->Cell(50, 10, $usuario['nombre'], 1);
            $this->Cell(50, 10, $usuario['apellido'], 1);
            $this->Ln();
        }

        // Salida del archivo en formato PDF
        $this->Output('I', 'reporteUsuarios.pdf');
    }
}