
<?php
/**
 * Ejercicio 3: Consultas SELECT básicas
 * Ejecutar desde terminal: php ejercicio3.php
 */

echo "\n";
echo "EJERCICIO 3: Consultas SELECT básicas\n";
echo "\n";


$host = 'db';
$dbname = 'tienda_frutas';
$username = 'alumno';
$password = 'alumno';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conectado a la base de datos 'tienda_frutas'\n\n";


    // a) Obtener todos los productos ordenados por precio (menor a mayor)
    echo "a) PRODUCTOS ORDENADOS POR PRECIO (menor a mayor)\n";
    echo "-------------------------------------------\n";

   
    $stmt = $pdo->query("SELECT * FROM productos ORDER BY precio ASC");
   
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    printf("%-20s %-10s %-10s\n", "NOMBRE", "PRECIO", "STOCK");
    echo "-------------------------------------------\n";
    foreach ($productos as $prod) {
        printf("%-20s €%-9.2f %-10d\n", $prod['nombre'], $prod['precio'], $prod['stock']);
    }
   
    echo "\n";

    // b) Obtener productos de una categoría específica
    echo "b) PRODUCTOS DE CATEGORÍA ESPECÍFICA (Cítricos)\n";
    echo "-------------------------------------------\n";

    $stmt = $pdo->prepare("
        SELECT p.nombre, p.precio, c.nombre as categoria 
        FROM productos p 
        INNER JOIN categorias c ON p.categoria_id = c.id 
        WHERE c.nombre = ?
   
        ");
   
        $stmt->execute(['Cítricos']);
   
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        
    printf("%-20s %-20s %-10s\n", "NOMBRE", "CATEGORÍA", "PRECIO");
    echo "-------------------------------------------\n";
    foreach ($productos as $prod) {
        printf("%-20s %-20s €%-9.2f\n", $prod['nombre'], $prod['categoria'], $prod['precio']);
    }
    echo "\n";

    // c) Obtener productos con stock menor a 20
    
    echo "c) PRODUCTOS CON STOCK MENOR A 20\n";
    echo "-------------------------------------------\n";

    $stmt = $pdo->query("SELECT * FROM productos WHERE stock < 20");
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($productos) > 0) {
        printf("%-20s %-10s %-10s\n", "NOMBRE", "STOCK", "PRECIO");
        echo "-------------------------------------------\n";
        foreach ($productos as $prod) {
            printf("%-20s %-10d €%-9.2f\n", $prod['nombre'], $prod['stock'], $prod['precio']);
        }
    } else {
        echo "No hay productos con stock menor a 20\n";
    }
    echo "\n";

    // d) Contar cuántos productos hay en total
    echo "d) CONTAR PRODUCTOS TOTALES\n";
    echo "-------------------------------------------\n";

    $stmt = $pdo->query("SELECT COUNT(*) as total FROM productos");
    $total = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "Total de productos en la base de datos: " . $total['total'] . "\n\n";

} catch(PDOException $e) {
    echo " Error: " . $e->getMessage() . "\n";
    exit(1);
}
?>
