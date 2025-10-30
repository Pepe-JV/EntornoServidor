<?php
// EJERCICIO 26: Validador de datos con operador null coalescing
// Crea una función que reciba un array con datos de usuario y use el operador ?? para valores por defecto

function validarDatos($datos) {
    // Validar que sea un array
    if (!is_array($datos)) {
        echo "ERROR: El parámetro debe ser un array\n";
        return null;
    }

    // Asignar valores por defecto usando el operador null coalescing
    $datosValidados = [
        'nombre' => $datos['nombre'] ?? 'Anónimo',
        'email' => $datos['email'] ?? 'sin-email@example.com',
        'edad' => $datos['edad'] ?? 18,
        'ciudad' => $datos['ciudad'] ?? 'Desconocida'
    ];

    echo "Datos validados:\n";
    echo "- Nombre: " . $datosValidados['nombre'] . "\n";
    echo "- Email: " . $datosValidados['email'] . "\n";
    echo "- Edad: " . $datosValidados['edad'] . "\n";
    echo "- Ciudad: " . $datosValidados['ciudad'] . "\n";

    return $datosValidados;
}

// Ejemplo de uso con datos incompletos
echo "=== Ejemplo 1: Datos incompletos ===\n";
$usuario1 = ['nombre' => 'Juan', 'edad' => 25];
validarDatos($usuario1);

echo "\n=== Ejemplo 2: Datos completos ===\n";
$usuario2 = ['nombre' => 'María', 'email' => 'maria@example.com', 'edad' => 30, 'ciudad' => 'Madrid'];
validarDatos($usuario2);

echo "\n=== Ejemplo 3: Datos vacíos ===\n";
$usuario3 = [];
validarDatos($usuario3);

// Permitir entrada interactiva
echo "\n=== Entrada personalizada ===\n";
$nombre = readline("Introduce el nombre (Enter para valor por defecto): ");
$email = readline("Introduce el email (Enter para valor por defecto): ");
$edad = readline("Introduce la edad (Enter para valor por defecto): ");
$ciudad = readline("Introduce la ciudad (Enter para valor por defecto): ");

$datosPersonalizados = [];
if (!empty(trim($nombre))) $datosPersonalizados['nombre'] = $nombre;
if (!empty(trim($email))) $datosPersonalizados['email'] = $email;
if (!empty(trim($edad)) && is_numeric($edad)) $datosPersonalizados['edad'] = (int)$edad;
if (!empty(trim($ciudad))) $datosPersonalizados['ciudad'] = $ciudad;

echo "\n";
validarDatos($datosPersonalizados);

?>

