<?php
// EJERCICIO 19: Eliminar vocales
// Crea una función que, dada una cadena de texto, elimine todas las vocales de la cadena
// Ejemplo: eliminarVocales("Hola Mundo") → "Hl Mnd"

function eliminarVocales($texto) {
    // Validar que no esté vacío
    if (empty($texto) || trim($texto) == "") {
        echo "ERROR: El texto está vacío\n";
        return null;
    }

    // Definir las vocales (mayúsculas y minúsculas, con y sin acentos)
    $vocales = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U',
                'á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú'];

    // Eliminar vocales
    $textoSinVocales = str_replace($vocales, '', $texto);

    echo "Texto original: \"$texto\"\n";
    echo "Texto sin vocales: \"$textoSinVocales\"\n";
    return $textoSinVocales;
}

// Pedir texto al usuario
$entrada = readline("Introduce un texto: ");
eliminarVocales($entrada);

?>

