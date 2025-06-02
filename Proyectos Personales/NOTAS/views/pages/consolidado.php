<?php
require_once './verificarSesion.php';
// $rol = $_SESSION['usuario_rol'];

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
    <title>Estudiantes</title>
</head>

<body class="bg-gray-100 dark:bg-gray-900">
    <?php require_once '../../components/navbarDashboard.php'; ?>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6">
        <!-- Tabla de usuarios -->
        <div class="md:col-span-2">
            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Consolidado Estudiantes</h2>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table
                        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 tablaRegistros"
                        id="table-conso" name="table-usu">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">ID</th>
                                <th scope="col" class="px-6 py-3">Nombre</th>
                                <th scope="col" class="px-6 py-3">Apellido</th>
                                <th scope="col" class="px-6 py-3">Materia</th>
                                <th scope="col" class="px-6 py-3">Periodo 1</th>
                                <th scope="col" class="px-6 py-3">Periodo 2</th>
                                <th scope="col" class="px-6 py-3">Periodo 3</th>
                                <th scope="col" class="px-6 py-3">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí JS insertará las filas dinámicamente -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Panel de reportes -->
        <div>
            <div
                class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm p-6 space-y-6">
                <p class="text-xl font-semibold text-gray-900 dark:text-white">Consideraciones</p>
                <div class="space-y-4">
                    <div class="space-y-2">
                        <dl class="flex items-center justify-between gap-4">
                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Ganado</dt>
                            <dd class="text-base font-medium text-gray-900 dark:text-white">Mayor o Igual a 6</dd>
                        </dl>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="space-y-2">
                        <dl class="flex items-center justify-between gap-4">
                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Perdido</dt>
                            <dd class="text-base font-medium text-gray-900 dark:text-white">Menor a 6</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../assets/js/consolidado.js"></script>
</body>

</html>