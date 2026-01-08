<?php
// EJERCICIO 11: Crea una función que determine si dos números son primos relativos
// Nota: Dos números son relativamente primos si su MCD es 1

function calcularMCD($a, $b) {
    // Algoritmo de Euclides
    while ($b != 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}

function sonPrimosRelativos($a, $b) {
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

    // Calcular el MCD
    $mcd = calcularMCD($a, $b);

    // Son primos relativos si el MCD es 1
    if ($mcd == 1) {
        echo "$a y $b son primos relativos (MCD = 1)\n";
        return true;
    } else {
        echo "$a y $b no son primos relativos (MCD = $mcd)\n";
        return false;
    }
}

// Pedir números al usuario
$num1 = readline("Introduce el primer número: ");
$num2 = readline("Introduce el segundo número: ");
sonPrimosRelativos($num1, $num2);

?>

