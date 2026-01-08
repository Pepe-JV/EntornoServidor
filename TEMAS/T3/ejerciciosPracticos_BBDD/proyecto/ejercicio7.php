
<?php
/**
 * Ejercicio 7: Simulación de compra
 * Ejecutar: php ejercicio7.php
 */

echo "\n";
echo "EJERCICIO 7: Simulación de compra\n";
echo "\n";

$host = 'db';
$dbname = 'tienda_frutas';
$username = 'alumno';
$password = 'alumno';

try {

    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conectado a la base de datos 'tienda_frutas'\n\n";

    // Crear un nuevo pedido para un usuario
    echo "1. Creando nuevo pedido para usuario...\n";
    echo "-------------------------------------------\n";
    

    // Verificar si existe el usuario, si no, crearlo

    $usuario_id = 1;
    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE id = ?");
    $stmt->execute([$usuario_id]);
    
    if (!$stmt->fetch()) {

        echo "Creando usuario...\n";
        $stmt = $pdo->prepare("INSERT INTO usuarios (usuario_id, total) VALUES (?, ?)");
        $stmt->execute(['cliente1', 0]);
        $usuario_id = $pdo->lastInsertId();
        echo "Usuario creado con ID: $usuario_id\n\n";

    }

    // Crear el pedido
    $stmt = $pdo->prepare("INSERT INTO pedidos (usuario_id, total) VALUES (?, ?)");

    $stmt->execute([$usuario_id, 0]);

    $pedido_id = $pdo->lastInsertId();

    echo "Pedido creado con ID: $pedido_id\n\n";



    // Reducir el stock del producto
    echo "2. Reduciendo stock del producto...\n";
    echo "-------------------------------------------\n";
    
    $producto_id = 1;
    $cantidad = 5;
    

    // Verificar stock disponible
    $stmt = $pdo->prepare("SELECT nombre, precio, stock FROM productos WHERE id = ?");
    $stmt->execute([$producto_id]);
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$producto) {

        echo "Error: Producto no encontrado\n";
        exit(1);
    }
    
    echo "Producto: {$producto['nombre']}\n";
    echo "Stock actual: {$producto['stock']}\n";
    echo "Cantidad a comprar: $cantidad\n";
    
    if ($producto['stock'] < $cantidad) {

        echo "\nError: Stock insuficiente\n";
        echo "Stock disponible: {$producto['stock']}\n";
        echo "Cantidad solicitada: $cantidad\n";
        exit(1);

    }
    

    // Actualizar stock
    $stmt = $pdo->prepare("UPDATE productos SET stock = stock - ? WHERE id = ?");
    $stmt->execute([$cantidad, $producto_id]);
    
    $nuevo_stock = $producto['stock'] - $cantidad;
    echo "Nuevo stock: $nuevo_stock\n\n";


    // Calcular el total del pedido
    echo "3. Calculando total del pedido...\n";
    echo "-------------------------------------------\n";
    

    $total = $producto['precio'] * $cantidad;

    echo "Precio unitario: €{$producto['precio']}\n";
    echo "Cantidad: $cantidad\n";
    echo "Total: €" . number_format($total, 2) . "\n\n";


    // Actualizar el total del pedido

    $stmt = $pdo->prepare("UPDATE pedidos SET total = ? WHERE id = ?");
    $stmt->execute([$total, $pedido_id]);


    // Usar transacciones para garantizar consistencia

    echo "4. Validando transacción...\n";
    echo "-------------------------------------------\n";
    
    // Verificar que todo se guardó correctamente

    $stmt = $pdo->prepare("SELECT * FROM pedidos WHERE id = ?");
    $stmt->execute([$pedido_id]);
    $pedido = $stmt->fetch(PDO::FETCH_ASSOC);
    

    echo "Pedido ID: {$pedido['id']}\n";

    echo "Usuario ID: {$pedido['usuario_id']}\n";

    echo "Fecha: {$pedido['fecha']}\n";

    echo "Total: €" . number_format($pedido['total'], 2) . "\n";
    

    echo "\nCompra realizada correctamente\n\n";

    // Manejar errores con rollback si falla algo
    echo "5. Manejo de errores (simulación)...\n";
    echo "-------------------------------------------\n";
    
    $pdo->beginTransaction();
    
    try {

        // Simular una compra que falla
        $producto_id_invalido = 999;
        $stmt = $pdo->prepare("SELECT stock FROM productos WHERE id = ?");
        $stmt->execute([$producto_id_invalido]);
        $prod = $stmt->fetch(PDO::FETCH_ASSOC);
        

        if (!$prod) {
            throw new Exception("Producto no encontrado");
        }
        

        $pdo->commit();
        

    } catch (Exception $e) {

        $pdo->rollBack();
        echo "Transacción revertida: " . $e->getMessage() . "\n";
        echo "Los cambios no se aplicaron\n";
    }

    echo "\n";


} catch(PDOException $e) {

    echo "Error: " . $e->getMessage() . "\n";
    
    exit(1);
}
?>
