<?php
// EJERCICIO 16: Producto de elementos de un array
// Crea una función que calcule el producto de todos los elementos en un array de números
// Ejemplo: producto([2, 3, 4]) → 24

function productoArray($array) {
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

    // Calcular el producto
    $producto = 1;
    foreach ($array as $numero) {
        $producto *= $numero;
    }

    echo "Array: [" . implode(", ", $array) . "]\n";
    echo "Producto: $producto\n";
    return $producto;
}

// Pedir números al usuario
$entrada = readline("Introduce los números separados por comas: ");
$numeros = array_map('trim', explode(',', $entrada));

productoArray($numeros);

?>

