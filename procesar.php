<?php
session_start();

// 1) Verificar método POST (evita acceso indebido)
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    $_SESSION['mensaje'] = "Acceso no permitido. Debe registrar la solicitud desde el formulario.";
    $_SESSION['tipo_mensaje'] = "warning";
    header("Location: solicitud.php");
    exit;
}

// 2) Recibir datos (POST)
$nombre = trim($_POST['nombre'] ?? '');
$departamento = trim($_POST['departamento'] ?? '');
$tipoProblema = trim($_POST['tipo_problema'] ?? '');
$prioridad = trim($_POST['prioridad'] ?? '');
$descripcion = trim($_POST['descripcion'] ?? '');

// 3) Validaciones servidor (campos obligatorios)
if (
    $nombre === '' ||
    $departamento === '' ||
    $tipoProblema === '' ||
    $prioridad === '' ||
    $descripcion === ''
) {
    $_SESSION['mensaje'] = "Error: Todos los campos son obligatorios.";
    $_SESSION['tipo_mensaje'] = "danger";
    header("Location: solicitud.php");
    exit;
}

// 4) Validar longitud mínima (20 caracteres)
if (mb_strlen($descripcion) < 20) {
    $_SESSION['mensaje'] = "La descripción debe tener al menos 20 caracteres.";
    $_SESSION['tipo_mensaje'] = "warning";
    header("Location: solicitud.php");
    exit;
}

// 5) Validar opciones permitidas (evita datos adulterados por POST)
$deptPermitidos = ['TI', 'RRHH', 'Contabilidad', 'Operaciones', 'Ventas'];
$tipoPermitidos = ['Hardware', 'Software', 'Red'];
$prioPermitidas  = ['Alta', 'Media', 'Baja'];

if (!in_array($departamento, $deptPermitidos, true)) {
    $_SESSION['mensaje'] = "Departamento inválido.";
    $_SESSION['tipo_mensaje'] = "danger";
    header("Location: solicitud.php");
    exit;
}

if (!in_array($tipoProblema, $tipoPermitidos, true)) {
    $_SESSION['mensaje'] = "Tipo de problema inválido.";
    $_SESSION['tipo_mensaje'] = "danger";
    header("Location: solicitud.php");
    exit;
}

if (!in_array($prioridad, $prioPermitidas, true)) {
    $_SESSION['mensaje'] = "Prioridad inválida.";
    $_SESSION['tipo_mensaje'] = "danger";
    header("Location: solicitud.php");
    exit;
}

// 6) Crear arreglo asociativo (lo pide el caso) + date()
$solicitud = [
    "nombre" => $nombre,
    "departamento" => $departamento,
    "tipo_problema" => $tipoProblema,
    "prioridad" => $prioridad,
    "descripcion" => $descripcion,
    "fecha" => date("Y-m-d H:i:s"),
];

// 7) Guardar en sesión (arreglo de solicitudes)
if (!isset($_SESSION['solicitudes']) || !is_array($_SESSION['solicitudes'])) {
    $_SESSION['solicitudes'] = [];
}

$_SESSION['solicitudes'][] = $solicitud;

// 8) Crear sesión usuario (lo pide el caso)
$_SESSION['usuario'] = $nombre;

// 9) Mensaje éxito
$_SESSION['mensaje'] = "Solicitud registrada correctamente.";
$_SESSION['tipo_mensaje'] = "success";

// 10) Redirigir a ver.php (PRG pattern)
header("Location: ver.php");
exit;