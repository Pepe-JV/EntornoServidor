<?php
// EJERCICIO 29: Conversor de temperaturas con constantes mágicas
// Convierte temperaturas entre Celsius, Fahrenheit y Kelvin

// Constantes para las fórmulas de conversión
const CELSIUS_A_FAHRENHEIT_MULTIPLICADOR = 9/5;
const CELSIUS_A_FAHRENHEIT_SUMANDO = 32;
const CELSIUS_A_KELVIN_SUMANDO = 273.15;

function celsiusAFahrenheit($celsius) {
    echo "Función: " . __FUNCTION__ . " (Línea " . __LINE__ . ")\n";
    return ($celsius * CELSIUS_A_FAHRENHEIT_MULTIPLICADOR) + CELSIUS_A_FAHRENHEIT_SUMANDO;
}

function fahrenheitACelsius($fahrenheit) {
    echo "Función: " . __FUNCTION__ . " (Línea " . __LINE__ . ")\n";
    return ($fahrenheit - CELSIUS_A_FAHRENHEIT_SUMANDO) / CELSIUS_A_FAHRENHEIT_MULTIPLICADOR;
}

function celsiusAKelvin($celsius) {
    echo "Función: " . __FUNCTION__ . " (Línea " . __LINE__ . ")\n";
    return $celsius + CELSIUS_A_KELVIN_SUMANDO;
}

function kelvinACelsius($kelvin) {
    echo "Función: " . __FUNCTION__ . " (Línea " . __LINE__ . ")\n";
    return $kelvin - CELSIUS_A_KELVIN_SUMANDO;
}

function fahrenheitAKelvin($fahrenheit) {
    echo "Función: " . __FUNCTION__ . " (Línea " . __LINE__ . ")\n";
    $celsius = fahrenheitACelsius($fahrenheit);
    return celsiusAKelvin($celsius);
}

function kelvinAFahrenheit($kelvin) {
    echo "Función: " . __FUNCTION__ . " (Línea " . __LINE__ . ")\n";
    $celsius = kelvinACelsius($kelvin);
    return celsiusAFahrenheit($celsius);
}

function convertirTemperatura($valor, $unidadOrigen, $unidadDestino) {
    // Validar que el valor sea numérico
    if (!is_numeric($valor)) {
        echo "ERROR: El valor debe ser un número válido\n";
        return null;
    }

    // Validar que las unidades no estén vacías
    if (empty($unidadOrigen) || empty($unidadDestino)) {
        echo "ERROR: Debe especificar las unidades de origen y destino\n";
        return null;
    }

    // Normalizar las unidades a mayúsculas
    $unidadOrigen = strtoupper(trim($unidadOrigen));
    $unidadDestino = strtoupper(trim($unidadDestino));

    // Validar unidades válidas
    $unidadesValidas = ['C', 'F', 'K', 'CELSIUS', 'FAHRENHEIT', 'KELVIN'];
    if (!in_array($unidadOrigen, $unidadesValidas) || !in_array($unidadDestino, $unidadesValidas)) {
        echo "ERROR: Unidades no válidas. Use C/Celsius, F/Fahrenheit o K/Kelvin\n";
        return null;
    }

    // Normalizar nombres completos a abreviaturas
    $unidadOrigen = str_replace(['CELSIUS', 'FAHRENHEIT', 'KELVIN'], ['C', 'F', 'K'], $unidadOrigen);
    $unidadDestino = str_replace(['CELSIUS', 'FAHRENHEIT', 'KELVIN'], ['C', 'F', 'K'], $unidadDestino);

    // Si son la misma unidad, no hay conversión
    if ($unidadOrigen == $unidadDestino) {
        echo "$valor°$unidadOrigen = $valor°$unidadDestino\n";
        return $valor;
    }

    echo "\n=== Archivo: " . __FILE__ . " ===\n";
    echo "Línea de ejecución: " . __LINE__ . "\n\n";

    $resultado = null;

    // Realizar la conversión según las unidades
    if ($unidadOrigen == 'C' && $unidadDestino == 'F') {
        $resultado = celsiusAFahrenheit($valor);
    } elseif ($unidadOrigen == 'F' && $unidadDestino == 'C') {
        $resultado = fahrenheitACelsius($valor);
    } elseif ($unidadOrigen == 'C' && $unidadDestino == 'K') {
        $resultado = celsiusAKelvin($valor);
    } elseif ($unidadOrigen == 'K' && $unidadDestino == 'C') {
        $resultado = kelvinACelsius($valor);
    } elseif ($unidadOrigen == 'F' && $unidadDestino == 'K') {
        $resultado = fahrenheitAKelvin($valor);
    } elseif ($unidadOrigen == 'K' && $unidadDestino == 'F') {
        $resultado = kelvinAFahrenheit($valor);
    }

    echo "\n$valor°$unidadOrigen = " . round($resultado, 2) . "°$unidadDestino\n";
    return $resultado;
}

// Interacción con el usuario
echo "=== CONVERSOR DE TEMPERATURAS ===\n";
echo "Unidades disponibles: C (Celsius), F (Fahrenheit), K (Kelvin)\n\n";

$temperatura = readline("Introduce el valor de la temperatura: ");
$unidadOrigen = readline("Introduce la unidad de origen (C/F/K): ");
$unidadDestino = readline("Introduce la unidad de destino (C/F/K): ");

echo "\n";
convertirTemperatura($temperatura, $unidadOrigen, $unidadDestino);

?>
<?php
// EJERCICIO 3: Crea una función que dada una distancia en millas calcule su correspondiente en kilómetros
// Nota: 1 milla = 1.60934 kilómetros

function millasAKilometros($millas) {
    // Validar que el parámetro sea numérico
    if (!is_numeric($millas)) {
        echo "ERROR: El valor introducido no es un número válido\n";
        return null;
    }

    // Validar que sea un número positivo
    if ($millas < 0) {
        echo "ERROR: La distancia no puede ser negativa\n";
        return null;
    }

    // Constante de conversión
    $kilometros = $millas * 1.60934;

    echo "$millas millas equivalen a " . round($kilometros, 2) . " kilómetros\n";
    return $kilometros;
}

// Pedir millas al usuario
$entrada = readline("Introduce la distancia en millas: ");
millasAKilometros($entrada);

?>

