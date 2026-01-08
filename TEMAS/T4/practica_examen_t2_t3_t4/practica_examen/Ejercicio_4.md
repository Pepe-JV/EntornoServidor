# 📝 EJERCICIO 4: Trait y Estadísticas (25 min)

## Parte A: Trait Auditable

Crea un trait `Auditable` que permita registrar acciones:

### Propiedades:
- `array $registros = []`

### Métodos:
- `registrar(string $accion): void` - Añade "[Y-m-d H:i:s] $accion" al array
- `getRegistros(): array` - Devuelve todos los registros
- `limpiarRegistros(): void` - Vacía el array

---

## Parte B: Clase EstadisticasFruteria

Crea una clase que use el trait `Auditable`:

### Método productosDisponibles(): array
1. Obtén todos los productos: `SELECT * FROM productos`
2. Usa `array_filter()` para quedarte con los que tienen `stock > 0` y `activo = true`
3. Registra la acción: "Consultados productos disponibles"
4. Devuelve el array filtrado

### Método clientesRegistrados(): array
1. Obtén todos los clientes: `SELECT * FROM clientes`
2. Registra la acción
3. Devuelve el resultado

### Método productosPopulares(int $limite = 3): array
1. Obtén todos los detalles de pedidos: `SELECT * FROM detalles_pedido`
2. Cuenta cuántas veces aparece cada producto_id usando `foreach` y un array contador
3. Ordena el array de mayor a menor con `arsort()`
4. Devuelve los primeros $limite con `array_slice()`
5. Registra la acción

### Método ventasPorMes(): array
1. Obtén todos los pedidos: `SELECT * FROM pedidos`
2. Agrupa por mes (formato "Y-m") usando `foreach`
3. Suma los totales por mes
4. Devuelve array asociativo: ['2025-11' => 150.50, '2025-10' => 320.00, ...]
5. Registra la acción

### Método categoriasMasVendidas(): array
1. Obtén productos y categorías de la BD
2. Cuenta las ventas por categoría usando los detalles de pedidos
3. Devuelve array con nombre de categoría y cantidad vendida
4. Registra la acción

---

## Tu código:

```php
<?php
require_once 'conexion.php';

// Trait Auditable
trait Auditable {
    private array $registros = [];
    
    public function registrar(string $accion): void {
        $fecha = date('Y-m-d H:i:s');
        $this->registros[] = "[$fecha] $accion";
    }
    
    public function getRegistros(): array {
        return $this->registros;
    }
    
    public function limpiarRegistros(): void {
        $this->registros = [];
    }
}

// Clase EstadisticasFruteria
class EstadisticasFruteria {
    use Auditable;
    
    private PDO $pdo;
    
    public function __construct() {
        $this->pdo = conectar();
    }
    
    public function productosDisponibles(): array {
        $stmt = $this->pdo->query("SELECT * FROM productos");
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $disponibles = array_filter($productos, function($producto) {
            return $producto['stock'] > 0 && $producto['activo'] == 1;
        });
        
        $this->registrar("Consultados productos disponibles");
        return $disponibles;
    }
    
    public function clientesRegistrados(): array {
        $stmt = $this->pdo->query("SELECT * FROM clientes");
        $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $this->registrar("Consultados clientes registrados");
        return $clientes;
    }
    
    public function productosPopulares(int $limite = 3): array {
        $stmt = $this->pdo->query("SELECT * FROM detalles_pedido");
        $detalles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Contar ventas por producto
        $contador = [];
        foreach ($detalles as $detalle) {
            $productoId = $detalle['producto_id'];
            if (!isset($contador[$productoId])) {
                $contador[$productoId] = 0;
            }
            $contador[$productoId] += $detalle['cantidad'];
        }
        
        // Ordenar de mayor a menor
        arsort($contador);
        
        // Obtener los primeros $limite
        $resultado = array_slice($contador, 0, $limite, true);
        
        $this->registrar("Consultados productos populares (top $limite)");
        return $resultado;
    }
    
    public function ventasPorMes(): array {
        $stmt = $this->pdo->query("SELECT * FROM pedidos");
        $pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $porMes = [];
        foreach ($pedidos as $pedido) {
            $mes = date('Y-m', strtotime($pedido['fecha']));
            if (!isset($porMes[$mes])) {
                $porMes[$mes] = 0.0;
            }
            $porMes[$mes] += (float)$pedido['total'];
        }
        
        $this->registrar("Consultadas ventas por mes");
        return $porMes;
    }
    
    public function categoriasMasVendidas(): array {
        // Obtener categorías
        $stmt = $this->pdo->query("SELECT * FROM categorias");
        $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Obtener productos
        $stmt = $this->pdo->query("SELECT * FROM productos");
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Obtener detalles de pedidos
        $stmt = $this->pdo->query("SELECT * FROM detalles_pedido");
        $detalles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Crear mapa producto_id => categoria_id
        $productoCategoria = [];
        foreach ($productos as $producto) {
            $productoCategoria[$producto['id']] = $producto['categoria_id'];
        }
        
        // Contar ventas por categoría
        $ventasPorCategoria = [];
        foreach ($categorias as $categoria) {
            $ventasPorCategoria[$categoria['nombre']] = 0;
        }
        
        foreach ($detalles as $detalle) {
            $productoId = $detalle['producto_id'];
            if (isset($productoCategoria[$productoId])) {
                $categoriaId = $productoCategoria[$productoId];
                foreach ($categorias as $categoria) {
                    if ($categoria['id'] == $categoriaId) {
                        $ventasPorCategoria[$categoria['nombre']] += $detalle['cantidad'];
                        break;
                    }
                }
            }
        }
        
        $this->registrar("Consultadas categorías más vendidas");
        return $ventasPorCategoria;
    }
}

// Prueba las estadísticas
echo "=== ESTADÍSTICAS DE LA FRUTERÍA ===\n\n";

$stats = new EstadisticasFruteria();

// 1. Productos disponibles
echo "1. Productos disponibles:\n";
$disponibles = $stats->productosDisponibles();
foreach ($disponibles as $producto) {
    echo "   - {$producto['nombre']} (Stock: {$producto['stock']})\n";
}
echo "\n";

// 2. Clientes registrados
echo "2. Clientes registrados:\n";
$clientes = $stats->clientesRegistrados();
foreach ($clientes as $cliente) {
    echo "   - {$cliente['nombre']} ({$cliente['email']})\n";
}
echo "\n";

// 3. Productos populares
echo "3. Top 3 productos más vendidos:\n";
$populares = $stats->productosPopulares(3);
foreach ($populares as $productoId => $cantidad) {
    echo "   - Producto ID $productoId: $cantidad unidades vendidas\n";
}
echo "\n";

// 4. Ventas por mes
echo "4. Ventas por mes:\n";
$porMes = $stats->ventasPorMes();
foreach ($porMes as $mes => $total) {
    echo "   - $mes: €" . number_format($total, 2) . "\n";
}
echo "\n";

// 5. Categorías más vendidas
echo "5. Categorías más vendidas:\n";
$categorias = $stats->categoriasMasVendidas();
foreach ($categorias as $categoria => $cantidad) {
    echo "   - $categoria: $cantidad unidades\n";
}
echo "\n";

// 6. Mostrar registro de auditoría
echo "6. Registro de auditoría:\n";
foreach ($stats->getRegistros() as $registro) {
    echo "   $registro\n";
}
```
