<?php
// EJERCICIO 18: Número primo
// Crea una función que determine si un número es primo
// Nota: Un número primo es un número natural mayor que 1 que solo es divisible por 1 y por sí mismo

function esPrimo($numero) {
    // Validar que sea numérico
    if (!is_numeric($numero)) {
        echo "ERROR: El valor introducido no es un número válido\n";
        return null;
    }

    // Validar que sea un entero positivo mayor que 1
    if ($numero <= 1 || floor($numero) != $numero) {
        echo "ERROR: El número debe ser un entero mayor que 1\n";
        return false;
    }

    $numero = (int)$numero;

    // 2 es primo
    if ($numero == 2) {
        echo "$numero es primo\n";
        return true;
    }

    // Los números pares no son primos (excepto 2)
    if ($numero % 2 == 0) {
        echo "$numero no es primo\n";
        return false;
    }

    // Comprobar divisibilidad hasta la raíz cuadrada del número
    $limite = sqrt($numero);
    for ($i = 3; $i <= $limite; $i += 2) {
        if ($numero % $i == 0) {
            echo "$numero no es primo\n";
            return false;
        }
    }

    echo "$numero es primo\n";
    return true;
}

// Pedir número al usuario
$entrada = readline("Introduce un número: ");
esPrimo($entrada);

?>

