#!/usr/bin/env php
<?php
/**
 * Desafío Extra: Sistema completo
 * Ejecutar: php ejercicioExtra.php
 * 
 */

echo "\n";
echo "DESAFÍO EXTRA: Sistema completo de tienda online\n";
echo "\n";

$host = 'db';
$dbname = 'tienda_frutas';
$username = 'alumno';
$password = 'alumno';

class TiendaOnline {
    private $pdo;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    
    // Gestión de productos (CRUD completo)
    public function crearProducto($nombre, $categoria_id, $precio, $stock) {
        try {
            $stmt = $this->pdo->prepare("
                INSERT INTO productos (nombre, categoria_id, precio, stock) 
                VALUES (?, ?, ?, ?)
            ");
            $stmt->execute([$nombre, $categoria_id, $precio, $stock]);
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Error al crear producto: " . $e->getMessage());
        }
    }
    
    public function obtenerProducto($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM productos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function actualizarProducto($id, $nombre, $precio, $stock) {
        $stmt = $this->pdo->prepare("
            UPDATE productos 
            SET nombre = ?, precio = ?, stock = ? 
            WHERE id = ?
        ");
        return $stmt->execute([$nombre, $precio, $stock, $id]);
    }
    
    public function eliminarProducto($id) {
        $stmt = $this->pdo->prepare("DELETE FROM productos WHERE id = ?");
        return $stmt->execute([$id]);
    }
    
    // Gestión de usuarios y autenticación
    public function crearUsuario($usuario_id) {
        $stmt = $this->pdo->prepare("
            INSERT INTO usuarios (usuario_id, total) 
            VALUES (?, 0)
        ");
        $stmt->execute([$usuario_id]);
        return $this->pdo->lastInsertId();
    }
    
    public function obtenerUsuario($usuario_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE usuario_id = ?");
        $stmt->execute([$usuario_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    // Carrito de compras con transacciones
    public function procesarCompra($usuario_id, $carrito) {
        try {
            $this->pdo->beginTransaction();
            
            // Verificar que el usuario existe
            $usuario = $this->obtenerUsuario($usuario_id);
            if (!$usuario) {
                $id_usuario = $this->crearUsuario($usuario_id);
            } else {
                $id_usuario = $usuario['id'];
            }
            
            // Crear el pedido
            $stmt = $this->pdo->prepare("
                INSERT INTO pedidos (usuario_id, total) 
                VALUES (?, 0)
            ");
            $stmt->execute([$id_usuario]);
            $pedido_id = $this->pdo->lastInsertId();
            
            $total = 0;
            
            // Procesar cada item del carrito
            foreach ($carrito as $item) {
                $producto_id = $item['producto_id'];
                $cantidad = $item['cantidad'];
                
                // Verificar stock
                $producto = $this->obtenerProducto($producto_id);
                if (!$producto) {
                    throw new Exception("Producto {$producto_id} no encontrado");
                }
                
                if ($producto['stock'] < $cantidad) {
                    throw new Exception("Stock insuficiente para {$producto['nombre']}");
                }
                
                // Reducir stock
                $stmt = $this->pdo->prepare("
                    UPDATE productos 
                    SET stock = stock - ? 
                    WHERE id = ?
                ");
                $stmt->execute([$cantidad, $producto_id]);
                
                // Calcular subtotal
                $subtotal = $producto['precio'] * $cantidad;
                $total += $subtotal;
            }
            
            // Actualizar total del pedido
            $stmt = $this->pdo->prepare("
                UPDATE pedidos 
                SET total = ? 
                WHERE id = ?
            ");
            $stmt->execute([$total, $pedido_id]);
            
            $this->pdo->commit();
            
            return [
                'pedido_id' => $pedido_id,
                'total' => $total,
                'items' => count($carrito)
            ];
            
        } catch (Exception $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }
    
    // Reportes de ventas y estadísticas
    public function obtenerEstadisticas() {
        $stats = [];
        
        // Total de productos
        $stmt = $this->pdo->query("SELECT COUNT(*) as total FROM productos");
        $stats['total_productos'] = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
        
        // Valor del inventario
        $stmt = $this->pdo->query("SELECT SUM(precio * stock) as valor FROM productos");
        $stats['valor_inventario'] = $stmt->fetch(PDO::FETCH_ASSOC)['valor'];
        
        // Total de pedidos
        $stmt = $this->pdo->query("SELECT COUNT(*) as total FROM pedidos");
        $stats['total_pedidos'] = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
        
        // Ingresos totales
        $stmt = $this->pdo->query("SELECT SUM(total) as ingresos FROM pedidos");
        $stats['ingresos_totales'] = $stmt->fetch(PDO::FETCH_ASSOC)['ingresos'];
        
        return $stats;
    }
    
    public function obtenerProductosMasVendidos($limite = 5) {
        // Simulación basada en stock vendido
        $stmt = $this->pdo->prepare("
            SELECT p.nombre, c.nombre as categoria, p.precio, p.stock
            FROM productos p
            JOIN categorias c ON p.categoria_id = c.id
            ORDER BY p.stock ASC
            LIMIT ?
        ");
        $stmt->execute([$limite]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Conectado a la base de datos\n\n";
    
    $tienda = new TiendaOnline($pdo);
    
    // Demostración del sistema
    echo "1. GESTIÓN DE PRODUCTOS\n";
    echo "===========================================\n";
    
    // Crear un nuevo producto
    echo "Creando nuevo producto...\n";
    try {
        $nuevo_id = $tienda->crearProducto('Kiwi', 3, 3.50, 100);
        echo "Producto creado con ID: $nuevo_id\n";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
    
    // Leer producto
    $producto = $tienda->obtenerProducto(1);
    echo "Producto obtenido: {$producto['nombre']} - €{$producto['precio']}\n";
    
    // Actualizar producto
    $tienda->actualizarProducto($nuevo_id, 'Kiwi Premium', 4.00, 100);
    echo "Producto actualizado\n\n";
    
    // Gestión de usuarios y autenticación
    echo "2. GESTIÓN DE USUARIOS\n";
    echo "===========================================\n";
    
    $usuario = $tienda->obtenerUsuario('cliente2');
    if (!$usuario) {
        $usuario_id = $tienda->crearUsuario('cliente2');
        echo "Usuario 'cliente2' creado con ID: $usuario_id\n";
    } else {
        echo "Usuario 'cliente2' ya existe\n";
    }
    echo "\n";
    
    // Carrito de compras con transacciones
    echo "3. PROCESAMIENTO DE COMPRA\n";
    echo "===========================================\n";
    
    $carrito = [
        ['producto_id' => 1, 'cantidad' => 3],
        ['producto_id' => 2, 'cantidad' => 2]
    ];
    
    echo "Procesando compra...\n";
    echo "Items en el carrito: " . count($carrito) . "\n";
    
    try {
        $resultado = $tienda->procesarCompra('cliente2', $carrito);
        echo "Compra procesada correctamente\n";
        echo "Pedido ID: {$resultado['pedido_id']}\n";
        echo "Total: €" . number_format($resultado['total'], 2) . "\n";
        echo "Items: {$resultado['items']}\n";
    } catch (Exception $e) {
        echo "Error en la compra: " . $e->getMessage() . "\n";
    }
    echo "\n";
    
    // Reportes de ventas y estadísticas
    echo "4. REPORTES Y ESTADÍSTICAS\n";
    echo "===========================================\n";
    
    $stats = $tienda->obtenerEstadisticas();
    echo "Total de productos: {$stats['total_productos']}\n";
    echo "Valor del inventario: €" . number_format($stats['valor_inventario'], 2) . "\n";
    echo "Total de pedidos: {$stats['total_pedidos']}\n";
    echo "Ingresos totales: €" . number_format($stats['ingresos_totales'] ?? 0, 2) . "\n";
    echo "\n";
    
    echo "Productos más vendidos:\n";
    $masVendidos = $tienda->obtenerProductosMasVendidos(3);
    foreach ($masVendidos as $prod) {
        echo "  - {$prod['nombre']} ({$prod['categoria']}): €{$prod['precio']}\n";
    }
    echo "\n";
    
    // Manejo robusto de errores
    echo "5. PRUEBA DE MANEJO DE ERRORES\n";
    echo "===========================================\n";
    
    try {
        echo "Intentando compra con stock insuficiente...\n";
        $carrito_invalido = [
            ['producto_id' => 1, 'cantidad' => 9999]
        ];
        $tienda->procesarCompra('cliente2', $carrito_invalido);
    } catch (Exception $e) {
        echo "Error capturado correctamente: " . $e->getMessage() . "\n";
        echo "Transacción revertida\n";
    }
    
    echo "\n";
    echo "Sistema completo implementado correctamente\n\n";
    
} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage() . "\n";
    exit(1);
}
?>
