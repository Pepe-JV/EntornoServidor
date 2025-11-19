<?php
// EJERCICIO 7: Crea una función que ponga en mayúscula la primera letra de cada palabra de un texto
// Ejemplo: "hola mundo" → "Hola Mundo"

function capitalizarPalabras($texto) {
    // Validar que el texto no esté vacío
    if (empty($texto) || trim($texto) == "") {
        echo "ERROR: El texto está vacío\n";
        return null;
    }

    // Capitalizar la primera letra de cada palabra
    $textoCapitalizado = ucwords(strtolower($texto));

    echo "Texto original: \"$texto\"\n";
    echo "Texto capitalizado: \"$textoCapitalizado\"\n";
    return $textoCapitalizado;
}

// Pedir texto al usuario
$entrada = readline("Introduce un texto: ");
capitalizarPalabras($entrada);

?>

