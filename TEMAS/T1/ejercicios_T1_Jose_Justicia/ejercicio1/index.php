<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Primera Página PHP</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php
// Variables PHP
$nombre = "Jose Justicia Vico";
$edad = 22;
$ciudad = "Granada";

// Fecha y hora actual
$fechaActual = date("d/m/Y H:i:s");
?>

<div class="contenedor">
    <h1>Bienvenido a mi página personal</h1>
    <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
    <p><strong>Edad:</strong> <?php echo $edad; ?> años</p>
    <p><strong>Ciudad:</strong> <?php echo $ciudad; ?></p>
    <p class="fecha">Fecha y hora actual: <?php echo $fechaActual; ?></p>
</div>

</body>
</html>