<?php
// Configuración de páginas válidas
$valid_pages = ['home', 'about', 'skills', 'portfolio', 'contact'];

// Obtener la página solicitada y validarla
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Validar que la página exista
if (!in_array($page, $valid_pages)) {
    $page = '404';
}

// Configurar títulos dinámicos para cada página
$page_titles = [
    'home' => 'Inicio - Portfolio pepe Desarrollador',
    'about' => 'Sobre Mí - Portfolio pepe Desarrollador',
    'skills' => 'Habilidades - Portfolio pepe Desarrollador',
    'portfolio' => 'Proyectos - Portfolio pepe Desarrollador',
    'contact' => 'Contacto - Portfolio pepe Desarrollador',
    '404' => 'Página no encontrada - Portfolio pepe Desarrollador'
];

$title = $page_titles[$page];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="bg-light">
    <!-- Cabecera -->
    <?php include 'includes/header.php'; ?>

    <!-- Contenido principal -->
    <main class="flex-grow-1">
        <?php
        // Incluir la página correspondiente
        $page_file = "pages/{$page}.php";

        if (file_exists($page_file)) {
            include $page_file;
        } else {
            // Si por alguna razón el archivo no existe, mostrar 404
            include 'pages/404.php';
        }
        ?>
    </main>

    <!-- Pie de página -->
    <?php include 'includes/footer.php'; ?>

    <!-- Bootstrap 5 JavaScript Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript personalizado -->
    <script src="js/main.js"></script>
</body>
</html>
