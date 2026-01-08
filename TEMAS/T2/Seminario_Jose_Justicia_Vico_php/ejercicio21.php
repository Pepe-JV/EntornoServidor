<?php
// EJERCICIO 21: Invertir cadena
// Crea una función que invierta una cadena de texto
// Ejemplo: "hola" debería convertirse en "aloh"

function invertirCadena($texto) {
    // Validar que no esté vacío
    if (empty($texto) || trim($texto) == "") {
        echo "ERROR: El texto está vacío\n";
        return null;
    }

    // Invertir la cadena
    $textoInvertido = strrev($texto);

    echo "Texto original: \"$texto\"\n";
    echo "Texto invertido: \"$textoInvertido\"\n";
    return $textoInvertido;
}

// Pedir texto al usuario
$entrada = readline("Introduce un texto: ");
invertirCadena($entrada);

?>

