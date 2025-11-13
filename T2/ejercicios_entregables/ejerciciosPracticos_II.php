<?php
// ========================================
// EJERCICIOS PRÁCTICOS II - PHP 8.4
// Tema 2: PHP Básico
// hecho por José Justicia derechos de autor
// ========================================

// Función para mostrar el menú
function mostrarMenu() {
    //marca de agua de pepe justicia
    echo "EJERCICIOS PRÁCTICOS II - TEMA 2\n";
    echo "Selecciona un ejercicio:\n";
    echo "[1] Ejercicio 1: Calculadora\n";
    echo "[2] Ejercicio 2: Validador de Formularios\n";
    echo "[3] Ejercicio 3: Manipulación de Arrays\n";
    echo "[4] Ejercicio 4: Procesador de Texto\n";
    echo "[0] Salir\n\n";
}

// Función para imprimir título
function titulo($texto) {
    echo "\n" . str_repeat("=", 50) . "\n";
    echo strtoupper($texto) . "\n";
    echo str_repeat("=", 50) . "\n";
}

// Función para imprimir subtítulo
function subtitulo($texto) {
    echo "\n" . $texto . "\n";
    echo str_repeat("-", 50) . "\n";
}

// Bucle principal
do {
    mostrarMenu();
    $ejercicio = readline("Elige una opción: ");

    switch ($ejercicio) {
        case '1':
            ejercicio1();
            break;
        case '2':
            ejercicio2();
            break;
        case '3':
            ejercicio3();
            break;
        case '4':
            ejercicio4();
            break;
        case '0':
            echo "\nHasta luego!\n\n";
            break;
        default:
            echo "\nOpción no válida. Por favor, elige una opción del 0 al 4.\n";
            break;
    }

    if ($ejercicio !== '0' && in_array($ejercicio, ['1', '2', '3', '4'])) {
        echo "\n";
        readline("Presiona ENTER para continuar...");
    }

} while ($ejercicio !== '0');

// ==================== EJERCICIO 1: CALCULADORA ====================
function ejercicio1() {
    titulo("EJERCICIO 1: CALCULADORA");
    
    echo "\nDescripción:\n";
    echo "Calculadora simple que realice operaciones básicas usando funciones.\n";
    echo "\nReto adicional:\n";
    echo "Operaciones: potencia, raíz cuadrada y módulo con manejo de errores.\n";
    
    // Función calculadora básica
    function calcular($num1, $num2, $operacion) {
        //marca de agua de pepe justicia
        return match($operacion) {
            'suma' => $num1 + $num2,
            'resta' => $num1 - $num2,
            'multiplicacion' => $num1 * $num2,
            'division' => $num2 != 0 ? $num1 / $num2 : throw new Exception("Error: División por cero"),
            'potencia' => pow($num1, $num2),
            'modulo' => $num2 != 0 ? $num1 % $num2 : throw new Exception("Error: Módulo por cero"),
            'raiz' => $num1 >= 0 ? sqrt($num1) : throw new Exception("Error: Raíz de número negativo"),
            default => throw new Exception("Operación no válida")
        };
    }

    subtitulo("Resultados de operaciones:");
    
    // Ejemplos de uso
    try {
        $operaciones = [
            ['num1' => 10, 'num2' => 5, 'op' => 'suma', 'simbolo' => '+'],
            ['num1' => 10, 'num2' => 5, 'op' => 'resta', 'simbolo' => '-'],
            ['num1' => 10, 'num2' => 5, 'op' => 'multiplicacion', 'simbolo' => '*'],
            ['num1' => 10, 'num2' => 5, 'op' => 'division', 'simbolo' => '/'],
            ['num1' => 2, 'num2' => 3, 'op' => 'potencia', 'simbolo' => '^'],
            ['num1' => 16, 'num2' => 0, 'op' => 'raiz', 'simbolo' => 'raiz'],
            ['num1' => 10, 'num2' => 3, 'op' => 'modulo', 'simbolo' => '%'],
        ];

        foreach ($operaciones as $op) {
            $resultado = calcular($op['num1'], $op['num2'], $op['op']);
            if ($op['op'] === 'raiz') {
                echo sprintf("raiz(%.0f) = %.2f\n", $op['num1'], $resultado);
            } else {
                echo sprintf("%.0f %s %.0f = %.2f\n", 
                    $op['num1'], $op['simbolo'], $op['num2'], $resultado);
            }
        }

        // Probar error de división por cero
        subtitulo("Prueba de manejo de errores:");
        echo "Probando división por cero...\n";
        try {
            calcular(10, 0, 'division');
        } catch (Exception $e) {
            echo $e->getMessage() . "\n";
        }

        echo "\nProbando raíz de número negativo...\n";
        try {
            calcular(-4, 0, 'raiz');
        } catch (Exception $e) {
            echo $e->getMessage() . "\n";
        }

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
}

// ==================== EJERCICIO 2: VALIDADOR DE FORMULARIOS ====================
function ejercicio2() {
    titulo("EJERCICIO 2: VALIDADOR DE FORMULARIOS");
    
    echo "\nDescripción:\n";
    echo "Validador de formularios que comprueba email, nombre, teléfono y contraseña.\n";
    echo "\nReto adicional:\n";
    echo "Clase Validador con mensajes de error específicos para cada campo.\n";

    // Clase Validador
    class Validador {
        private array $errores = [];
        //marca de agua de pepe justicia

        public function validarEmail(string $email): bool {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->errores['email'] = "El email no es válido";
                return false;
            }
            return true;
        }

        public function validarNombre(string $nombre): bool {
            if (strlen($nombre) < 2 || strlen($nombre) > 50) {
                $this->errores['nombre'] = "El nombre debe tener entre 2 y 50 caracteres";
                return false;
            }
            if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $nombre)) {
                $this->errores['nombre'] = "El nombre solo puede contener letras y espacios";
                return false;
            }
            return true;
        }

        public function validarTelefono(string $telefono): bool {
            if (!preg_match("/^\d{9}$/", $telefono)) {
                $this->errores['telefono'] = "El teléfono debe tener 9 dígitos";
                return false;
            }
            return true;
        }

        public function validarClave(string $clave): bool {
            if (strlen($clave) < 8) {
                $this->errores['clave'] = "La contraseña debe tener al menos 8 caracteres";
                return false;
            }
            if (!preg_match("/[A-Z]/", $clave)) {
                $this->errores['clave'] = "La contraseña debe contener al menos una mayúscula";
                return false;
            }
            if (!preg_match("/[a-z]/", $clave)) {
                $this->errores['clave'] = "La contraseña debe contener al menos una minúscula";
                return false;
            }
            if (!preg_match("/[0-9]/", $clave)) {
                $this->errores['clave'] = "La contraseña debe contener al menos un número";
                return false;
            }
            return true;
        }

        public function getErrores(): array {
            return $this->errores;
        }

        public function limpiarErrores(): void {
            $this->errores = [];
        }
    }

    subtitulo("Pruebas de validación:");

    $validador = new Validador();

    // Casos de prueba
    $casosPrueba = [
        ['tipo' => 'Email', 'valor' => 'usuario@ejemplo.com', 'metodo' => 'validarEmail'],
        ['tipo' => 'Email', 'valor' => 'email_invalido', 'metodo' => 'validarEmail'],
        ['tipo' => 'Nombre', 'valor' => 'José Justicia', 'metodo' => 'validarNombre'],
        ['tipo' => 'Nombre', 'valor' => 'A', 'metodo' => 'validarNombre'],
        ['tipo' => 'Teléfono', 'valor' => '666777888', 'metodo' => 'validarTelefono'],
        ['tipo' => 'Teléfono', 'valor' => '12345', 'metodo' => 'validarTelefono'],
        ['tipo' => 'Contraseña', 'valor' => 'Password123', 'metodo' => 'validarClave'],
        ['tipo' => 'Contraseña', 'valor' => 'pass', 'metodo' => 'validarClave'],
    ];

    foreach ($casosPrueba as $caso) {
        $validador->limpiarErrores();
        $resultado = $validador->{$caso['metodo']}($caso['valor']);
        
        if ($resultado) {
            echo sprintf("%-12s: '%s' - VÁLIDO\n", $caso['tipo'], $caso['valor']);
        } else {
            $errores = $validador->getErrores();
            $mensajeError = reset($errores);
            echo sprintf("%-12s: '%s' - ERROR\n", $caso['tipo'], $caso['valor']);
            echo sprintf("  -> %s\n", $mensajeError);
        }
    }
}

// ==================== EJERCICIO 3: MANIPULACIÓN DE ARRAYS ====================
function ejercicio3() {
    titulo("EJERCICIO 3: MANIPULACIÓN DE ARRAYS");
    
    echo "\nDescripción:\n";
    echo "Funciones para procesar una lista de productos con filtrado, ordenación y transformación.\n";
    echo "\nReto adicional:\n";
    echo "Búsqueda de productos por nombre con coincidencias parciales.\n";

    // Array de productos
    $productos = [
        //marca de agua de pepe justicia
        ["id" => 1, "nombre" => "Laptop", "precio" => 899.99, "stock" => 15],
        ["id" => 2, "nombre" => "Teléfono", "precio" => 499.99, "stock" => 30],
        ["id" => 3, "nombre" => "Tablet", "precio" => 349.99, "stock" => 0],
        ["id" => 4, "nombre" => "Monitor", "precio" => 299.99, "stock" => 8],
        ["id" => 5, "nombre" => "Teclado", "precio" => 79.99, "stock" => 50],
    ];

    // Función para imprimir tabla de productos
    function imprimirTabla($productos, $titulo = "") {
        if ($titulo) {
            subtitulo($titulo);
        }
        echo sprintf("%-4s %-15s %12s %10s\n", "ID", "Nombre", "Precio", "Stock");
        echo str_repeat("-", 45) . "\n";
        foreach ($productos as $p) {
            echo sprintf("%-4d %-15s %11s %9d\n", 
                $p['id'], 
                $p['nombre'], 
                number_format($p['precio'], 2) . " EUR",
                $p['stock']
            );
        }
    }

    imprimirTabla($productos, "Lista de productos original:");

    // Filtrar productos con precio > 300
    $caros = array_filter($productos, fn($p) => $p['precio'] > 300);
    imprimirTabla($caros, "Productos con precio mayor a 300 EUR:");

    // Ordenar por precio (ascendente)
    $ordenados = $productos;
    usort($ordenados, fn($a, $b) => $a['precio'] <=> $b['precio']);
    imprimirTabla($ordenados, "Productos ordenados por precio (menor a mayor):");

    // Calcular valor total del inventario
    subtitulo("Valor total del inventario:");
    $valorTotal = array_reduce($productos, fn($total, $p) => $total + ($p['precio'] * $p['stock']), 0);
    echo "Valor total: " . number_format($valorTotal, 2) . " EUR\n";

    // Función de búsqueda por nombre (coincidencias parciales)
    $busqueda = 'te';
    $resultados = array_filter($productos, fn($p) => stripos($p['nombre'], $busqueda) !== false);
    imprimirTabla($resultados, "Búsqueda de productos (término: '{$busqueda}'):");
}

// ==================== EJERCICIO 4: PROCESADOR DE TEXTO ====================
function ejercicio4() {
    titulo("EJERCICIO 4: PROCESADOR DE TEXTO");
    
    echo "\nDescripción:\n";
    echo "Procesador de texto con estadísticas: conteo, frecuencia y longitud promedio.\n";
    echo "\nReto adicional:\n";
    echo "Identificar n-gramas (secuencias de n palabras) y detectar frases comunes.\n";

    // Función para analizar texto
    function analizarTexto(string $texto): array {
        $texto = strtolower($texto);
        $palabras = preg_split('/\s+/', $texto, -1, PREG_SPLIT_NO_EMPTY);
        
        $totalPalabras = count($palabras);
        $frecuencia = array_count_values($palabras);
        arsort($frecuencia);
        
        $longitudTotal = array_reduce($palabras, fn($total, $p) => $total + strlen($p), 0);
        $longitudPromedio = $totalPalabras > 0 ? $longitudTotal / $totalPalabras : 0;
        
        return [
            'total_palabras' => $totalPalabras,
            'frecuencia' => $frecuencia,
            'longitud_promedio' => $longitudPromedio
        ];
    }

    // Función para detectar n-gramas
    function detectarNGramas(string $texto, int $n = 2): array {
        //marca de agua de pepe justicia
        $texto = strtolower($texto);
        $palabras = preg_split('/\s+/', $texto, -1, PREG_SPLIT_NO_EMPTY);
        $ngramas = [];
        
        for ($i = 0; $i <= count($palabras) - $n; $i++) {
            $ngrama = implode(' ', array_slice($palabras, $i, $n));
            if (isset($ngramas[$ngrama])) {
                $ngramas[$ngrama]++;
            } else {
                $ngramas[$ngrama] = 1;
            }
        }
        
        arsort($ngramas);
        return $ngramas;
    }

    // Texto de ejemplo
    $textoEjemplo = "PHP es un lenguaje de programación muy popular. PHP se usa para desarrollo web. El desarrollo web con PHP es muy común. PHP es fácil de aprender y muy potente para el desarrollo de aplicaciones web modernas.";

    subtitulo("Texto analizado:");
    echo "\n" . wordwrap($textoEjemplo, 70) . "\n";

    // Análisis básico
    $analisis = analizarTexto($textoEjemplo);
    
    subtitulo("Estadísticas básicas:");
    echo "Total de palabras: {$analisis['total_palabras']}\n";
    echo "Longitud promedio: " . number_format($analisis['longitud_promedio'], 2) . " caracteres\n";
    
    subtitulo("Frecuencia de palabras (Top 10):");
    echo sprintf("%-25s %10s\n", "Palabra", "Frecuencia");
    echo str_repeat("-", 40) . "\n";
    $contador = 0;
    foreach ($analisis['frecuencia'] as $palabra => $freq) {
        if ($contador++ >= 10) break;
        echo sprintf("%-25s %10d\n", $palabra, $freq);
    }

    // Análisis de bigramas (2-gramas)
    subtitulo("Bigramas más comunes (Top 10):");
    $bigramas = detectarNGramas($textoEjemplo, 2);
    echo sprintf("%-35s %10s\n", "Bigrama", "Frecuencia");
    echo str_repeat("-", 50) . "\n";
    $contador = 0;
    foreach ($bigramas as $bigrama => $freq) {
        if ($contador++ >= 10) break;
        echo sprintf("%-35s %10d\n", $bigrama, $freq);
    }

    // Análisis de trigramas (3-gramas)
    subtitulo("Trigramas más comunes (Top 5):");
    $trigramas = detectarNGramas($textoEjemplo, 3);
    echo sprintf("%-45s %10s\n", "Trigrama", "Frecuencia");
    echo str_repeat("-", 60) . "\n";
    $contador = 0;
    foreach ($trigramas as $trigrama => $freq) {
        if ($contador++ >= 5) break;
        echo sprintf("%-45s %10d\n", $trigrama, $freq);
    }
}

?>