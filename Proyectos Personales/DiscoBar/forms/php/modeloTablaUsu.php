<?php

$usuarios = array(
    array(
        "nombre" => "Juan Perez",
        "usuario" => "jperez",
        "correo" => "juan.perez@example.com",
        "contrasena" => "password123",
        "cedula" => "123456789"
    ),
    array(
        "nombre" => "Maria Gomez",
        "usuario" => "mgomez",
        "correo" => "maria.gomez@example.com",
        "contrasena" => "mypassword",
        "cedula" => "987654321"
    ),
    array(
        "nombre" => "Carlos Sanchez",
        "usuario" => "csanchez",
        "correo" => "carlos.sanchez@example.com",
        "contrasena" => "password456",
        "cedula" => "123123123"
    ),
    array(
        "nombre" => "Ana Lopez",
        "usuario" => "alopez",
        "correo" => "ana.lopez@example.com",
        "contrasena" => "mypassword123",
        "cedula" => "321321321"
    ),
    array(
        "nombre" => "Luis Ramirez",
        "usuario" => "lramirez",
        "correo" => "luis.ramirez@example.com",
        "contrasena" => "securepass",
        "cedula" => "456456456"
    )
);

// Guardar los datos en un archivo JSON
$file_path = 'usuarios.json';
$final_data = json_encode($usuarios, JSON_PRETTY_PRINT);

if (file_put_contents($file_path, $final_data)) {
    echo 'Datos guardados correctamente';
} else {
    echo 'Error al guardar los datos';
}
?>