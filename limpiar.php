<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ver.php");
    exit();
}

// Borrar solo las solicitudes
unset($_SESSION['solicitudes']);

$_SESSION['mensaje'] = "Solicitudes eliminadas correctamente.";
$_SESSION['tipo_mensaje'] = "info";

header("Location: ver.php");
exit();