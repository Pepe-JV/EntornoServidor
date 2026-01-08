<?php
// EJERCICIO 9: Crea una función que calcule el máximo común divisor de dos números naturales

function calcularMCD($a, $b) {
    // Validar que ambos sean numéricos
    if (!is_numeric($a) || !is_numeric($b)) {
        echo "ERROR: Los valores introducidos no son números válidos\n";
        return null;
    }

    // Validar que sean números naturales (enteros positivos)
    if ($a <= 0 || $b <= 0 || floor($a) != $a || floor($b) != $b) {
        echo "ERROR: Los números deben ser naturales (enteros positivos)\n";
        return null;
    }

    // Convertir a enteros
    $a = (int)$a;
    $b = (int)$b;

    // Algoritmo de Euclides
    while ($b != 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }

    echo "El MCD es: $a\n";
    return $a;
}

// Pedir números al usuario
$num1 = readline("Introduce el primer número natural: ");
$num2 = readline("Introduce el segundo número natural: ");
calcularMCD($num1, $num2);

?>

