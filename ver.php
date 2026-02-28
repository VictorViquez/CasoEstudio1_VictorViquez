<?php
session_start();

$usuario = $_SESSION['usuario'] ?? null;
$solicitudes = $_SESSION['solicitudes'] ?? [];

$mensaje = $_SESSION['mensaje'] ?? null;
$tipoMsg = $_SESSION['tipo_mensaje'] ?? 'success';

unset($_SESSION['mensaje'], $_SESSION['tipo_mensaje']);

// Control de acceso básico
if (!$usuario && empty($solicitudes)) {
    $_SESSION['mensaje'] = "No hay sesión activa o no existen solicitudes. Registre una nueva solicitud.";
    $_SESSION['tipo_mensaje'] = "warning";
    header("Location: solicitud.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ver Solicitudes | TechSolutions CR</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./public/css/styles.css">
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <i class="bi bi-tools"></i> TechSolutions CR
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
        <li class="nav-item"><a class="nav-link" href="solicitud.php">Nueva Solicitud</a></li>
        <li class="nav-item"><a class="nav-link active" href="ver.php">Ver Solicitudes</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- HEADER -->
<header class="bg-light py-4 border-bottom">
  <div class="container">
    <h1 class="h3 fw-bold mb-1">Solicitudes Registradas</h1>
    <p class="text-muted mb-0">Listado temporal (guardado en sesión)</p>
  </div>
</header>

<!-- CONTENIDO -->
<main class="container my-4">

  <!-- MENSAJE -->
  <?php if ($mensaje): ?>
    <div class="alert alert-<?= htmlspecialchars($tipoMsg) ?> alert-dismissible fade show" role="alert">
      <?= htmlspecialchars($mensaje) ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <!-- USUARIO -->
  <?php if ($usuario): ?>
    <div class="mb-3">
      <span class="badge text-bg-secondary">
        Usuario en sesión: <?= htmlspecialchars($usuario) ?>
      </span>
    </div>
  <?php endif; ?>

  <!-- SI NO HAY SOLICITUDES -->
  <?php if (empty($solicitudes)): ?>

    <div class="alert alert-info">
      No hay solicitudes registradas todavía.
      <a href="solicitud.php" class="alert-link">Crear una nueva</a>.
    </div>

  <?php else: ?>

    <div class="card shadow-sm">
      <div class="card-body">

        <div class="table-responsive">
          <table class="table table-striped table-bordered align-middle">

            <thead class="table-dark">
              <tr>
                <th>#</th>
                <th>Fecha</th>
                <th>Nombre</th>
                <th>Departamento</th>
                <th>Tipo</th>
                <th>Prioridad</th>
                <th>Descripción</th>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($solicitudes as $i => $s): ?>

                <?php
                  $prio = $s['prioridad'] ?? '';
                  $badgeClass = ($prio === 'Alta') ? 'text-bg-danger' :
                                (($prio === 'Media') ? 'text-bg-warning' : 'text-bg-success');
                ?>

                <tr>
                  <td><?= $i + 1 ?></td>
                  <td><?= htmlspecialchars($s['fecha'] ?? '') ?></td>
                  <td><?= htmlspecialchars($s['nombre'] ?? '') ?></td>
                  <td><?= htmlspecialchars($s['departamento'] ?? '') ?></td>
                  <td><?= htmlspecialchars($s['tipo_problema'] ?? '') ?></td>

                  <td>
                    <span class="badge <?= $badgeClass ?>">
                      <?= htmlspecialchars($prio) ?>
                    </span>
                  </td>

                  <td><?= htmlspecialchars($s['descripcion'] ?? '') ?></td>
                </tr>

              <?php endforeach; ?>
            </tbody>

          </table>
        </div>

        <!-- BOTONES -->
        <div class="d-flex flex-wrap gap-2">

          <a href="solicitud.php" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Nueva Solicitud
          </a>

          <form action="limpiar.php" method="POST"
                onsubmit="return confirm('¿Seguro que desea eliminar todas las solicitudes?');">

            <button type="submit" class="btn btn-outline-danger">
              <i class="bi bi-trash"></i> Limpiar Solicitudes
            </button>

          </form>

        </div>

      </div>
    </div>

  <?php endif; ?>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>