<?php
require_once 'bd-connection.php';
$mensaje = "";

if (isset($_POST['iguardar'])) {
    $nom = $_POST['Nombre'];
    $usu = $_POST['Usuario'];
    $correo = $_POST['Correo'];
    $psw = $_POST['Contraseña'];
    $cedula = $_POST['Cedula'];

    if (mysqli_connect_errno()) {
        $mensaje = "Error conectando a la base de datos: " . mysqli_connect_error();
    } else {
        $sql = "INSERT INTO usuario (nombre, correo, contrasena, cedula) VALUES ('$nom', '$correo', '$psw', '$cedula')";
          $resInsert = mysqli_query($conexion,$sql);

        if (!$resInsert) {
            $mensaje = "Error consultando la base de datos: " . mysqli_error($conexion);
        } else {
            $mensaje = "Se guardó exitosamente";
        }
    }
    header("Location: ../header/singup.html?mensa=" . urlencode($mensaje));
    exit();
}
?>