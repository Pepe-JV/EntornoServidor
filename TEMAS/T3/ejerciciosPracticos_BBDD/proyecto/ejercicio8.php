
<?php
/**
 * Ejercicio 8: Reportes y análisis
 * Ejecutar: php ejercicio8.php
 */

echo "\n";
echo "EJERCICIO 8: Reportes y análisis\n";
echo "\n";


$host = 'db';
$dbname = 'tienda_frutas';
$username = 'alumno';
$password = 'alumno';


try {

    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conectado a la base de datos 'tienda_frutas'\n\n";

    // a) Productos más vendidos (por categoría)
    echo "a) PRODUCTOS MÁS VENDIDOS POR CATEGORÍA\n";
    echo "===========================================\n";


    
    $stmt = $pdo->query("
        SELECT c.nombre as categoria, 
               COUNT(p.id) as num_productos,
               AVG(p.precio) as precio_promedio
        FROM categorias c
        LEFT JOIN productos p ON c.id = p.categoria_id
        GROUP BY c.id, c.nombre
        ORDER BY num_productos DESC
    ");

    $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    printf("%-20s %-15s %-15s\n", "CATEGORÍA", "PRODUCTOS", "PRECIO MEDIO");

    echo "-------------------------------------------\n";

    foreach ($categorias as $cat) {

        printf("%-20s %-15d €%-14.2f\n", 
            $cat['categoria'], 
            $cat['num_productos'], 
            $cat['precio_promedio'] ?? 0
        );
    }
    echo "\n";

    // b) Ingresos totales por categoría
    echo "b) INGRESOS TOTALES POR CATEGORÍA\n";
    echo "===========================================\n";
    
    $stmt = $pdo->query("

        SELECT c.nombre as categoria,
               SUM(p.precio * p.stock) as ingresos_potenciales
        FROM categorias c
        LEFT JOIN productos p ON c.id = p.categoria_id
        GROUP BY c.id, c.nombre
        ORDER BY ingresos_potenciales DESC

    ");
    $ingresos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    printf("%-20s %-20s\n", "CATEGORÍA", "INGRESOS POTENCIALES");



    echo "-------------------------------------------\n";
    foreach ($ingresos as $ing) {
        printf("%-20s €%-19.2f\n", 
            $ing['categoria'], 
            $ing['ingresos_potenciales'] ?? 0
        );
    }
    echo "\n";




    // c) Productos con bajo stock (< 10 unidades)
    echo "c) PRODUCTOS CON BAJO STOCK\n";
    echo "===========================================\n";
    
    $stmt = $pdo->query("
        SELECT p.nombre, p.stock, c.nombre as categoria
        FROM productos p
        JOIN categorias c ON p.categoria_id = c.id
        WHERE p.stock < 10
        ORDER BY p.stock ASC


    ");
    $bajo_stock = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($bajo_stock) > 0) {
        
        printf("%-20s %-20s %-10s\n", "PRODUCTO", "CATEGORÍA", "STOCK");
        echo "-------------------------------------------\n";
        foreach ($bajo_stock as $prod) {
            printf("%-20s %-20s %-10d\n", 
                $prod['nombre'], 
                $prod['categoria'], 
                $prod['stock']
            );


        }
    } else {



        echo "No hay productos con stock bajo\n";
    }
    echo "\n";




    // d) Usuarios con más compras
    echo "d) USUARIOS CON MÁS COMPRAS\n";
    echo "===========================================\n";
    



    $stmt = $pdo->query("



        SELECT u.usuario_id, 
               COUNT(p.id) as num_pedidos,
               SUM(p.total) as total_gastado
        FROM usuarios u
        LEFT JOIN pedidos p ON u.id = p.usuario_id
        GROUP BY u.id, u.usuario_id
        ORDER BY num_pedidos DESC
        LIMIT 10
    ");



    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($usuarios) > 0) {




        printf("%-20s %-15s %-15s\n", "USUARIO", "PEDIDOS", "TOTAL GASTADO");
        echo "-------------------------------------------\n";
        foreach ($usuarios as $user) {
            printf("%-20s %-15d €%-14.2f\n", 
                $user['usuario_id'], 
                $user['num_pedidos'], 
                $user['total_gastado'] ?? 0
            );
        }
    } else {



        echo "No hay datos de usuarios\n";
    }
    echo "\n";



    // e) Uso de GROUP BY, SUM, COUNT y ORDER BY para análisis
    echo "e) ANÁLISIS GENERAL\n";
    echo "===========================================\n";
    



    // Total de productos
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM productos");
    $total_productos = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "Total de productos: {$total_productos['total']}\n";
    


    // Valor total del inventario
    $stmt = $pdo->query("SELECT SUM(precio * stock) as valor_inventario FROM productos");
    $inventario = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "Valor del inventario: €" . number_format($inventario['valor_inventario'], 2) . "\n";
    



    // Precio promedio
    $stmt = $pdo->query("SELECT AVG(precio) as precio_promedio FROM productos");
    $promedio = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "Precio promedio: €" . number_format($promedio['precio_promedio'], 2) . "\n";
    



    // Stock total
    $stmt = $pdo->query("SELECT SUM(stock) as stock_total FROM productos");
    $stock = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "Stock total: {$stock['stock_total']} unidades\n";


    
    echo "\n";

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}
?>
