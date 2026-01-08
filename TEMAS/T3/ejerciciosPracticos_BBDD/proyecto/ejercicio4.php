
<?php
/**
 * Ejercicio 4: JOIN - Productos con categoría
 * Ejecutar desde terminal: php ejercicio4.php
 */

echo "\n";
echo "EJERCICIO 4: JOIN - Productos con categoría\n";
echo "\n";


$host = 'db';
$dbname = 'tienda_frutas';
$username = 'alumno';
$password = 'alumno';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, 
    
    PDO::ERRMODE_EXCEPTION);

    echo "Conectado a la base de datos 'tienda_frutas'\n\n";

    $stmt = $pdo->query("
        SELECT p.nombre, p.precio, c.nombre as categoria 
        FROM productos p 
        INNER JOIN categorias c ON p.categoria_id = c.id 
        ORDER BY c.nombre, p.precio
    ");
    $productos = $stmt->fetchAll
    (PDO::FETCH_ASSOC);

    echo "PRODUCTOS CON CATEGORÍA (Ordenados por categoría y precio)\n";
    echo "-------------------------------------------\n";
    printf("%-20s %-20s %-10s\n", "PRODUCTO", "CATEGORÍA", "PRECIO");
    echo "-------------------------------------------\n";


    $categoria_actual = '';
    foreach ($productos as $prod) {
        if ($categoria_actual != $prod['categoria']) {
            $categoria_actual = $prod['categoria'];
        }

        printf("%-20s %-20s €%-9.2f\n",
            $prod['nombre'],
            $prod['categoria'],
            $prod['precio']
        );
    }

    
    echo "\n";

} catch(PDOException $e) {
    
    echo "Error: " . $e->getMessage() . "\n";
    
    exit(1);
}
?>
