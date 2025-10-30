<?php
// EJERCICIO 17: Filtrar números pares
// Crea una función que dada un array de números, devuelva un nuevo array con solo los números pares
// Ejemplo: filtrarPares([1, 2, 3, 4, 5, 6]) → [2, 4, 6]

function filtrarPares($array) {
    // Validar que sea un array
    if (!is_array($array)) {
        echo "ERROR: El parámetro debe ser un array\n";
        return null;
    }

    // Validar que no esté vacío
    if (empty($array) || count($array) == 0) {
        echo "ERROR: El array está vacío\n";
        return null;
    }

    // Validar que todos los elementos sean numéricos
    foreach ($array as $elemento) {
        if (!is_numeric($elemento)) {
            echo "ERROR: El array contiene elementos no numéricos\n";
            return null;
        }
    }

    // Filtrar números pares
    $pares = [];
    foreach ($array as $numero) {
        if ($numero % 2 == 0) {
            $pares[] = $numero;
        }
    }

    echo "Array original: [" . implode(", ", $array) . "]\n";
    echo "Números pares: [" . implode(", ", $pares) . "]\n";
    return $pares;
}

// Pedir números al usuario
$entrada = readline("Introduce los números separados por comas: ");
$numeros = array_map('trim', explode(',', $entrada));

filtrarPares($numeros);

?>

