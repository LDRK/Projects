<?php
require_once '../models/modelRegistroUsu.php'; // Incluimos el modelo

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

// Iniciar la sesión
//session_start();

// Recibir los datos de la solicitud en formato JSON
// $data = json_decode(file_get_contents("php://input"), true);
// Agrega esto para depurar
$datos = file_get_contents("php://input");
file_put_contents('php://stderr', print_r($datos, TRUE)); // Esto mostrará los datos recibidos en los logs de errores de PHP

$data = json_decode($datos, true);
if ($data === null) {
    echo json_encode(["success" => false, "message" => "JSON inválido o vacío"]);
    exit();
}

if (isset($data['accion'])) {
    $accion = $data['accion'];  // Determinar la acción.
    $usuario = new Usuario();  // Instanciamos el modelo

    switch ($accion) {
        case 'crear':
            $id_usuario = $data['identificacion'];
            $nombre = $data['nombre'];
            $apellido = $data['apellido'];
            $username = $data['username'];
            $contrasena = $data['contrasena'];
            $rol = $data['tipoUsuario'];  // Este es el rol (profesor o estudiante)

            try {
                $resultado = $usuario->crearUsuario($id_usuario, $nombre, $apellido, $username, $contrasena, $rol);
                echo json_encode(["success" => $resultado]);
            } catch (Exception $e) {
                echo json_encode(["success" => false, "message" => $e->getMessage()]);
            }
            break;

        case 'modificar':
            $id_usuario = $data['id_usuario'];
            $nombre = $data['nombre'];
            $apellido = $data['apellido'];
            $username = $data['username'];
            $rol = $data['rol'];

            try {
                $resultado = $usuario->modificarUsuario($id_usuario, $nombre, $apellido, $username, $rol);
                echo json_encode(["success" => $resultado]);
            } catch (Exception $e) {
                echo json_encode(["success" => false, "message" => $e->getMessage()]);
            }
            break;

        case 'eliminar':
            $id_usuario = $data['id_usuario'];

            try {
                $resultado = $usuario->eliminarUsuario($id_usuario);
                echo json_encode(["success" => $resultado]);
            } catch (Exception $e) {
                echo json_encode(["success" => false, "message" => $e->getMessage()]);
            }

            break;

        default:
            echo json_encode(["success" => false, "message" => "Acción no válida"]);
            break;
    }
} else {
    echo json_encode(["success" => false, "message" => "No se recibieron datos"]);
    // Al final del controlador antes de la última línea
    // echo json_encode(["debug" => "Esta es la salida del controlador"]);

}