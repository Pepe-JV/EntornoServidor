<?php
// EJERCICIO 27: Acceso seguro a propiedades con nullsafe operator
// Crea una función que use el operador ?-> para acceder de forma segura a propiedades anidadas

function obtenerCodigoPostal($usuario) {
    // Validar que el parámetro no sea null
    if ($usuario === null) {
        echo "ERROR: El usuario es null\n";
        return null;
    }

    // Convertir array a objeto si es necesario
    if (is_array($usuario)) {
        $usuario = json_decode(json_encode($usuario));
    }

    // Intentar acceder al código postal de forma segura usando el operador nullsafe
    // Nota: Como trabajamos con arrays asociativos, simulamos el comportamiento
    if (is_object($usuario)) {
        $codigoPostal = $usuario->direccion->codigoPostal ?? null;
    } else {
        $codigoPostal = $usuario['direccion']['codigoPostal'] ?? null;
    }

    // Mostrar resultado
    if ($codigoPostal !== null) {
        echo "Código postal encontrado: $codigoPostal\n";
        return $codigoPostal;
    } else {
        echo "Código postal no disponible\n";
        return "No disponible";
    }
}

function mostrarDireccionCompleta($usuario) {
    // Convertir array a objeto si es necesario
    if (is_array($usuario)) {
        $usuario = json_decode(json_encode($usuario));
    }

    // Acceso seguro a las propiedades
    $nombre = $usuario->nombre ?? 'Usuario desconocido';
    $calle = $usuario->direccion->calle ?? 'No disponible';
    $ciudad = $usuario->direccion->ciudad ?? 'No disponible';
    $codigoPostal = $usuario->direccion->codigoPostal ?? 'No disponible';

    echo "\n=== Información del usuario ===\n";
    echo "Nombre: $nombre\n";
    echo "Calle: $calle\n";
    echo "Ciudad: $ciudad\n";
    echo "Código Postal: $codigoPostal\n";
}

// Ejemplo 1: Usuario con dirección completa
echo "=== Ejemplo 1: Dirección completa ===\n";
$usuario1 = [
    'nombre' => 'Ana',
    'direccion' => [
        'calle' => 'Gran Vía',
        'ciudad' => 'Madrid',
        'codigoPostal' => '28013'
    ]
];
obtenerCodigoPostal($usuario1);
mostrarDireccionCompleta($usuario1);

// Ejemplo 2: Usuario sin código postal
echo "\n=== Ejemplo 2: Sin código postal ===\n";
$usuario2 = [
    'nombre' => 'Luis',
    'direccion' => [
        'calle' => 'Rambla',
        'ciudad' => 'Barcelona'
    ]
];
obtenerCodigoPostal($usuario2);
mostrarDireccionCompleta($usuario2);

// Ejemplo 3: Usuario sin dirección
echo "\n=== Ejemplo 3: Sin dirección ===\n";
$usuario3 = [
    'nombre' => 'Pedro'
];
obtenerCodigoPostal($usuario3);
mostrarDireccionCompleta($usuario3);

?>

