# 📝 EJERCICIO 1: Conexión y Clase Producto (20 min)

## Parte A: Conexión PDO

Crea un archivo `conexion.php` con una función `conectar()` que:
- Devuelva un objeto PDO conectado a la base de datos `fruteria`
- Configure el modo de errores como excepciones
- Use charset `utf8mb4`
- Maneje errores con try-catch

**Credenciales:**
- Host: `localhost`
- Puerto: `3306`
- BD: `fruteria`
- Usuario: `alumno`
- Password: `alumno123`

---

## Parte B: Clase Producto

Crea la clase `Producto` con:

### Propiedades (usa Property Hooks donde tenga sentido):
- `id`: int (solo lectura)
- `nombre`: string (sin espacios al inicio/final)
- `categoriaId`: int
- `precio`: float (mínimo 0)
- `stock`: int (mínimo 0)
- `activo`: bool

### Métodos:
- `estaDisponible(): bool` - True si stock > 0 y activo = true
- `reducirStock(int $cantidad): bool` - Reduce stock si hay suficiente
- `aumentarStock(int $cantidad): void` - Aumenta el stock
- `toArray(): array` - Devuelve array asociativo con todas las propiedades

### Métodos estáticos:
- `buscarPorId(int $id): ?Producto` - Busca un producto por ID en la BD
- `buscarTodos(): array` - Devuelve todos los productos como objetos Producto

---

## Tu código:

```php
<?php
// conexion.php
function conectar(): PDO {
    try {
        $host = 'localhost';
        $port = '3306';
        $dbname = 'fruteria';
        $user = 'alumno';
        $password = 'alumno123';
        
        $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
        
        $pdo = new PDO($dsn, $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        
        return $pdo;
    } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }
}

// Producto.php
class Producto {
    // Propiedades con Property Hooks (PHP 8.4+)
    public private(set) int $id;
    
    public string $nombre {
        set {
            $this->nombre = trim($value);
        }
    }
    
    public int $categoriaId;
    
    private float $_precio;
    public float $precio {
        get => $this->_precio;
        set {
            $this->_precio = max(0, $value);
        }
    }
    
    private int $_stock;
    public int $stock {
        get => $this->_stock;
        set {
            $this->_stock = max(0, $value);
        }
    }
    
    public bool $activo;
    
    public function __construct(
        int $id,
        string $nombre,
        int $categoriaId,
        float $precio,
        int $stock,
        bool $activo = true
    ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->categoriaId = $categoriaId;
        $this->precio = $precio;
        $this->stock = $stock;
        $this->activo = $activo;
    }
    
    public function estaDisponible(): bool {
        return $this->stock > 0 && $this->activo;
    }
    
    public function reducirStock(int $cantidad): bool {
        if ($this->stock >= $cantidad) {
            $this->stock -= $cantidad;
            return true;
        }
        return false;
    }
    
    public function aumentarStock(int $cantidad): void {
        $this->stock += $cantidad;
    }
    
    public function toArray(): array {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'categoriaId' => $this->categoriaId,
            'precio' => $this->precio,
            'stock' => $this->stock,
            'activo' => $this->activo
        ];
    }
    
    public static function buscarPorId(int $id): ?Producto {
        try {
            $pdo = conectar();
            $stmt = $pdo->prepare("SELECT * FROM productos WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$row) {
                return null;
            }
            
            return new Producto(
                $row['id'],
                $row['nombre'],
                $row['categoria_id'],
                (float)$row['precio'],
                $row['stock'],
                (bool)$row['activo']
            );
        } catch (PDOException $e) {
            return null;
        }
    }
    
    public static function buscarTodos(): array {
        try {
            $pdo = conectar();
            $stmt = $pdo->query("SELECT * FROM productos");
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $productos = [];
            foreach ($rows as $row) {
                $productos[] = new Producto(
                    $row['id'],
                    $row['nombre'],
                    $row['categoria_id'],
                    (float)$row['precio'],
                    $row['stock'],
                    (bool)$row['activo']
                );
            }
            
            return $productos;
        } catch (PDOException $e) {
            return [];
        }
    }
}

// Prueba
echo "=== TEST CLASE PRODUCTO ===\n\n";

// Buscar producto por ID
$producto = Producto::buscarPorId(1);
if ($producto) {
    echo "Producto encontrado: {$producto->nombre}\n";
    echo "Precio: €{$producto->precio}\n";
    echo "Stock: {$producto->stock}\n";
    echo "Disponible: " . ($producto->estaDisponible() ? "Sí" : "No") . "\n\n";
}

// Reducir stock
echo "Reduciendo 5 unidades...\n";
if ($producto->reducirStock(5)) {
    echo "✅ Stock reducido. Nuevo stock: {$producto->stock}\n\n";
}

// Listar todos los productos
echo "Todos los productos:\n";
$productos = Producto::buscarTodos();
foreach ($productos as $p) {
    echo "- {$p->nombre} (€{$p->precio}) - Stock: {$p->stock}\n";
}
```
