<?php
// EJERCICIO 25: Clasificador de notas con match
// Crea una función que utilice la expresión match de PHP 8 para clasificar una nota numérica
// Clasificación: 9-10: Sobresaliente, 7-8: Notable, 5-6: Aprobado, 0-4: Suspenso

function clasificarNota($nota) {
    // Validar que sea numérico
    if (!is_numeric($nota)) {
        echo "ERROR: La nota debe ser un número válido\n";
        return null;
    }

    // Validar que esté en el rango 0-10
    if ($nota < 0 || $nota > 10) {
        echo "ERROR: La nota debe estar entre 0 y 10\n";
        return null;
    }

    // Convertir a entero para simplificar la clasificación
    $notaEntera = (int)$nota;

    // Usar match para clasificar
    $clasificacion = match (true) {
        $notaEntera >= 9 && $notaEntera <= 10 => "Sobresaliente",
        $notaEntera >= 7 && $notaEntera < 9 => "Notable",
        $notaEntera >= 5 && $notaEntera < 7 => "Aprobado",
        $notaEntera >= 0 && $notaEntera < 5 => "Suspenso",
        default => "Nota inválida"
    };

    echo "Nota: $nota\n";
    echo "Clasificación: $clasificacion\n";
    return $clasificacion;
}

// Pedir nota al usuario
$entrada = readline("Introduce una nota (0-10): ");
clasificarNota($entrada);

?>

