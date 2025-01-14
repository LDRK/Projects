<?php

function validarDatos($nombre, $username, $correo, $contrasena, $conexion) {
    $errores = [];

    // Saneamiento, espacios en blanco.
    $nombre = trim($nombre);
    $username = trim($username);
    $correo = trim($correo);
    $contrasena = trim($contrasena);

    // Validaciones de los campos
    if (empty($nombre)) {
        $errores['nombre'] = "El nombre es obligatorio.";
    }
    //Valido el usuario.
    if (empty($username)) {
        $errores['username'] = "El usuario es obligatorio.";
    } elseif (strlen($username) < 5) {
        $errores['username'] = "El usuario debe tener al menos 5 caracteres.";
    } elseif ($conexion->query("SELECT id_usuario FROM usuario WHERE username = '$username'")->num_rows > 0) { //Hago un Select para verificar si el usuario existe en la BD.
        $errores['username'] = "El nombre de usuario ya está en uso.";
    }
    
    //Valido el correo.
    if (empty($correo)) {
        $errores['correo'] = "El correo es obligatorio.";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores['correo'] = "El correo no es válido.";
    } elseif ($conexion->query("SELECT id_usuario FROM usuario WHERE correo = '$correo'")->num_rows > 0) { //Valido con un Select si el correo existe en la BD.
        $errores['correo'] = "El correo ya está en uso.";
    }
    
    //Valido la contraseña.
    if (empty($contrasena)) {
        $errores['contrasena'] = "La contraseña es obligatoria.";
    } elseif (strlen($contrasena) < 8) { //Establezco que la contraseña tenga los caracteres que establezca.
        $errores['contrasena'] = "La contraseña debe tener al menos 8 caracteres.";
    } elseif (!preg_match('/[a-z]/', $contrasena) ||!preg_match('/[A-Z]/', $contrasena)) { //Aqui exijo al usuario incluir mayusculas, para fortalecer la contrseña.
        $errores['contrasena'] = "La contraseña debe contener al menos una letra mayúscula y una letra minúscula.";
    } elseif (!preg_match('/[0-9]/', $contrasena)) { //Aqui exijo al usuario incluir numeros, para fortalecer la contrseña.
        $errores['contrasena'] = "La contraseña debe contener al menos un número.";
    } elseif (!preg_match('/[^a-zA-Z0-9]/', $contrasena)) { //Aqui exijo al usuario incluir caracteres especiales, para fortalecer la contrseña.
        $errores['contrasena'] = "La contraseña debe contener al menos un carácter especial.";
    }
    
    return $errores;
}

//recuperar los errores y mostrarlos en los campos cuando se valide.
$nombre = NULL;
$username = NULL;
$correo = NULL;
$contrasena = NULL;
$nombreError = NULL;
$userNameError = NULL;
$correoError = NULL;
$contrasenaError = NULL;

if(isset($_SESSION['valores'])){
    $nombre = $_SESSION['valores']['nombre'];
    $username = $_SESSION['valores']['usuario'];
    $correo = $_SESSION['valores']['correo'];
    $contrasena = $_SESSION['valores']['contrasena'];
    
    
}

if(isset($_SESSION['errores'])){
    $nombreError = isset($_SESSION['errores']['nombre']) ? $_SESSION['errores']['nombre'] : NULL;
    $userNameError = isset($_SESSION['errores']['username'])? $_SESSION['errores']['username'] : NULL;
    $correoError = isset($_SESSION['errores']['correo'])? $_SESSION['errores']['correo'] : NULL;
    $contrasenaError = isset($_SESSION['errores']['contrasena'])? $_SESSION['errores']['contrasena'] : NULL;    
}

?>