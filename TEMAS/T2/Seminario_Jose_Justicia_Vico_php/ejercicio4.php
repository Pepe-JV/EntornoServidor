<?php
// EJERCICIO 4: Crea una función que determine si una cadena de texto es un palíndromo
// Nota: Un palíndromo es una palabra o frase que se lee igual de izquierda a derecha que de derecha a izquierda

function esPalindromo($texto) {
    // Validar que no esté vacío
    if (empty($texto) || trim($texto) == "") {
        echo "ERROR: El texto está vacío\n";
        return null;
    }
    //no puede tener numeros ni caracteres especiales
    if (!preg_match("/^[a-zA-Z\s]+$/", $texto)) {
        echo "ERROR: El texto contiene caracteres no válidos, solo son validas letras\n";
        return null;
    }

    // Convertir a minúsculas y eliminar espacios para la comparación
    $textoLimpio = strtolower(str_replace(' ', '', $texto));

    // Invertir el texto
    $textoInvertido = strrev($textoLimpio);

    // Comparar
    if ($textoLimpio === $textoInvertido) {
        echo "\"$texto\" es un palíndromo\n";
        return true;
    } else {
        echo "\"$texto\" no es un palíndromo\n";
        return false;
    }
}

// Pedir texto al usuario
$entrada = readline("Introduce una palabra o frase: ");
esPalindromo($entrada);

?>

