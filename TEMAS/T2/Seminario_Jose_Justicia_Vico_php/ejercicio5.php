<?php
// EJERCICIO 5: Crea una función que cuente cuántas veces aparece una letra en un texto

function contarLetra($texto, $letra) {
    // Validar que el texto no esté vacío
    if (empty($texto) || trim($texto) == "") {
        echo "ERROR: El texto está vacío\n";
        return null;
    }

    // Validar que la letra sea un solo carácter
    if (strlen($letra) != 1) {
        echo "ERROR: Debes introducir solo una letra\n";
        return null;
    }

    // Contar ocurrencias (case insensitive)
    $contador = substr_count(strtolower($texto), strtolower($letra));

    echo "La letra '$letra' aparece $contador veces en \"$texto\"\n";
    return $contador;
}

// Pedir datos al usuario
$texto = readline("Introduce un texto: ");
$letra = readline("Introduce la letra a buscar: ");
contarLetra($texto, $letra);

?>

