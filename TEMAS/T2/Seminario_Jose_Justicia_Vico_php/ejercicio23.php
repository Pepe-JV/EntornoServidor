<?php
// EJERCICIO 23: Número Armstrong
// Crea una función que determine si un número es Armstrong
// Nota: Un número Armstrong es igual a la suma de sus dígitos elevados a la potencia del número de dígitos
// Ejemplo: 153 es Armstrong porque 1³ + 5³ + 3³ = 1 + 125 + 27 = 153

function esArmstrong($numero) {
    // Validar que sea numérico
    if (!is_numeric($numero)) {
        echo "ERROR: El valor introducido no es un número válido\n";
        return null;
    }

    // Validar que sea un entero no negativo
    if ($numero < 0 || floor($numero) != $numero) {
        echo "ERROR: El número debe ser un entero no negativo\n";
        return null;
    }

    $numero = (int)$numero;

    // Convertir a string para obtener los dígitos
    $numeroStr = (string)$numero;
    $cantidadDigitos = strlen($numeroStr);

    // Calcular la suma de los dígitos elevados a la potencia
    $suma = 0;
    $detalle = [];

    for ($i = 0; $i < $cantidadDigitos; $i++) {
        $digito = (int)$numeroStr[$i];
        $potencia = pow($digito, $cantidadDigitos);
        $suma += $potencia;
        $detalle[] = "$digito^$cantidadDigitos";
    }

    // Comprobar si es Armstrong
    if ($suma == $numero) {
        echo "$numero es un número Armstrong\n";
        echo implode(" + ", $detalle) . " = $suma\n";
        return true;
    } else {
        echo "$numero no es un número Armstrong\n";
        echo implode(" + ", $detalle) . " = $suma (≠ $numero)\n";
        return false;
    }
}

// Pedir número al usuario
$entrada = readline("Introduce un número: ");
esArmstrong($entrada);

?>

