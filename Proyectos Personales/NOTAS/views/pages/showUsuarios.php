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
    <title>Usuarios</title>
</head>

<body class="bg-gray-100 dark:bg-gray-900">
    <?php require_once '../../components/navbarDashboard.php'; ?>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6">
        <!-- Tabla de usuarios -->
        <div class="md:col-span-2">
            <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Usuarios Registrados</h2>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
                        id="table-usu" name="table-usu">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">ID</th>
                                <th scope="col" class="px-6 py-3">Nombre</th>
                                <th scope="col" class="px-6 py-3">Apellido</th>
                                <th scope="col" class="px-6 py-3">Usuario</th>
                                <th scope="col" class="px-6 py-3">Rol</th>
                                <th scope="col" class="px-6 py-3">Acciones</th>
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
                <p class="text-xl font-semibold text-gray-900 dark:text-white">Reportes</p>
                <div class="space-y-4">
                    <button type="button" id="generarPdf"
                        class="w-full px-4 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-md shadow">
                        Generar Reporte General
                    </button>
                    <button type="button" id="generarPdfP"
                        class="w-full px-4 py-2 text-white bg-indigo-600 hover:bg-indigo-700 rounded-md shadow">
                        Reporte Profesores
                    </button>
                    <button type="button" id="generarPdfE"
                        class="w-full px-4 py-2 text-white bg-green-600 hover:bg-green-700 rounded-md shadow">
                        Reporte Estudiantes
                    </button>
                </div>
            </div>
        </div>
    </div>


    <?php require_once '../../components/modalEditUsu.php'; ?>

    <script src="../../assets/js/tablaUsu.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>