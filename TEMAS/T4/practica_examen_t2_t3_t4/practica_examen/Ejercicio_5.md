# 📝 EJERCICIO 5: Gestión de Inventario y Análisis (15 min)

## Clase GestorInventario

Crea una clase para gestionar el inventario de la frutería:

### Método productosAgotados(): array
1. `SELECT * FROM productos`
2. Filtra con PHP los que tienen `stock = 0`
3. Devuelve el array

### Método productosBajoStock(int $minimo = 30): array
1. `SELECT * FROM productos`
2. Filtra con PHP los que tienen `stock < $minimo`
3. Devuelve el array

### Método reabastecer(int $productoId, int $cantidad): bool
1. `SELECT * FROM productos WHERE id = ?`
2. Calcula nuevo stock: stock actual + cantidad
3. `UPDATE productos SET stock = ? WHERE id = ?`
4. Devuelve true si OK

### Método productosPorCategoria(): array
1. `SELECT * FROM categorias`
2. `SELECT * FROM productos`
3. Agrupa con PHP: para cada categoría, cuenta cuántos productos hay
4. Devuelve: `['Cítricos' => 4, 'Frutas Rojas' => 3, ...]`

### Método productosMasCaros(int $limite = 3): array
1. `SELECT * FROM productos`
2. Ordena por precio descendente usando `usort()`
3. Devuelve los primeros $limite con `array_slice()`

### Método valorInventario(): float
1. `SELECT * FROM productos`
2. Calcula el valor total: SUM(precio * stock) usando PHP
3. Devuelve el total

### Método desactivarProducto(int $productoId): bool
1. `UPDATE productos SET activo = FALSE WHERE id = ?`
2. Devuelve true si OK

---

## Tu código:

```php
<?php
require_once 'conexion.php';

// Clase GestorInventario
class GestorInventario {
    private PDO $pdo;
    
    public function __construct() {
        $this->pdo = conectar();
    }
    
    public function productosAgotados(): array {
        $stmt = $this->pdo->query("SELECT * FROM productos");
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return array_filter($productos, function($producto) {
            return $producto['stock'] == 0;
        });
    }
    
    public function productosBajoStock(int $minimo = 30): array {
        $stmt = $this->pdo->query("SELECT * FROM productos");
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return array_filter($productos, function($producto) use ($minimo) {
            return $producto['stock'] < $minimo;
        });
    }
    
    public function reabastecer(int $productoId, int $cantidad): bool {
        try {
            // Obtener stock actual
            $stmt = $this->pdo->prepare("SELECT stock FROM productos WHERE id = ?");
            $stmt->execute([$productoId]);
            $producto = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$producto) {
                return false;
            }
            
            // Calcular nuevo stock
            $nuevoStock = $producto['stock'] + $cantidad;
            
            // Actualizar
            $stmt = $this->pdo->prepare(
                "UPDATE productos SET stock = ? WHERE id = ?"
            );
            return $stmt->execute([$nuevoStock, $productoId]);
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public function productosPorCategoria(): array {
        // Obtener categorías
        $stmt = $this->pdo->query("SELECT * FROM categorias");
        $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Obtener productos
        $stmt = $this->pdo->query("SELECT * FROM productos");
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Agrupar por categoría
        $resultado = [];
        foreach ($categorias as $categoria) {
            $resultado[$categoria['nombre']] = 0;
        }
        
        foreach ($productos as $producto) {
            foreach ($categorias as $categoria) {
                if ($categoria['id'] == $producto['categoria_id']) {
                    $resultado[$categoria['nombre']]++;
                    break;
                }
            }
        }
        
        return $resultado;
    }
    
    public function productosMasCaros(int $limite = 3): array {
        $stmt = $this->pdo->query("SELECT * FROM productos");
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Ordenar por precio descendente
        usort($productos, function($a, $b) {
            return $b['precio'] <=> $a['precio'];
        });
        
        // Devolver los primeros $limite
        return array_slice($productos, 0, $limite);
    }
    
    public function valorInventario(): float {
        $stmt = $this->pdo->query("SELECT * FROM productos");
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $total = 0.0;
        foreach ($productos as $producto) {
            $total += (float)$producto['precio'] * $producto['stock'];
        }
        
        return $total;
    }
    
    public function desactivarProducto(int $productoId): bool {
        try {
            $stmt = $this->pdo->prepare(
                "UPDATE productos SET activo = FALSE WHERE id = ?"
            );
            return $stmt->execute([$productoId]);
        } catch (PDOException $e) {
            return false;
        }
    }
}

// Pruebas
echo "=== GESTIÓN DE INVENTARIO ===\n\n";

$gestor = new GestorInventario();

// 1. Productos agotados
echo "1. Productos agotados:\n";
$agotados = $gestor->productosAgotados();
if (empty($agotados)) {
    echo "   ✅ No hay productos agotados\n";
} else {
    foreach ($agotados as $producto) {
        echo "   - {$producto['nombre']}\n";
    }
}
echo "\n";

// 2. Productos con bajo stock
echo "2. Productos con bajo stock (menos de 30):\n";
$bajoStock = $gestor->productosBajoStock(30);
foreach ($bajoStock as $producto) {
    echo "   - {$producto['nombre']} (Stock: {$producto['stock']})\n";
}
echo "\n";

// 3. Reabastecer producto
echo "3. Reabasteciendo Arándanos (ID 7) con 50 unidades...\n";
if ($gestor->reabastecer(7, 50)) {
    echo "   ✅ Producto reabastecido correctamente\n";
} else {
    echo "   ❌ Error al reabastecer\n";
}
echo "\n";

// 4. Productos por categoría
echo "4. Productos por categoría:\n";
$porCategoria = $gestor->productosPorCategoria();
foreach ($porCategoria as $categoria => $cantidad) {
    echo "   - $categoria: $cantidad productos\n";
}
echo "\n";

// 5. Productos más caros
echo "5. Top 3 productos más caros:\n";
$masCaros = $gestor->productosMasCaros(3);
foreach ($masCaros as $producto) {
    echo "   - {$producto['nombre']}: €{$producto['precio']}\n";
}
echo "\n";

// 6. Valor del inventario
echo "6. Valor total del inventario:\n";
$valorTotal = $gestor->valorInventario();
echo "   €" . number_format($valorTotal, 2) . "\n\n";

// 7. Desactivar producto
echo "7. Desactivando producto ID 3...\n";
if ($gestor->desactivarProducto(3)) {
    echo "   ✅ Producto desactivado\n";
} else {
    echo "   ❌ Error al desactivar\n";
}
```
