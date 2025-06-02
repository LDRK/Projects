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
    <title>registro Notas</title>
</head>

<body class="bg-gray-100 dark:bg-gray-900">
    <?php require_once '../../components/navbarDashboard.php'; ?>

    <div class="max-w-3xl mx-auto py-10 px-6">
        <h1 class="text-2xl font-bold text-center text-gray-800 dark:text-white mb-8">Registro de Notas</h1>

        <form class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md space-y-6" id="form-notas" method="post">

            <div>
                <label for="estudiantes"
                    class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-200">Estudiantes</label>
                <select id="estudiantes" name="estudiantes"
                    class="w-full p-2 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring focus:border-blue-500"
                    required>
                    <option value="">Seleccione un estudiante</option>
                </select>
            </div>

            <div>
                <label for="materias"
                    class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-200">Materia</label>
                <select id="materias" name="materias"
                    class="w-full p-2 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring focus:border-blue-500"
                    required>
                    <option value="">Seleccione una materia</option>
                </select>
            </div>

            <div>
                <label for="periodos"
                    class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-200">Periodo</label>
                <select id="periodos" name="periodos"
                    class="w-full p-2 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring focus:border-blue-500"
                    required>
                    <option value="">Seleccione el periodo</option>
                </select>
            </div>

            <div>
                <label for="notas" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-200">Notas</label>
                <input type="number" id="notas" name="notas" placeholder="Ingrese su nota" min="1" max="10" step="0.1"
                    class="w-full p-2 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring focus:border-blue-500"
                    required>
            </div>

            <div class="flex gap-4">
                <button type="button" id="btnAgregarNota"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow-md transition duration-200">
                    Agregar Nota
                </button>
                <button type="button" id="btnRegistrarNotas"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow-md transition duration-200">
                    Registrar
                </button>
            </div>

            <div id="verNotas" class="mt-4 space-y-2 text-gray-800 dark:text-white">
                <!-- Aquí se mostrarán las notas -->
            </div>
        </form>
    </div>



    <script src="../../assets/js/registroNotas.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>