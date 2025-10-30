<?php
// EJERCICIO 20: Factorial
// Crea una función que calcule el factorial de un número
// Nota: El factorial de n (n!) es el producto de todos los números enteros positivos desde 1 hasta n
// Ejemplo: 5! = 5 × 4 × 3 × 2 × 1 = 120

function factorial($n) {
    // Validar que sea numérico
    if (!is_numeric($n)) {
        echo "ERROR: El valor introducido no es un número válido\n";
        return null;
    }

    // Validar que sea un entero no negativo
    if ($n < 0 || floor($n) != $n) {
        echo "ERROR: El número debe ser un entero no negativo\n";
        return null;
    }

    $n = (int)$n;

    // Caso base: 0! = 1
    if ($n == 0) {
        echo "0! = 1\n";
        return 1;
    }

    // Calcular factorial
    $resultado = 1;
    for ($i = 1; $i <= $n; $i++) {
        $resultado *= $i;
    }

    echo "$n! = $resultado\n";
    return $resultado;
}

// Pedir número al usuario
$entrada = readline("Introduce un número: ");
factorial($entrada);

?>

