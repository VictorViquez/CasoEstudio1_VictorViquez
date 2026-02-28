<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSolutions CR</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- CSS -->
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
                        <a class="nav-link active" href="index.php">Inicio</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="solicitud.php">Nueva Solicitud</a>
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
            <h1 class="fw-bold">Sistema de Soporte Interno</h1>
            <p class="text-muted mb-0">
                Registro de solicitudes técnicas de colaboradores
            </p>
        </div>
    </header>

    <!-- CONTENIDO -->
    <main class="container my-4">

        <div class="row g-4">

            <!-- CARD PRINCIPAL -->
            <div class="col-md-8">

                <section class="card shadow-sm">
                    <div class="card-body">

                        <h3 class="card-title">
                            Bienvenido al sistema
                        </h3>

                        <p>
                            Esta aplicación permite registrar solicitudes de soporte técnico
                            para los colaboradores de la empresa TechSolutions CR.
                        </p>

                        <a href="solicitud.php" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Nueva Solicitud
                        </a>

                    </div>
                </section>

            </div>

            <!-- SIDEBAR -->
            <div class="col-md-4">

                <aside class="card shadow-sm">
                    <div class="card-body">

                        <h5>Opciones</h5>

                        <div class="d-grid gap-2">

                            <a href="solicitud.php" class="btn btn-outline-primary">
                                Registrar Solicitud
                            </a>

                            <a href="ver.php" class="btn btn-outline-success">
                                Ver Solicitudes
                            </a>

                        </div>

                    </div>
                </aside>

            </div>

        </div>

    </main>

    <!-- FOOTER -->
    <footer class="bg-dark text-white text-center py-3 mt-4">
        SC-502 Ambiente Web Cliente/Servidor © 2026
    </footer>

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>