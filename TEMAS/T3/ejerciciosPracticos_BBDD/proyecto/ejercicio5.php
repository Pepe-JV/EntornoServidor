
<?php
/**
 * Ejercicio 5: UPDATE - Cambiar precios
 * Ejecutar desde terminal: php ejercicio5.php [opcion]
 *
 */

$host = 'db';
$dbname = 'tienda_frutas';
$username = 'alumno';
$password = 'alumno';


function mostrarMenu($pdo) {
    echo "\n";
    echo "EJERCICIO 5: UPDATE - Cambiar precios\n";
    echo "\n";
    echo "USO:\n";
    echo "  php ejercicio5.php aumentar <categoria>\n";
    echo "  php ejercicio5.php reducir <producto_id> <cantidad>\n\n";

    echo "CATEGORÍAS DISPONIBLES:\n";
    echo "-------------------------------------------\n";
    $cats = $pdo->query("SELECT * FROM categorias")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($cats as $cat) {
        echo "  - {$cat['nombre']}\n";
    }


    echo "\nPRODUCTOS DISPONIBLES:\n";
    echo "-------------------------------------------\n";
    printf("%-4s %-20s %-10s %-10s\n", "ID", "NOMBRE", "STOCK", "PRECIO");
    echo "-------------------------------------------\n";
    $prods = $pdo->query("SELECT * FROM productos ORDER BY id")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($prods as $prod) {
        printf("%-4d %-20s %-10d €%-9.2f\n",
            $prod['id'],
            $prod['nombre'],
            $prod['stock'],
            $prod['precio']
        );
    }
    echo "\n";
}


function aumentarPrecios($pdo, $categoria) {
    echo "\n";
    echo "a) AUMENTAR PRECIOS 10% - Categoría: $categoria\n";
    echo "-------------------------------------------\n";


    // Verificar que la categoría existe
    $stmt = $pdo->prepare("SELECT id FROM categorias WHERE nombre = ?");
    $stmt->execute([$categoria]);
    if (!$stmt->fetch()) {
        echo "Error: La categoría '$categoria' no existe\n\n";
        return;
    }


    // Obtener productos antes del cambio
    $stmt = $pdo->prepare("
        SELECT p.* FROM productos p 
        INNER JOIN categorias c ON p.categoria_id = c.id 
        WHERE c.nombre = ?

    ");
    $stmt->execute([$categoria]);
    $antes = $stmt->fetchAll(PDO::FETCH_ASSOC);



    if (count($antes) == 0) {
        echo "No hay productos en la categoría '$categoria'\n\n";
        return;

    }

    echo "\nPRECIOS ANTES DEL CAMBIO:\n";
    printf("%-20s %-15s\n", "PRODUCTO", "PRECIO ACTUAL");

    echo "-------------------------------------------\n";
    foreach ($antes as $prod) {

        printf("%-20s €%-9.2f\n", $prod['nombre'], $prod['precio']);
    }

    // Aumentar precios en un 10%
    $stmt = $pdo->prepare("
        UPDATE productos p 

        INNER JOIN categorias c ON p.categoria_id = c.id 
        SET p.precio = p.precio * 1.10 

        WHERE c.nombre = ?
    ");
    $stmt->execute([$categoria]);

    // Obtener productos después del cambio
    $stmt = $pdo->prepare("
        SELECT p.* FROM productos p 

        INNER JOIN categorias c ON p.categoria_id = c.id 
        WHERE c.nombre = ?

    ");
    $stmt->execute([$categoria]);

    $despues = $stmt->fetchAll(PDO::FETCH_ASSOC);


    echo "\nPRECIOS DESPUÉS DEL CAMBIO (+10%):\n";

    printf("%-20s %-15s %-15s %-10s\n", "PRODUCTO", "PRECIO ANTERIOR", "PRECIO NUEVO", "AUMENTO");
    echo "-------------------------------------------\n";
    for ($i = 0; $i < count($antes); $i++) {

        $aumento = $despues[$i]['precio'] - $antes[$i]['precio'];
        printf("%-20s €%-14.2f €%-14.2f +€%.2f\n",

            $antes[$i]['nombre'],
            $antes[$i]['precio'],
            $despues[$i]['precio'],


            $aumento
        );
    }

    echo "\nPrecios actualizados correctamente\n\n";
}

function reducirStock($pdo, $producto_id, $cantidad) {

    echo "\n";
    echo "b) y c) REDUCIR STOCK con validación\n";

    echo "-------------------------------------------\n";

    // Verificar stock actual
    $stmt = $pdo->prepare("SELECT nombre, stock FROM productos WHERE id = ?");
    $stmt->execute([$producto_id]);
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);


    if (!$producto) {
        echo "Error: No existe un producto con ID $producto_id\n\n";
        return;
    }

    echo "\nPRODUCTO: {$producto['nombre']}\n";
    echo "Stock actual: {$producto['stock']} unidades\n";
    echo "Cantidad a restar: $cantidad unidades\n";



    // c) Validar que el stock no sea negativo
    if ($producto['stock'] < $cantidad) {

        echo "\nError: Stock insuficiente\n";
        echo "Stock disponible: {$producto['stock']} unidades\n";
        echo "Cantidad solicitada: $cantidad unidades\n\n";
        return;

    }

    // b) Reducir stock
    $stmt = $pdo->prepare("UPDATE productos SET stock = stock - ? WHERE id = ?");
    $stmt->execute([$cantidad, $producto_id]);

    $nuevo_stock = $producto['stock'] - $cantidad;

    echo "\nStock actualizado correctamente\n";

    echo "Stock anterior: {$producto['stock']} unidades\n";
    echo "Stock nuevo: $nuevo_stock unidades\n";
    echo "Reducción: -$cantidad unidades\n";

    if ($nuevo_stock < 20) {

        echo "\nAlerta: Stock bajo (menos de 20 unidades)\n";
    }

    echo "\n";
}

try {

    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($argc < 2) {

        mostrarMenu($pdo);

        exit(0);
    }

    $accion = $argv[1];

    switch ($accion) {
        case 'aumentar':
            if ($argc < 3) {
                echo "Error: Debes especificar la categoría\n";
                echo "Uso: php ejercicio5.php aumentar <categoria>\n\n";
                exit(1);
            }
            aumentarPrecios($pdo, $argv[2]);
            break;

        case 'reducir':
            if ($argc < 4) {
                echo "Error: Debes especificar el producto_id y la cantidad\n";
                echo "Uso: php ejercicio5.php reducir <producto_id> <cantidad>\n\n";
                exit(1);
                
            }
            reducirStock($pdo, $argv[2], $argv[3]);
            break;

        default:
            echo "Error: Acción no válida '$accion'\n";
            mostrarMenu($pdo);
            exit(1);
    }

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}

