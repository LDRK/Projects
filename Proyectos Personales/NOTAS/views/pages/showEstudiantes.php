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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Estudiantes</title>
</head>

<body>
    <?php require_once '../../components/navbarDashboard.php';?>


    <div class="container">
        <h1 class="text-center mt-5">Listado de Estudiantes</h1>
        <div class="row g-0">
            <div class="col-md-9">

                <!-- Tabla para mostrar los usuarios -->
                <table class="table table-striped table-hover mt-2 tablaRegistros" id="table-usu" name="table-usu">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>
            <div class="col-md-3">
                <div class="reporte d-flex justify-content-end">
                    <button type="button" class="btn" id="generarPdf">
                        <img src="../../assets/img/report.png" alt="reporte-pdf" class="icon-report">
                        Generar Reporte
                    </button>
                </div>


            </div>
        </div>
        <script src="../../assets/js/profesor.js"></script>
</body>

</html>