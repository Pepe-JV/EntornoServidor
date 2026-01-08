<?php
// EJERCICIO 14: Mosaico numérico
// Crea una función que dado un número n imprima el siguiente 'mosaico' (para n = 6):
// 1
// 22
// 333
// 4444
// 55555
// 666666

function mosaicoNumerico($n) {
    // Validar que sea numérico
    if (!is_numeric($n)) {
        echo "ERROR: El valor introducido no es un número válido\n";
        return null;
    }

    // Validar que sea un entero positivo
    if ($n <= 0 || floor($n) != $n) {
        echo "ERROR: El número debe ser un entero positivo\n";
        return null;
    }

    $n = (int)$n;

    // Generar el mosaico
    echo "Mosaico numérico para n = $n:\n";
    for ($i = 1; $i <= $n; $i++) {
        // Imprimir el número $i, $i veces
        echo str_repeat($i, $i) . "\n";
    }
}

// Pedir número al usuario
$entrada = readline("Introduce un número para el mosaico: ");
mosaicoNumerico($entrada);

?>

