<?php
// EJERCICIO 15: Comparar arrays elemento a elemento
// Crear una función que reciba dos arrays de enteros y devuelva un array de booleanos
// Ejemplo: comparar([1, 2, 3], [1, 2, 4]) → [true, true, false]

function compararArrays($array1, $array2) {
    // Validar que ambos sean arrays
    if (!is_array($array1) || !is_array($array2)) {
        echo "ERROR: Los parámetros deben ser arrays\n";
        return null;
    }

    // Validar que no estén vacíos
    if (empty($array1) || empty($array2)) {
        echo "ERROR: Los arrays no pueden estar vacíos\n";
        return null;
    }

    // Validar que todos los elementos sean numéricos
    foreach ($array1 as $elemento) {
        if (!is_numeric($elemento)) {
            echo "ERROR: El primer array contiene elementos no numéricos\n";
            return null;
        }
    }

    foreach ($array2 as $elemento) {
        if (!is_numeric($elemento)) {
            echo "ERROR: El segundo array contiene elementos no numéricos\n";
            return null;
        }
    }

    // Determinar la longitud máxima
    $longitud = max(count($array1), count($array2));
    $resultado = [];

    // Comparar elemento a elemento
    for ($i = 0; $i < $longitud; $i++) {
        $valor1 = $array1[$i] ?? null;
        $valor2 = $array2[$i] ?? null;
        $resultado[] = ($valor1 === $valor2);
    }

    echo "Array 1: [" . implode(", ", $array1) . "]\n";
    echo "Array 2: [" . implode(", ", $array2) . "]\n";
    echo "Resultado: [" . implode(", ", array_map(fn($x) => $x ? 'true' : 'false', $resultado)) . "]\n";

    return $resultado;
}

// Pedir datos al usuario
$entrada1 = readline("Introduce los elementos del primer array separados por comas: ");
$entrada2 = readline("Introduce los elementos del segundo array separados por comas: ");

$array1 = array_map('trim', explode(',', $entrada1));
$array2 = array_map('trim', explode(',', $entrada2));

compararArrays($array1, $array2);

?>

