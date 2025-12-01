<?php
/**
 * Ejemplo básico de consulta a MySQL
 */

// Configuración de la base de datos
$host = '127.0.0.1';  // Usar IP en lugar de localhost
$dbname = 'fruteria';
$username = 'alumno';
$password = 'alumno123';

try {
    // Crear conexión con PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Conexión establecida correctamente\n\n";
    
    // Ejemplo 1: Consulta SELECT simple
    echo "=== CONSULTA SELECT SIMPLE ===\n";
    $sql = "SELECT * FROM productos LIMIT 5";
    $stmt = $pdo->query($sql);
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($productos as $producto) {
        echo "ID: {$producto['id']} - Nombre: {$producto['nombre']} - Precio: {$producto['precio']}€\n";
    }
    
    echo "\n";
    
    // Ejemplo 2: Consulta con parámetros (preparada)
    echo "=== CONSULTA CON PARÁMETROS ===\n";
    $sql = "SELECT * FROM productos WHERE precio > :precio ORDER BY precio ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['precio' => 2.00]);
    $productos_caros = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "Productos con precio mayor a 2€:\n";
    foreach ($productos_caros as $producto) {
        echo "- {$producto['nombre']}: {$producto['precio']}€\n";
    }
    
    echo "\n";
    
    
   
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}
?>
