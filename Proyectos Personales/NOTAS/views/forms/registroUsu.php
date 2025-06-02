<?php
require_once '../pages/verificarSesion.php';

// Prevenir el almacenamiento en caché
header("Cache-Control: no-cache, no-store, must-revalidate"); // Forzar al navegador a no usar caché
header("Pragma: no-cache"); // Compatibilidad con navegadores antiguos
header("Expires: 0"); // Asegurarse de que no se almacene en caché
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../assets/img/logo-principal.svg" />
    <link rel="stylesheet" href="../../assets/css/output.css">
    <title>Credenciales</title>
</head>

<body class="bg-gray-100 dark:bg-gray-900">
    <?php require_once '../../components/navbarDashboard.php'; ?>

    <!-- fomulario boostrap para registrar usuario. -->
    <div class="max-w-3xl mx-auto py-10 px-6">
        <h1 class="text-2xl font-bold text-center text-gray-800 dark:text-white mb-8">Registro de Usuario</h1>
        <form class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md space-y-6" id="form-registroUsu" method="post">
            <div>
                <label for="identificacion"
                    class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-200">Identificacion</label>
                <input type="number" minlength="8" maxlength="10"
                    class="w-full p-2 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring focus:border-blue-500"
                    id="identificacion" placeholder="Ingrese su N° de documento" required>
            </div>
            <div>
                <label for="nombre"
                    class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-200">Nombre</label>
                <input type="text"
                    class="w-full p-2 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring focus:border-blue-500"
                    id="nombre" placeholder="Ingrese su nombre" required>
            </div>
            <div>
                <label for="apellido"
                    class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-200">Apellido</label>
                <input type="text"
                    class="w-full p-2 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring focus:border-blue-500"
                    id="apellido" placeholder="Ingrese su apellido" required>
            </div>
            <div>
                <label for="apellido"
                    class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-200">Usuario</label>
                <input type="text"
                    class="w-full p-2 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring focus:border-blue-500"
                    id="username" placeholder="Ingrese el Usuario" required>
            </div>

            <div>
                <label for="password"
                    class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-200">Contraseña</label>
                <input type="password"
                    class="w-full p-2 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring focus:border-blue-500"
                    id="password" placeholder="Ingrese una contraseña" required>
            </div>
            <div class="flex items-center mb-4">
                <input id="profesor" type="checkbox" value=""
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="profesor" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Profesor</label>
            </div>
            <div class="flex items-center">
                <input id="estudiante" type="checkbox" value="" checked
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="estudiante"
                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Estudiante</label>
            </div>



            <div class="mt-2 text-center">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow-md transition duration-200  "
                    id="btn-crearUsu" value="crear">Crear</button>
            </div>
        </form>

    </div>
    <script src="../../assets/js/scriptDOM.js"></script>
    <script src="../../assets/js/registroUsers.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>