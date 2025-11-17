#!/usr/bin/env php
<?php
/**
 * Ejercicio 4: JOIN - Productos con categoría
 * Ejecutar desde terminal: php ejercicio4.php
 *
 * Escribe una consulta que obtenga el nombre del producto, su precio
 * y el nombre de su categoría. Usa INNER JOIN.
 * Luego, ordena los resultados por nombre de categoría y dentro de cada categoría por precio.
 */

echo "\n";
echo "╔═══════════════════════════════════════════════════════════════╗\n";
echo "║         EJERCICIO 4: JOIN - Productos con categoría         ║\n";
echo "╚═══════════════════════════════════════════════════════════════╝\n";
echo "\n";

$host = 'db';
$dbname = 'tienda_frutas';
$username = 'alumno';
$password = 'alumno';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "🔄 Conectado a la base de datos 'tienda_frutas'\n\n";

    echo "📝 Consulta SQL:\n";
    echo "───────────────────────────────────────────────────────────────\n";
    echo "SELECT p.nombre, p.precio, c.nombre as categoria\n";
    echo "FROM productos p\n";
    echo "INNER JOIN categorias c ON p.categoria_id = c.id\n";
    echo "ORDER BY c.nombre, p.precio\n\n";

    $stmt = $pdo->query("
        SELECT p.nombre, p.precio, c.nombre as categoria 
        FROM productos p 
        INNER JOIN categorias c ON p.categoria_id = c.id 
        ORDER BY c.nombre, p.precio
    ");
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "═══════════════════════════════════════════════════════════════\n";
    echo "PRODUCTOS CON CATEGORÍA (Ordenados por categoría y precio)\n";
    echo "═══════════════════════════════════════════════════════════════\n";
    printf("%-20s %-20s %-10s\n", "PRODUCTO", "CATEGORÍA", "PRECIO");
    echo "───────────────────────────────────────────────────────────────\n";

    $categoria_actual = '';
    foreach ($productos as $prod) {
        // Mostrar separador cuando cambia la categoría
        if ($categoria_actual != $prod['categoria']) {
            if ($categoria_actual != '') {
                echo "···························································\n";
            }
            $categoria_actual = $prod['categoria'];
        }

        printf("%-20s %-20s €%-9.2f\n",
            $prod['nombre'],
            $prod['categoria'],
            $prod['precio']
        );
    }

    echo "\n💡 Nota: Los productos están agrupados por categoría y\n";
    echo "   ordenados por precio dentro de cada categoría\n";

    echo "\n";
    echo "╔═══════════════════════════════════════════════════════════════╗\n";
    echo "║  ✅ JOIN ejecutado correctamente                             ║\n";
    echo "╚═══════════════════════════════════════════════════════════════╝\n";
    echo "\n";
    echo "➡️  Siguiente paso: php ejercicio5.php\n\n";

} catch(PDOException $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    exit(1);
}
?>
