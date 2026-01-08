<?php
// EJERCICIO 12: Crea una función que determine si un número dado es capicúa
// Nota: Un número capicúa se lee igual de izquierda a derecha que de derecha a izquierda

function esCapicua($numero) {
    // Validar que sea numérico
    if (!is_numeric($numero)) {
        echo "ERROR: El valor introducido no es un número válido\n";
        return null;
    }

    // Validar que sea un entero
    if (floor($numero) != $numero) {
        echo "ERROR: El número debe ser un entero\n";
        return null;
    }

    // Convertir a string y comparar con su inverso
    $numeroStr = (string)abs($numero); // Usar valor absoluto para ignorar el signo
    $numeroInvertido = strrev($numeroStr);

    if ($numeroStr === $numeroInvertido) {
        echo "$numero es un número capicúa\n";
        return true;
    } else {
        echo "$numero no es un número capicúa\n";
        return false;
    }
}

// Pedir número al usuario
$entrada = readline("Introduce un número: ");
esCapicua($entrada);

?>

