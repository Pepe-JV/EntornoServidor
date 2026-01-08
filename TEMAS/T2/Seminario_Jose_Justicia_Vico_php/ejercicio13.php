<?php
// EJERCICIO 13: Generador de tabla HTML
// Crea una función que dada una cadena de texto con formato Emmet devuelva su correspondiente etiqueta HTML
// Ejemplos:
// in: a -> out: <a></a>
// in: div.oferta -> out: <div class="oferta"></div>
// in: div.coche#VWPolo -> out: <div class="coche" id="VWPolo"></div>

function generarHTML($emmet) {
    // Validar que no esté vacío
    if (empty($emmet) || trim($emmet) == "") {
        echo "ERROR: La cadena Emmet está vacía\n";
        return null;
    }

    // Extraer la etiqueta, clase e id usando expresiones regulares
    $etiqueta = "";
    $clase = "";
    $id = "";

    // Obtener la etiqueta (todo antes del primer . o #)
    if (preg_match('/^([a-z0-9]+)/', $emmet, $matches)) {
        $etiqueta = $matches[1];
    } else {
        echo "ERROR: Formato Emmet inválido\n";
        return null;
    }

    // Obtener la clase (después del punto)
    if (preg_match('/\.([a-zA-Z0-9_-]+)/', $emmet, $matches)) {
        $clase = $matches[1];
    }

    // Obtener el id (después del #)
    if (preg_match('/#([a-zA-Z0-9_-]+)/', $emmet, $matches)) {
        $id = $matches[1];
    }

    // Construir la etiqueta HTML
    $html = "<$etiqueta";

    if (!empty($clase)) {
        $html .= " class=\"$clase\"";
    }

    if (!empty($id)) {
        $html .= " id=\"$id\"";
    }

    $html .= "></$etiqueta>";

    echo "Emmet: $emmet\n";
    echo "HTML: $html\n";
    return $html;
}

// Pedir cadena Emmet al usuario
$entrada = readline("Introduce una cadena en formato Emmet: ");
generarHTML($entrada);

?>

