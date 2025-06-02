<?php
require_once './verificarSesion.php';
// $rol = $_SESSION['usuario_rol'];

// Prevenir el almacenamiento en caché
header("Cache-Control: no-cache, no-store, must-revalidate"); // Forzar al navegador a no usar caché
header("Pragma: no-cache"); // Compatibilidad con navegadores antiguos
header("Expires: 0"); // Asegurarse de que no se almacene en caché
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../assets/img/logo-principal.svg" />
    <link rel="stylesheet" href="../../assets/css/output.css">
    <title>Dashboard</title>
</head>


<body class="bg-gray-100 dark:bg-gray-900">
    <!-- Navbar dashboard -->
    <?php require_once '../../components/navbarDashboard.php'; ?>


</body>

</html>