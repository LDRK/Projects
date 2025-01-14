<?php

require_once('../../php/conexion/conexion.php');
require_once('../form/validaciones/valiRegistroUsers.php');


// Inicia sesión para usar variables de sesión
session_start();


if(isset($_POST['iregistrar'])){

    $nombre = $_POST['nombre'];
    $username = $_POST['usuario'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['password'];

    // Llamar a la función de validación
    $errores = validarDatos($nombre, $username, $correo, $contrasena, $conexion);
   
    if(empty($errores)){
       
    
        //Encriptar la contraseña antes de guardar en la base de datos
        $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);
        
        $stmt = $conexion -> prepare("INSERT INTO usuario( nombre,username,correo,contrasena ) VALUES (?,?,?,?)");

        //Asigno los valores de las variables a la consulta
        $stmt -> bind_param("ssss", $nombre,$username,$correo,$hashed_password);

        //Ejecutamos la consulta
        if($stmt -> execute()){
            session_unset();
            header("Location: ../../layout/pages/login.php?status=Registro exitoso");
            
          
        }else{
            header("Location: ../../layout/pages/singup.php?status=Error al registrar");
           
        }
        //Cierro consulta
        $stmt -> close();
        
        //Cierro la conexión con la base de datos
        mysqli_close($conexion);
        exit();
    }


    // Guardar los errores y los valores en sesión para mostrar en el formulario
    $_SESSION['errores'] = $errores;
    $_SESSION['valores'] = [
        'nombre' => $nombre,
        'usuario' => $username,
        'correo' => $correo,
        'contrasena' => $contrasena,
    ];

    header("Location: ../../layout/pages/singup.php");
    exit();
}






?>