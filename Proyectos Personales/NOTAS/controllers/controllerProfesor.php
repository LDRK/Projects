<?php
require_once '../models/modelRegistroUsu.php';

// Errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Revisar Errores de CORS (Cross-Origin Resource Sharing)
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET');
header('Access-Control-Allow-Headers: Content-Type');

// Aseguramos que la salida sea JSON
header('Content-Type: application/json');

$usuario = new Usuario();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'pdfREstudiantes':
                try {
                    $resultado = $usuario->getEstudiantes(); 
                    if (empty($resultado)) {
                        error_log("Controlador: No se recibieron datos de los usuarios tipo 1");
                        echo json_encode(["success" => false, "message" => "No hay usuarios tipo 1"]);
                        exit();
                    }

                    require_once('../views/forms/fpdf/reporteUsuarios.php');
                    $pdf = new ReporteUEstudiantes(); 
                    $pdf->generarPdfE(json_decode($resultado, true));

                    exit();
                } catch (Exception $e) {
                    error_log("Error en el controlador: " . $e->getMessage());
                    echo json_encode(["success" => false, "message" => $e->getMessage()]);
                    exit();
                }
                break;
            }
        
    }else{
        //  obtener los estudiantes.
        try {
            $resultado = $usuario->getEstudiantes(); 
            if (empty($resultado)) {
                error_log("Controlador: No se recibieron datos de los Estudiantes");
                echo json_encode(["success" => false, "message" => "No hay Estudiantes"]);
                exit();
            } else {
                echo $resultado; // Retornamos el JSON de los estudiantes
                exit();
            }
        } catch (Exception $e) {
            error_log("Error en el controlador: " . $e->getMessage());
            echo json_encode(["success" => false, "message" => $e->getMessage()]);
            exit();
        }
    }
}else{
    echo json_encode(["success" => false, "message" => "No se recibieron datos"]);
}

?>