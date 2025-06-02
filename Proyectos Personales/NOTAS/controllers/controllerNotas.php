<?php
require_once '../models/modelProcesos.php';

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

$usuario = new Notas();

// Manejo de solicitudes GET y POST
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id_estudiante'])) {
        // Obtener materias de un estudiante específico
        $id_estudiante = intval($_GET['id_estudiante']);
        try {
            $materiasPorEstudiante = $usuario->getMateriasPorEstudinates($id_estudiante);
            echo $materiasPorEstudiante;
            exit();
        } catch (Exception $e) {
            error_log("Error en el controlador: " . $e->getMessage());
            echo json_encode(["success" => false, "message" => $e->getMessage()]);
        }
    } else {
        // Solicitud para obtener estudiantes, materias y periodos
        try {
            $estudiantes = $usuario->getEstudiantes(); // Obtengo los estudiantes.
            $materias = $usuario->getMaterias(); // Obtengo las materias.
            $periodos = $usuario->getPeriodos(); // Obtengo los periodos.

            // Decodificamos los JSON para combinarlos
            $estudiantes = json_decode($estudiantes, true);
            $materias = json_decode($materias, true);
            $periodos = json_decode($periodos, true);

            // Enviamos ambas respuestas combinadas en un solo JSON
            echo json_encode([
                "estudiantes" => $estudiantes,
                "materias" => $materias,
                "periodos" => $periodos
            ]);

            exit();
        } catch (Exception $e) {
            error_log("Error en el controlador: " . $e->getMessage());
            echo json_encode(["success" => false, "message" => $e->getMessage()]);
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir datos de la solicitud en formato JSON
    $datos = file_get_contents("php://input");
    $data = json_decode($datos, true);

    if ($data === null) {
        echo json_encode(["success" => false, "message" => "JSON inválido o vacío"]);
        exit();
    }

    if (isset($data['accion'])) {
        $accion = $data['accion'];

        switch ($accion) {
            case 'crear':
                $notas = $data['notas'];
                $resultados = [];

                foreach ($notas as $nota) {
                    $estudianteId = $nota['estudianteId'];
                    $materiaId = $nota['materiaId'];
                    $periodoId = $nota['periodoId'];
                    $notaValue = $nota['valor'];

                    if ($notaValue < 1 || $notaValue > 10) {
                        $resultados[] = [
                            "estudianteId" => $estudianteId,
                            "success" => false,
                            "message" => "La nota debe estar entre 1 y 10"
                        ];
                        continue;
                    }

                    try {
                        $resultado = $usuario->crearNotas($estudianteId, $materiaId, $periodoId, $notaValue);
                        $resultados[] = [
                            "estudianteId" => $estudianteId,
                            "success" => $resultado
                        ];
                    } catch (Exception $e) {
                        $resultados[] = [
                            "estudianteId" => $estudianteId,
                            "success" => false,
                            "message" => $e->getMessage()
                        ];
                    }
                }

                echo json_encode($resultados);
                break;
            default:
                echo json_encode(["success" => false, "message" => "Acción no válida"]);
                break;
        }
    } else {
        echo json_encode(["success" => false, "message" => "No se recibieron datos"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Método no permitido"]);
}