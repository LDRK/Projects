<?php
require_once '../models/modelRegistroUsu.php'; // Incluimos el modelo


// Revisar Errores de CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Aseguramos que la salida sea JSON
header('Content-Type: application/json');



// Recibir los datos de la solicitud en formato JSON
$datos = file_get_contents("php://input");
file_put_contents('php://stderr', print_r($datos, TRUE));
$data = json_decode($datos, true);
if ($data === null) {
    echo json_encode(["success" => false, "message" => "JSON inválido o vacío"]);
    exit();
}
    // Verificar si se ha enviado la acción
    if (isset($data['accion'])) {
        $accion = $data['accion'];  // Determinar la acción.
        $usuario = new Usuario();  // Instanciamos el modelo

        switch ($accion) {
        
            case 'ingresar':
                $username = $data['username'];
                $contrasena = $data['contrasena'];

                // Llamar al método en el modelo para verificar credenciales
                $resultado = $usuario->login($username, $contrasena);

                if ($resultado) {
                    // Login exitoso
                    // Iniciar la sesión
                    session_start();
                    $_SESSION['usuario_id'] = $resultado['id_usuario']; // ID del usuario
                    $_SESSION['usuario_rol'] = $resultado['rol']; // Guardar el rol del usuario
                    echo json_encode(["success" => true, "message" => "Login exitoso"]);

                } else {
                    // Login fallido
                    echo json_encode(["success" => false, "message" => "Credenciales incorrectas"]);
                }
                break;

            default:
                echo json_encode(["success" => false, "message" => "Acción no válida"]);
                break;
        }
} else {
    echo json_encode(["success" => false, "message" => "No se recibieron datos"]);
}

?>