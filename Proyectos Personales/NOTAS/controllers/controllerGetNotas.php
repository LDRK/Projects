<?php
require_once '../models/modelNotas.php';

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

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    session_start(); // Iniciar la sesión
    if (!isset($_SESSION['usuario_id'])) {
        echo json_encode(["success" => false, "message" => "Usuario no autenticado"]);
        exit();
    }

    $id_usuario = $_SESSION['usuario_id']; // Obtener ID del usuario
   
    try {
        $resultado = $usuario->getNotasEstudiante($id_usuario);


        // Log del resultado de la consulta
        error_log("Resultado de notas para el usuario ID " . $id_usuario . ": " . json_encode($resultado));
        
        if (empty($resultado)) {
            echo json_encode(["success" => false, "message" => "No hay notas registradas"]);
            exit();
        }
        echo  $resultado;
        exit();
    } catch (Exception $e) {
        echo json_encode(["success" => false, "message" => "Error en el servidor"]);
 
        exit();
    }
}

?>