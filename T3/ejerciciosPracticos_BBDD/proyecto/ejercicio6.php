
<?php
/**
 * Ejercicio 6: DELETE - Eliminar productos
 * Ejecutar: php ejercicio6.php
 */

echo "\n";
echo "EJERCICIO 6: DELETE - Eliminar productos\n";
echo "\n";

$host = 'db';
$dbname = 'tienda_frutas';
$username = 'alumno';

$password = 'alumno';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conectado a la base de datos 'tienda_frutas'\n\n";


    // Mostrar productos actuales
    echo "PRODUCTOS ACTUALES:\n";
    echo "-------------------------------------------\n";

    $stmt = $pdo->query("SELECT p.id, p.nombre, p.precio, p.stock, c.nombre as categoria 
                         FROM productos p 
                         JOIN categorias c ON p.categoria_id = c.id 
                         ORDER BY p.id");

    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    printf("%-4s %-20s %-15s %-10s %-10s\n", "ID", "NOMBRE", "CATEGORIA", "PRECIO", "STOCK");
    echo "-------------------------------------------\n";
    foreach ($productos as $prod) {

        printf("%-4d %-20s %-15s €%-9.2f %-10d\n", 
            $prod['id'], 
            $prod['nombre'], 
            $prod['categoria'], 
            $prod['precio'], 
            $prod['stock']
        );

    }

    // Eliminar productos con stock menor a 2
    echo "\n\nEliminando productos con stock menor a 2...\n";
    


    $stmt = $pdo->query("SELECT * FROM productos WHERE stock < 2");
    $eliminados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($eliminados) > 0) {

        echo "Productos a eliminar:\n";
        foreach ($eliminados as $prod) {
            echo "  - {$prod['nombre']} (Stock: {$prod['stock']})\n";

        }
        
        $stmt = $pdo->prepare("DELETE FROM productos WHERE stock < 2");
        $stmt->execute();
        
        echo "\n" . count($eliminados) . " producto(s) eliminado(s)\n";

    } else {

        echo "No hay productos con stock menor a 2\n";
    }

    // Mostrar productos después de la eliminación
    echo "\n\nPRODUCTOS DESPUÉS DE LA ELIMINACIÓN:\n";
    echo "-------------------------------------------\n";

    $stmt = $pdo->query("SELECT p.id, p.nombre, p.precio, p.stock, c.nombre as categoria 
                         FROM productos p 
                         JOIN categorias c ON p.categoria_id = c.id 
                         ORDER BY p.id");

    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    printf("%-4s %-20s %-15s %-10s %-10s\n", "ID", "NOMBRE", "CATEGORIA", "PRECIO", "STOCK");
    echo "-------------------------------------------\n";

    foreach ($productos as $prod) {

        printf("%-4d %-20s %-15s €%-9.2f %-10d\n", 

            $prod['id'], 
            $prod['nombre'], 
            $prod['categoria'], 
            $prod['precio'], 
            $prod['stock']

        );
    }

    echo "\n";

} catch(PDOException $e) {

    echo "Error: " . $e->getMessage() . "\n";
    
    exit(1);
}
?>
