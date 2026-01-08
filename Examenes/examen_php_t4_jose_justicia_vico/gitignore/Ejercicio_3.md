# 📝 EJERCICIO 3: Sistema de Pedidos con Interface (30 min)

## Parte A: Interface Pedible

Define una interface `Pedible` con los siguientes métodos:

```php
interface Pedible {
    public function crearPedido(int $clienteId, array $productos): int;
    public function agregarDetalle(int $pedidoId, int $productoId, int $cantidad): bool;
    public function calcularTotal(int $pedidoId): float;
    public function cambiarEstado(int $pedidoId, string $nuevoEstado): bool;
    public function obtenerPedidosCliente(int $clienteId): array;
}
```

---

## Parte B: Clase GestorPedidos

Implementa la interface `Pedible`:

### Método crearPedido():
1. Crea un nuevo pedido con total = 0.0 y estado = 'pendiente'
2. Usa una **transacción**:
   - INSERT en tabla `pedidos`
   - Para cada producto en el array: INSERT en `detalles_pedido` y UPDATE stock
3. Calcula el total final y actualiza el pedido
4. Devuelve el ID del pedido creado

**Formato del array $productos:**
```php
[
    ['producto_id' => 1, 'cantidad' => 3],
    ['producto_id' => 5, 'cantidad' => 2]
]
```

### Método agregarDetalle():
1. Verifica que el producto tenga stock suficiente
2. Usa una **transacción**:
   - INSERT en `detalles_pedido`
   - UPDATE en `productos` para reducir stock
   - Recalcula y actualiza el total del pedido
3. Devuelve true si todo OK

### Método calcularTotal():
1. SELECT SUM(cantidad * precio_unitario) FROM detalles_pedido WHERE pedido_id = ?
2. Devuelve el total calculado

### Método cambiarEstado():
1. UPDATE pedidos SET estado = ? WHERE id = ?
2. Estados válidos: 'pendiente', 'procesado', 'enviado', 'entregado'
3. Devuelve true si OK

### Método obtenerPedidosCliente():
1. SELECT * FROM pedidos WHERE cliente_id = ?
2. Devuelve array de pedidos

---

## Tu código:

```php
<?php
require_once 'conexion.php';

// Interface Pedible
interface Pedible {
    public function crearPedido(int $clienteId, array $productos): int;
    public function agregarDetalle(int $pedidoId, int $productoId, int $cantidad): bool;
    public function calcularTotal(int $pedidoId): float;
    public function cambiarEstado(int $pedidoId, string $nuevoEstado): bool;
    public function obtenerPedidosCliente(int $clienteId): array;
}

// Clase GestorPedidos
class GestorPedidos implements Pedible {
    private PDO $pdo;
    
    public function __construct() {
        $this->pdo = conectar();
    }
    
    public function crearPedido(int $clienteId, array $productos): int {
        try {
            $this->pdo->beginTransaction();
            
            // Crear pedido inicial
            $stmt = $this->pdo->prepare(
                "INSERT INTO pedidos (cliente_id, total, estado) VALUES (?, 0.0, 'pendiente')"
            );
            $stmt->execute([$clienteId]);
            $pedidoId = (int)$this->pdo->lastInsertId();
            
            // Agregar detalles
            foreach ($productos as $item) {
                $productoId = $item['producto_id'];
                $cantidad = $item['cantidad'];
                
                // Obtener precio y verificar stock
                $stmt = $this->pdo->prepare("SELECT precio, stock FROM productos WHERE id = ?");
                $stmt->execute([$productoId]);
                $producto = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if (!$producto || $producto['stock'] < $cantidad) {
                    throw new Exception("Stock insuficiente para producto ID $productoId");
                }
                
                // Insertar detalle
                $stmt = $this->pdo->prepare(
                    "INSERT INTO detalles_pedido (pedido_id, producto_id, cantidad, precio_unitario) 
                     VALUES (?, ?, ?, ?)"
                );
                $stmt->execute([$pedidoId, $productoId, $cantidad, $producto['precio']]);
                
                // Reducir stock
                $stmt = $this->pdo->prepare(
                    "UPDATE productos SET stock = stock - ? WHERE id = ?"
                );
                $stmt->execute([$cantidad, $productoId]);
            }
            
            // Calcular y actualizar total
            $total = $this->calcularTotal($pedidoId);
            $stmt = $this->pdo->prepare("UPDATE pedidos SET total = ? WHERE id = ?");
            $stmt->execute([$total, $pedidoId]);
            
            $this->pdo->commit();
            return $pedidoId;
        } catch (Exception $e) {
            $this->pdo->rollBack();
            throw new Exception("Error al crear pedido: " . $e->getMessage());
        }
    }
    
    public function agregarDetalle(int $pedidoId, int $productoId, int $cantidad): bool {
        try {
            // Verificar stock
            $stmt = $this->pdo->prepare("SELECT precio, stock FROM productos WHERE id = ?");
            $stmt->execute([$productoId]);
            $producto = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$producto || $producto['stock'] < $cantidad) {
                return false;
            }
            
            $this->pdo->beginTransaction();
            
            // Insertar detalle
            $stmt = $this->pdo->prepare(
                "INSERT INTO detalles_pedido (pedido_id, producto_id, cantidad, precio_unitario) 
                 VALUES (?, ?, ?, ?)"
            );
            $stmt->execute([$pedidoId, $productoId, $cantidad, $producto['precio']]);
            
            // Reducir stock
            $stmt = $this->pdo->prepare(
                "UPDATE productos SET stock = stock - ? WHERE id = ?"
            );
            $stmt->execute([$cantidad, $productoId]);
            
            // Actualizar total del pedido
            $total = $this->calcularTotal($pedidoId);
            $stmt = $this->pdo->prepare("UPDATE pedidos SET total = ? WHERE id = ?");
            $stmt->execute([$total, $pedidoId]);
            
            $this->pdo->commit();
            return true;
        } catch (Exception $e) {
            $this->pdo->rollBack();
            return false;
        }
    }
    
    public function calcularTotal(int $pedidoId): float {
        $stmt = $this->pdo->prepare(
            "SELECT SUM(cantidad * precio_unitario) as total 
             FROM detalles_pedido 
             WHERE pedido_id = ?"
        );
        $stmt->execute([$pedidoId]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return (float)($resultado['total'] ?? 0.0);
    }
    
    public function cambiarEstado(int $pedidoId, string $nuevoEstado): bool {
        $estadosValidos = ['pendiente', 'procesado', 'enviado', 'entregado'];
        
        if (!in_array($nuevoEstado, $estadosValidos)) {
            return false;
        }
        
        try {
            $stmt = $this->pdo->prepare("UPDATE pedidos SET estado = ? WHERE id = ?");
            return $stmt->execute([$nuevoEstado, $pedidoId]);
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public function obtenerPedidosCliente(int $clienteId): array {
        $stmt = $this->pdo->prepare("SELECT * FROM pedidos WHERE cliente_id = ?");
        $stmt->execute([$clienteId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

// test_pedidos.php
echo "=== SISTEMA DE PEDIDOS ===\n\n";

$gestor = new GestorPedidos();

// 1. Crear un pedido
echo "1. Creando pedido para cliente ID 1...\n";
try {
    $productos = [
        ['producto_id' => 1, 'cantidad' => 3],  // 3 Naranjas
        ['producto_id' => 5, 'cantidad' => 2],  // 2 Fresas
        ['producto_id' => 10, 'cantidad' => 5]  // 5 Plátanos
    ];
    
    $pedidoId = $gestor->crearPedido(1, $productos);
    echo "✅ Pedido creado con ID: $pedidoId\n";
    
    $total = $gestor->calcularTotal($pedidoId);
    echo "   Total del pedido: €" . number_format($total, 2) . "\n\n";
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n\n";
}

// 2. Agregar un producto al pedido
echo "2. Agregando producto al pedido...\n";
if ($gestor->agregarDetalle($pedidoId, 8, 1)) {  // 1 Piña
    echo "✅ Producto agregado\n";
    $total = $gestor->calcularTotal($pedidoId);
    echo "   Nuevo total: €" . number_format($total, 2) . "\n\n";
} else {
    echo "❌ Error al agregar producto\n\n";
}

// 3. Cambiar estado del pedido
echo "3. Cambiando estado a 'procesado'...\n";
if ($gestor->cambiarEstado($pedidoId, 'procesado')) {
    echo "✅ Estado actualizado\n\n";
} else {
    echo "❌ Error al cambiar estado\n\n";
}

// 4. Obtener pedidos del cliente
echo "4. Pedidos del cliente 1:\n";
$pedidos = $gestor->obtenerPedidosCliente(1);
foreach ($pedidos as $pedido) {
    echo "   - Pedido #{$pedido['id']}: €{$pedido['total']} - Estado: {$pedido['estado']}\n";
}
```
