<?php
// EJERCICIO 28: Calculadora interactiva
// Crea un programa que simule una calculadora interactiva con validación de entrada

function calculadora($num1, $num2, $operacion) {
    // Validar que los números sean válidos
    if (!is_numeric($num1) || !is_numeric($num2)) {
        echo "ERROR: Los valores introducidos no son números válidos\n";
        return null;
    }

    // Validar que la operación no esté vacía
    if (empty($operacion) || trim($operacion) == "") {
        echo "ERROR: Debe especificar una operación\n";
        return null;
    }

    $operacion = trim($operacion);
    $resultado = null;

    // Realizar la operación según el operador
    switch ($operacion) {
        case '+':
            $resultado = $num1 + $num2;
            echo "Resultado: $num1 + $num2 = $resultado\n";
            break;
        case '-':
            $resultado = $num1 - $num2;
            echo "Resultado: $num1 - $num2 = $resultado\n";
            break;
        case '*':
            $resultado = $num1 * $num2;
            echo "Resultado: $num1 * $num2 = $resultado\n";
            break;
        case '/':
            // Validar división por cero
            if ($num2 == 0) {
                echo "ERROR: No se puede dividir por cero\n";
                return null;
            }
            $resultado = $num1 / $num2;
            echo "Resultado: $num1 / $num2 = $resultado\n";
            break;
        default:
            echo "ERROR: Operación no válida. Use +, -, * o /\n";
            return null;
    }

    return $resultado;
}

// Interacción con el usuario
echo "=== CALCULADORA INTERACTIVA ===\n";

do {
    $num1 = readline("Introduce el primer número: ");
    $num2 = readline("Introduce el segundo número: ");
    $operacion = readline("Introduce la operación (+, -, *, /): ");

    echo "\n";
    calculadora($num1, $num2, $operacion);

    echo "\n";
    $continuar = readline("¿Deseas realizar otra operación? (s/n): ");
    echo "\n";

} while (strtolower(trim($continuar)) == 's');

echo "¡Gracias por usar la calculadora!\n";

?>

