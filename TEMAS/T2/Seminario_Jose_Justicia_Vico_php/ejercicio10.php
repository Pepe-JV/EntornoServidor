<?php
// EJERCICIO 10: Crea una función que calcule el término n-ésimo de la sucesión de Fibonacci
// Nota: La sucesión de Fibonacci: 0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144...

function fibonacci($n) {
    // Validar que sea numérico
    if (!is_numeric($n)) {
        echo "ERROR: El valor introducido no es un número válido\n";
        return null;
    }

    // Validar que sea un número entero no negativo
    if ($n < 0 || floor($n) != $n) {
        echo "ERROR: El número debe ser un entero no negativo\n";
        return null;
    }

    $n = (int)$n;

    // Casos base
    if ($n == 0) {
        echo "El término $n de Fibonacci es: 0\n";
        return 0;
    }
    if ($n == 1) {
        echo "El término $n de Fibonacci es: 1\n";
        return 1;
    }

    // Calcular Fibonacci iterativamente
    $fib1 = 0;
    $fib2 = 1;

    for ($i = 2; $i <= $n; $i++) {
        $fibActual = $fib1 + $fib2;
        $fib1 = $fib2;
        $fib2 = $fibActual;
    }

    echo "El término $n de Fibonacci es: $fib2\n";
    return $fib2;
}

// Pedir número al usuario
$entrada = readline("Introduce la posición n del término de Fibonacci: ");
fibonacci($entrada);

?>

