<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$title = 'Portfolio - Juan Desarrollador';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <!-- Tailwind CSS desde CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <!-- Cabecera -->
    <?php include 'includes/header.php'; ?>

    <!-- Contenido principal -->
    <main class="container mx-auto px-4 py-8">
        <?php
        switch ($page) {
            case 'home':
                include 'pages/home.php';
                break;
            case 'about':
                include 'pages/about.php';
                break;
            case 'skills':
                include 'pages/skills.php';
                break;
            case 'portfolio':
                include 'pages/portfolio.php';
                break;
            case 'contact':
                include 'pages/contact.php';
                break;
            default:
                include 'pages/404.php';
                break;
        }
        ?>
    </main>

    <!-- Pie de página -->
    <?php include 'includes/footer.php'; ?>

    <script src="js/main.js"></script>
</body>
</html>
