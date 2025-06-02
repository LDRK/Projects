<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Solo iniciar la sesión si no ha sido iniciada antes
}
// Prevenir caché
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Proxies

// Verifica si la sesión está activa
if (!isset($_SESSION['usuario_id'])) {
    // Si no hay sesión, redirige al login
    header("Location: ../../index.php");
    exit(); // Termina la ejecución
}
?>