<?php
// EJERCICIO 3: Crea una función que dada una distancia en millas calcule su correspondiente en kilómetros
// Nota: 1 milla = 1.60934 kilómetros

function millasAKilometros($millas) {
    // Validar que el parámetro sea numérico
    if (!is_numeric($millas)) {
        echo "ERROR: El valor introducido no es un número válido\n";
        return null;
    }

    // Validar que sea un número positivo
    if ($millas < 0) {
        echo "ERROR: La distancia no puede ser negativa\n";
        return null;
    }

    // Constante de conversión
    $kilometros = $millas * 1.60934;

    echo "$millas millas equivalen a " . round($kilometros, 2) . " kilómetros\n";
    return $kilometros;
}

// Pedir millas al usuario
$entrada = readline("Introduce la distancia en millas: ");
millasAKilometros($entrada);

?>

