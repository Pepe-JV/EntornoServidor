
<?php
/**
 * Ejercicio 2: Insertar datos iniciales
 * Ejecutar desde terminal: php ejercicio2.php
 *
 */

echo "\n";
echo "EJERCICIO 2: Insertar datos iniciales\n";
echo "\n";

$host = 'db';
$dbname = 'tienda_frutas';
$username = 'alumno';
$password = 'alumno';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conectado a la base de datos 'tienda_frutas'\n\n";

    // Verificar si ya hay datos
    $count = $pdo->query("SELECT COUNT(*) FROM categorias")->fetchColumn();

    if ($count > 0) {
        echo "Los datos ya fueron insertados previamente\n";
        echo "Total de categorías existentes: $count\n\n";

        $countProd = $pdo->query("SELECT COUNT(*) FROM productos")->fetchColumn();
        echo "Total de productos existentes: $countProd\n\n";
        exit(0);
    }

    echo "Insertando categorías...\n";



    // Insertar categorías usando INSERT múltiple
    $pdo->exec("
        INSERT INTO categorias (nombre, descripcion) VALUES 
        ('Cítricos', 'Frutas ácidas ricas en vitamina C'),
        ('Frutas Rojas', 'Frutas de color rojo, ricas en antioxidantes'),
        ('Tropicales', 'Frutas exóticas de climas cálidos'),
        ('De Hueso', 'Frutas con semilla grande central'),
        ('De Pepita', 'Frutas con múltiples semillas pequeñas')
    ");
    echo "5 categorías insertadas correctamente\n\n";

    echo "Insertando productos...\n";

    // Insertar productos usando INSERT múltiple
    $pdo->exec("
        INSERT INTO productos (nombre, categoria_id, precio, stock) VALUES 
        ('Naranja', 1, 2.50, 150),
        ('Limón', 1, 1.80, 200),
        ('Mandarina', 1, 3.20, 100),
        ('Fresa', 2, 4.50, 80),
        ('Frambuesa', 2, 5.20, 60),
        ('Mango', 3, 3.80, 90),
        ('Piña', 3, 4.00, 70),
        ('Melocotón', 4, 3.50, 120),
        ('Ciruela', 4, 2.90, 110),
        ('Manzana', 5, 2.20, 180)
    ");
    echo "10 productos insertados correctamente\n\n";

    // Mostrar datos insertados
    echo "CATEGORÍAS INSERTADAS:\n";
    echo "-------------------------------------------\n";
    printf("%-4s %-20s %-40s\n", "ID", "NOMBRE", "DESCRIPCIÓN");
    echo "──────────────────────────────────────────────────────────────\n";

    $categorias = $pdo->query("SELECT * FROM categorias")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($categorias as $cat) {
        printf("%-4d %-20s %-40s\n", $cat['id'], $cat['nombre'], substr($cat['descripcion'], 0, 37) . '...');
    }



    echo "\nPRODUCTOS INSERTADOS:\n";
    echo "-------------------------------------------\n";
    printf("%-4s %-20s %-20s %-10s %-10s\n", "ID", "NOMBRE", "CATEGORÍA", "PRECIO", "STOCK");
    echo "──────────────────────────────────────────────────────────────\n";

    $productos = $pdo->query("
        SELECT p.*, c.nombre as categoria 
        FROM productos p 
        JOIN categorias c ON p.categoria_id = c.id
        ORDER BY p.id

    ")->fetchAll(PDO::FETCH_ASSOC);

    foreach ($productos as $prod) {
        printf("%-4d %-20s %-20s €%-9.2f %-10d\n",
            $prod['id'],
            $prod['nombre'],
            $prod['categoria'],
            $prod['precio'],
            $prod['stock']
        );
    }



    echo "\nDatos insertados correctamente\n\n";

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}

