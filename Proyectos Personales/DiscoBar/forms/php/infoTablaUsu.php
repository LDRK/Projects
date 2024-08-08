<?php

if (isset($_POST['iguardar'])) {
    $nom = $_POST['Nombre'];
    $usu = $_POST['Usuario'];
    $correo = $_POST['Correo'];
    $psw = $_POST['Contraseña'];
    $cedula = $_POST['Cedula'];


    $persona = array(
        "Nombre" => $nom,
        "Usuario" => $usu,
        "Correo" => $correo,
        "Contraseña" => $psw,
        "Cedula" => $cedula
        );

    $_SESSION['personas'][] = $persona;

    header('Location: tablaUsu.php');
}else{
    echo "No se ha enviado el formulario";
}
?>