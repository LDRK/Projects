<?php

require_once('../../php/conexion/conexion.php');

//Registro de usuarios
if (isset($_POST['iregistrar'])) {
    $nombre = $_POST['nombre'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $correo = $_POST['email'];
    $departamento = $_POST['departamento'];


    //Preparo la consulta
    $stmt = $conexion -> prepare("INSERT INTO persona( nombre,apellido_paterno,apellido_materno,correo,departamento ) VALUES (?,?,?,?,?)");

    //Ejecuto la consulta preparada
    $stmt -> bind_param("sssss", $nombre, $apellidoP, $apellidoM, $correo, $departamento);

    //Ejecuto la consulta
    $stmt -> execute();

    // Validamos y Redirecciono al dashboard
    if($stmt -> execute()){
        header("Location:../../layout/pages/dashboard.php?status=Registro exitoso");
    }else{
        header("Location: ../../layout/pages/dashboard.php?status=Error al registrar");
    }



    //Cierro la conexión
    $stmt -> close();
    mysqli_close($conexion);
}

//Fin Registro de usuarios

//Modificar Usuario

//Codigo para mostar el modal en modificar el usuario, poder enlazar el boton modificar en la tabla.
if (isset($_POST['btnBuscarR'])) {
    $action = $_POST['btnBuscarR'];
    if ($action == 'buscar') {
        $persona = $_POST['idPersona'];
        $sql = "SELECT * FROM persona WHERE id_persona = $persona";
        $result = $conexion->query($sql);
        $modificarP = $result->fetch_assoc();
        $mostarModalM = true;
    }
}
//Fin del Codigo para mostar el modal en modificar el usuario.

if (isset($_POST['iModificar'])) {
    $id = $_POST['idPersona'];
    $nombre = $_POST['nombre'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $email = $_POST['email'];
    $departamento = $_POST['departamento'];
    $foto = $_POST['foto'];

    // Preparo la consulta SQL usando sentencias preparadas
    $stmt = $conexion -> prepare("UPDATE persona SET nombre=?, apellido_paterno=?, apellido_materno=?, correo=?, departamento=?, foto=? WHERE id_persona=?");

    //Asigno los valores
    $stmt -> bind_param("ssssssi",$nombre,$apellidoP,$apellidoM,$email,$departamento,$fot,$id);
            
    // Ejecuto la consulta
    if ($stmt->execute()) {
        echo "<script>alert('Registro actualizado correctamente'); window.location.href='../../layout/pages/dashboard.php';</script>";
    } else {
        echo "<script>alert('Error al actualizar el registro'); window.location.href='../../layout/pages/dashboard.php';</script>";
    }
    //Cierro la conexión y sentencia
    $stmt -> close();
    mysqli_close($conexion);

    
}
//Fin Modificar Usuario


//Eliminar Usuario

if (isset($_POST['iEliminar'])) {
    $id = $_POST['idPersona'];
    
    //Preparamos la consulta.
    $stmt = $conexion -> prepare("DELETE FROM persona WHERE id_persona=?");
    
    // Asignamos los valore.
    $stmt -> bind_param("s",$id);
    
    // Ejecutamos la consulta.
    if ($stmt -> execute()) {
        echo "<script>alert('Registro eliminado correctamente'); window.location.href='../../layout/pages/dashboard.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar el registro'); window.location.href='../../layout/pages/dashboard.php';</script>";
    }

    // Cierro la conexión y la sentencia.
    $stmt -> close();
    mysqli_close($conexion);
}
//Fin Eliminar Usuario

?>