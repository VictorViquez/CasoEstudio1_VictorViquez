<?php
session_start();

$mensaje = $_SESSION['mensaje'] ?? null;
$tipoMsg = $_SESSION['tipo_mensaje'] ?? 'success';

unset($_SESSION['mensaje'], $_SESSION['tipo_mensaje']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nueva Solicitud | TechSolutions CR</title>

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

        <li class="nav-item">
          <a class="nav-link" href="index.php">Inicio</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="solicitud.php">Nueva Solicitud</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="ver.php">Ver Solicitudes</a>
        </li>

      </ul>
    </div>

  </div>
</nav>

<!-- HEADER -->
<header class="bg-light py-4 border-bottom">
  <div class="container">
    <h1 class="h3 fw-bold mb-1">Nueva Solicitud de Soporte</h1>
    <p class="text-muted mb-0">
      Complete el formulario para registrar una incidencia
    </p>
  </div>
</header>

<!-- CONTENIDO -->
<main class="container my-4">

  <!-- MENSAJE SERVIDOR -->
  <?php if ($mensaje): ?>
    <div class="alert alert-<?= htmlspecialchars($tipoMsg) ?> alert-dismissible fade show" role="alert">
      <?= htmlspecialchars($mensaje) ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <!-- ALERT JS -->
  <div id="alertaForm" class="alert d-none" role="alert"></div>

  <section class="card shadow-sm">
    <div class="card-body">

      <form id="formSolicitud" action="procesar.php" method="POST" novalidate>

        <div class="row g-3">

          <div class="col-12 col-md-6">
            <label class="form-label" for="nombre">Nombre del colaborador</label>
            <input
              class="form-control"
              type="text"
              id="nombre"
              name="nombre"
              placeholder="Ej: Juan Pérez"
              required
            >
          </div>

          <div class="col-12 col-md-6">
            <label class="form-label" for="departamento">Departamento</label>
            <select class="form-select" id="departamento" name="departamento" required>
              <option value="">-- Seleccione --</option>
              <option value="TI">TI</option>
              <option value="RRHH">RRHH</option>
              <option value="Contabilidad">Contabilidad</option>
              <option value="Operaciones">Operaciones</option>
              <option value="Ventas">Ventas</option>
            </select>
          </div>

          <div class="col-12 col-md-6">
            <label class="form-label">Tipo de problema</label>

            <div class="d-flex gap-3 flex-wrap">

              <div class="form-check">
                <input class="form-check-input" type="radio" name="tipo_problema" id="hardware" value="Hardware" required>
                <label class="form-check-label" for="hardware">Hardware</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" name="tipo_problema" id="software" value="Software">
                <label class="form-check-label" for="software">Software</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" name="tipo_problema" id="red" value="Red">
                <label class="form-check-label" for="red">Red</label>
              </div>

            </div>
          </div>

          <div class="col-12 col-md-6">
            <label class="form-label" for="prioridad">Prioridad</label>
            <select class="form-select" id="prioridad" name="prioridad" required>
              <option value="">-- Seleccione --</option>
              <option value="Alta">Alta</option>
              <option value="Media">Media</option>
              <option value="Baja">Baja</option>
            </select>
          </div>

          <div class="col-12">
            <label class="form-label" for="descripcion">Descripción del problema</label>
            <textarea
              class="form-control"
              id="descripcion"
              name="descripcion"
              rows="4"
              placeholder="Mínimo 20 caracteres..."
              required
            ></textarea>
            <div class="form-text">Mínimo 20 caracteres.</div>
          </div>

          <div class="col-12 d-flex gap-2">

            <button class="btn btn-primary" type="submit">
              <i class="bi bi-send"></i> Enviar Solicitud
            </button>

            <a class="btn btn-outline-secondary" href="index.php">
              Cancelar
            </a>

          </div>

        </div>

      </form>

    </div>
  </section>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="./public/js/validaciones.js"></script>

</body>
</html>