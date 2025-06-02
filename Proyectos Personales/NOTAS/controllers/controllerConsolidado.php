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

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    try {
        $resultado = $usuario->consolidado(); 
            if (empty($resultado)) {
                error_log("Controlador: No se recibieron datos de los Estudiantes");
                echo json_encode(["success" => false, "message" => "No hay Estudiantes"]);
                exit();
            } else {
                echo $resultado; // Retornamos el JSON del consolidado.
                exit();
            }
    } catch (Exception $e) {
        throw $e;
    }
}
?>