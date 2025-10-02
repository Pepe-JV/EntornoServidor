<?php
// Sistema de navegación dinámica
$page = isset($_GET['page']) ? $_GET['page'] : 'experiencia';

// Páginas válidas
$valid_pages = ['experiencia', 'proyectos', 'sobre-mi', 'contacto'];

// Validar si la página existe
if (!in_array($page, $valid_pages)) {
    $page = 'experiencia'; // Página por defecto
}

// Función para determinar si la página está activa
function isActive($current_page, $target_page) {
    return $current_page === $target_page ? 'active' : '';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>José Justicia - Portfolio</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <!-- Navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent mb-4">
        <div class="container-fluid justify-content-center">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#experiencia">Experiencia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#proyectos">Proyectos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#sobre-mi">Sobre mí</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contacto">Contacto</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Secciones en una sola página -->
    <div id="experiencia" class="mb-5">
        <?php include 'pages/experienci.php'; ?>
    </div>
    <div id="proyectos" class="mb-5">
        <?php include 'pages/proyectos.php'; ?>
    </div>
    <div id="sobre-mi" class="mb-5">
        <?php include 'pages/sobre-mi.php'; ?>
    </div>
    <div id="contacto" class="mb-5">
        <?php include 'pages/contacto.php'; ?>
    </div>
</div>
<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>