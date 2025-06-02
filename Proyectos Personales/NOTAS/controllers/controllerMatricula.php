<?php
require_once '../models/modelProcesos.php';


// errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//Revisar Errores de CORS (Cross-Origin Resource Sharing)
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Aseguramos que la salida sea JSON
header('Content-Type: application/json');

$usuario = new Matricula();

//Depuracion
$datos = file_get_contents("php://input");
file_put_contents('php://stderr', print_r($datos, TRUE)); // Esto mostrará los datos recibidos en los logs de errores de PHP

// Manejo de solicitudes GET y POST
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Solicitud para obtener profesores
    try {
        $estudiantes = $usuario->getEstudiantes(); //Obtendo los estudiantes.
        $materias = $usuario -> getMaterias(); //Obtengo las materias.
        // Decodificamos los JSON para combinarlos
        $estudiantes = json_decode($estudiantes, true); // Esto debe ser un arreglo
        $materias = json_decode($materias, true); // Esto debe ser un arreglo
        

        //Enviamos ambas respuestas cOmbinadas en un solo Json.
        echo json_encode([
            "estudiantes" => $estudiantes,
            "materias" => $materias
        ]);
        exit();
    } catch (Exception $e) {
        error_log("Error en el controlador:" . $e->getMessage());
        echo json_encode(["success" => false, "message" => $e->getMessage()]);
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
                $matricula = $data['matricula'];
                foreach ($matricula as $datos){
                    $estudiante = $datos['estudiante']; //Aceder al ID del Usuario.
                    $materia = $datos['materia']; //Aceder al ID de la Materia.
                    $semestre = $datos['semestre']; //Aceder al numero del semestre.
                
                
                
                try {
                    $resultado = $usuario->crearMatricula($estudiante,$materia, $semestre);
                    echo json_encode(["success" => $resultado]);
                } catch (Exception $e) {
                    echo json_encode(["success" => false, "message" => $e->getMessage()]);
                }
            }
                break;

            case 'modificar':
                // Lógica para modificar
                break;

            case 'eliminar':
                // Lógica para eliminar
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

?>