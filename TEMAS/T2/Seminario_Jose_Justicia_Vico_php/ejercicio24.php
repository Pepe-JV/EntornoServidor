<?php
// EJERCICIO 24: Calculadora de descuentos con constantes
// Crea un programa que utilice constantes para definir diferentes tipos de descuentos y calcule el precio final

// Definir constantes de descuento
const DESCUENTO_ESTUDIANTE = 15; // 15%
const DESCUENTO_JUBILADO = 20;   // 20%
const DESCUENTO_VIP = 25;        // 25%

function calcularPrecioFinal($precio, $tipoCliente) {
    // Validar que el precio sea numérico
    if (!is_numeric($precio)) {
        echo "ERROR: El precio debe ser un número válido\n";
        return null;
    }

    // Validar que el precio sea positivo
    if ($precio <= 0) {
        echo "ERROR: El precio debe ser mayor que 0\n";
        return null;
    }

    // Validar que el tipo de cliente no esté vacío
    if (empty($tipoCliente) || trim($tipoCliente) == "") {
        echo "ERROR: Debe especificar un tipo de cliente\n";
        return null;
    }

    // Normalizar el tipo de cliente a minúsculas
    $tipoCliente = strtolower(trim($tipoCliente));

    // Determinar el descuento según el tipo de cliente
    $descuento = 0;

    switch ($tipoCliente) {
        case 'estudiante':
            $descuento = DESCUENTO_ESTUDIANTE;
            break;
        case 'jubilado':
            $descuento = DESCUENTO_JUBILADO;
            break;
        case 'vip':
            $descuento = DESCUENTO_VIP;
            break;
        default:
            echo "ERROR: Tipo de cliente no válido. Opciones: estudiante, jubilado, vip\n";
            return null;
    }

    // Calcular el precio final
    $montoDescuento = ($precio * $descuento) / 100;
    $precioFinal = $precio - $montoDescuento;

    echo "Precio original: €$precio\n";
    echo "Tipo de cliente: $tipoCliente\n";
    echo "Descuento: $descuento%\n";
    echo "Monto descontado: €$montoDescuento\n";
    echo "Precio final: €$precioFinal\n";

    return $precioFinal;
}

// Pedir datos al usuario
$precio = readline("Introduce el precio del producto: ");
$tipoCliente = readline("Introduce el tipo de cliente (estudiante, jubilado, vip): ");

calcularPrecioFinal($precio, $tipoCliente);

?>

