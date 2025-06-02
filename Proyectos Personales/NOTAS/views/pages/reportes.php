<?php
require_once './verificarSesion.php';
$rol = $_SESSION['usuario_rol'];

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
    <title>Reportes</title>
</head>

<body class="bg-gray-100 dark:bg-gray-900">
    <?php require_once '../../components/navbarDashboard.php'; ?>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6 p-4">
        <?php if ($rol === 'administrador'): ?>
        <!-- Card 1: Reporte Materias -->
        <div
            class="cursor-pointer bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm p-6 hover:shadow-md transition">
            <img src="../../assets/img/report.svg" alt="PDF Materias" class="h-9 w-9 mb-4">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Reporte de Materias</h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">Generar PDF con listado de materias.</p>
        </div>

        <!-- Card 2: Reporte Matrículas -->
        <div
            class="cursor-pointer bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm p-6 hover:shadow-md transition">
            <img src="../../assets/img/report.svg" alt="PDF Matrículas" class="h-9 w-9 mb-4">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Reporte de Matrículas</h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">Generar PDF con estudiantes matriculados.</p>
        </div>

        <!-- Card 3: Otro tipo (no clickeable por ahora) -->
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm p-6">
            <img src="../../assets/img/report.svg" alt="Otro Reporte" class="h-9 w-9 mb-4">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Otro Reporte</h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">Descripción del tercer reporte.</p>
        </div>
        <?php elseif ($rol === 'profesor'): ?>
        <!-- Card 3: Otro tipo (no clickeable por ahora) -->
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm p-6">
            <img src="../../assets/img/report.svg" alt="Otro Reporte" class="h-9 w-9 mb-4">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Otro Reporte</h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">Descripción del tercer reporte.</p>
        </div>
        <?php elseif ($rol === 'estudiante'): ?>
        <!-- Card 3: Otro tipo (no clickeable por ahora) -->
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm p-6">
            <img src="../../assets/img/report.svg" alt="Otro Reporte" class="h-9 w-9 mb-4">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Otro Reporte</h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">Descripción del tercer reporte.</p>
        </div>
        <?php endif ?>
    </div>



</body>

</html>