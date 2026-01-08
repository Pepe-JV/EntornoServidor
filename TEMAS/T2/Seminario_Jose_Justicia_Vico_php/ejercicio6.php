<?php
// EJERCICIO 6: Crea una función que cuente cuántas veces aparece una subcadena en un texto

function contarSubcadena($texto, $subcadena) {
    // Validar que el texto no esté vacío
    if (empty($texto) || trim($texto) == "") {
        echo "ERROR: El texto está vacío\n";
        return null;
    }

    // Validar que la subcadena no esté vacía
    if (empty($subcadena) || trim($subcadena) == "") {
        echo "ERROR: La subcadena está vacía\n";
        return null;
    }

    // Contar ocurrencias (case insensitive)
    $contador = substr_count(strtolower($texto), strtolower($subcadena));

    echo "La subcadena '$subcadena' aparece $contador veces en \"$texto\"\n";
    return $contador;
}

// Pedir datos al usuario
$texto = readline("Introduce un texto: ");
$subcadena = readline("Introduce la subcadena a buscar: ");
contarSubcadena($texto, $subcadena);

?>

