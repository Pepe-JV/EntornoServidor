<?php
// EJERCICIO 22: Número perfecto
// Crea una función que determine si un número es perfecto
// Nota: Un número perfecto es aquel cuya suma de sus divisores propios es igual al número
// Ejemplo: 6 es perfecto porque sus divisores son 1, 2, 3 y 1 + 2 + 3 = 6

function esPerfecto($numero) {
    // Validar que sea numérico
    if (!is_numeric($numero)) {
        echo "ERROR: El valor introducido no es un número válido\n";
        return null;
    }

    // Validar que sea un entero positivo
    if ($numero <= 0 || floor($numero) != $numero) {
        echo "ERROR: El número debe ser un entero positivo\n";
        return null;
    }

    $numero = (int)$numero;

    // Encontrar los divisores propios (excluyendo el número mismo)
    $sumaDivisores = 0;
    $divisores = [];

    for ($i = 1; $i < $numero; $i++) {
        if ($numero % $i == 0) {
            $divisores[] = $i;
            $sumaDivisores += $i;
        }
    }

    // Comprobar si es perfecto
    if ($sumaDivisores == $numero) {
        echo "$numero es un número perfecto\n";
        echo "Divisores: [" . implode(", ", $divisores) . "]\n";
        echo "Suma: $sumaDivisores\n";
        return true;
    } else {
        echo "$numero no es un número perfecto\n";
        echo "Divisores: [" . implode(", ", $divisores) . "]\n";
        echo "Suma: $sumaDivisores (≠ $numero)\n";
        return false;
    }
}

// Pedir número al usuario
$entrada = readline("Introduce un número: ");
esPerfecto($entrada);

?>

