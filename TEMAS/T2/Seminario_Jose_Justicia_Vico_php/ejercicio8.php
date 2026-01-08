<?php
// EJERCICIO 8: Crea una función que sume los dígitos de un número
// Ejemplo: sumaDigitos(245) = 2 + 4 + 5 = 11

function sumaDigitos($numero) {
    // Validar que sea numérico
    if (!is_numeric($numero)) {
        echo "ERROR: El valor introducido no es un número válido\n";
        return null;
    }

    // Convertir a valor absoluto para manejar números negativos
    $numero = abs($numero);

    // Convertir a string para iterar sobre los dígitos
    $numeroStr = (string)$numero;
    $suma = 0;

    // Sumar cada dígito
    for ($i = 0; $i < strlen($numeroStr); $i++) {
        if ($numeroStr[$i] !== '.') { // Ignorar el punto decimal si existe
            $suma += (int)$numeroStr[$i];
        }
    }

    echo "La suma de los dígitos de $numero es: $suma\n";
    return $suma;
}

// Pedir número al usuario
$entrada = readline("Introduce un número: ");
sumaDigitos($entrada);

?>

