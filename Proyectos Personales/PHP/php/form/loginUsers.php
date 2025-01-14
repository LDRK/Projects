<?php
require_once('../../php/conexion/conexion.php');

// Inicia sesión para manejar variables de sesión
session_start();

if (isset($_POST['ilogin'])) {
    $user = $_POST['usernameLogin'];
    $passwd = $_POST['passwordLogin'];

    // Preparo la consulta SQL con sentencias preparadas para los ataques
    $stmt = $conexion->prepare("SELECT id_usuario, contrasena FROM usuario WHERE username = ?");
    
    // Asigno los valores de las variables a la consulta
    $stmt->bind_param("s", $user);
    
    // Ejecuto la consulta
    $stmt->execute();

    // Enlazo las variables donde están almacenadas la contraseña encriptada y el ID del usuario
    $stmt->bind_result($user_id, $hashed_password);

    // Obtengo el resultado
    if ($stmt->fetch()) {
        // Compruebo si la contraseña es correcta
        if (password_verify($passwd, $hashed_password)) {
            // Regenera el ID de sesión para prevenir fijación de sesión
            session_regenerate_id(true);
            session_unset();
            
            // Guarda el nombre de usuario y el ID del usuario en la sesión
            $_SESSION['username'] = $user;
            $_SESSION['id_usuario'] = $user_id;

            // Cierra la primera consulta
            $stmt->close();

            // Redirecciono al dashboard
            header("Location: ../../layout/pages/dashboard.php");
            exit();
        } else {
            // Si la contraseña es incorrecta, redirecciono al login con un mensaje de error
            header("Location: ../../layout/pages/login.php?status=Usuario o contraseña incorrecta");
            exit();
        }
    } else {
        // Si no se encuentra el usuario, redirecciono al login con un mensaje de error
        header("Location: ../../layout/pages/login.php?status=Usuario o contraseña incorrecta");
        exit();
    }

    // Cierro la sentencia y la conexión
    $stmt->close();
    mysqli_close($conexion);
}
?>