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
    <title>Registro Materias</title>
</head>

<body class="bg-gray-100 dark:bg-gray-900">
    <?php require_once '../../components/navbarDashboard.php'; ?>

    <div class="max-w-3xl mx-auto py-10 px-4">
        <div
            class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm p-6 md:p-8">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Registro de Matricula</h1>

            <div class="mb-6">
                <label for="numMaterias" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    ¿Cuántas matriculas quieres registrar?
                </label>
                <select id="numMatricula"
                    class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    aria-label="Número de Matriculas">
                    <option selected>Selecciona el número</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>

            <form id="matriculasForm" class="space-y-4">
                <!-- Los inputs dinámicos aparecerán aquí -->
            </form>

            <div class="mt-6">
                <button type="button" onclick="registrarMatricula()"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md transition">
                    Registrar Matricula
                </button>
            </div>
        </div>
    </div>



    <script src="../../assets/js/registroMatricula.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>