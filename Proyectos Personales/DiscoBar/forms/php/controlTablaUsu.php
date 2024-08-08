<?php
require_once ('modeloTablaUsu.php');

if (isset($_POST['iIngresar'])) {
        // Captura los datos del formulario
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
    $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';
    
    // Leer el contenido del archivo JSON
    $file_path = 'usuarios.json';
    if (file_exists($file_path)) {
        $current_data = file_get_contents($file_path);
        $array_data = json_decode($current_data, true);
    
        // Buscar el usuario en el array de datos
        $usuario_encontrado = false;
        foreach ($array_data as $persona) {
            if ($persona['usuario'] == $usuario && $persona['contrasena'] == $contrasena) {
                $usuario_encontrado = true;
                break;
            }
        }
    
        // Verificar si el usuario fue encontrado
        if ($usuario_encontrado) {
            // Redirigir a otra página si las credenciales son correctas
            header('Location: tablaUsu.php');
            exit();
        } else {
            echo 'Usuario o contraseña incorrectos';
        }
    } else {
        echo 'No se encontraron datos de usuarios';
    }
}
    ?>