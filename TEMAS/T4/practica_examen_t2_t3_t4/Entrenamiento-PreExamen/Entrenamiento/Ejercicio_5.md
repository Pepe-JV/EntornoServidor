# 📝 EJERCICIO 5: Gestión de Inventario (15 min)

## Clase GestorInventario

Crea una clase para gestionar el inventario de la biblioteca:

### Método librosAgotados(): array
1. `SELECT * FROM libros`
2. Filtra con PHP los que tienen `disponibles = 0`
3. Devuelve el array

### Método librosPocoStock(int $minimo = 2): array
1. `SELECT * FROM libros`
2. Filtra con PHP los que tienen `disponibles < $minimo`
3. Devuelve el array

### Método agregarEjemplares(int $libroId, int $cantidad): bool
1. `SELECT * FROM libros WHERE id = ?`
2. Calcula nuevos valores: ejemplares + cantidad, disponibles + cantidad
3. `UPDATE libros SET ejemplares = ?, disponibles = ? WHERE id = ?`
4. Devuelve true si OK

### Método librosPorGenero(): array
1. `SELECT * FROM generos`
2. `SELECT * FROM libros`
3. Agrupa con PHP: para cada género, cuenta cuántos libros hay
4. Devuelve: `['Novela' => 5, 'Cuento' => 2, ...]`

### Método buscarPorAutor(string $nombreAutor): array
1. `SELECT * FROM autores`
2. Busca el autor que contenga $nombreAutor (usa `stripos()`)
3. `SELECT * FROM libros WHERE autor_id = ?`
4. Devuelve los libros de ese autor

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
    
    public function librosAgotados(): array {
        $stmt = $this->pdo->query("SELECT * FROM libros");
        $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return array_filter($libros, function($libro) {
            return $libro['disponibles'] == 0;
        });
    }
    
    public function librosPocoStock(int $minimo = 2): array {
        $stmt = $this->pdo->query("SELECT * FROM libros");
        $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return array_filter($libros, function($libro) use ($minimo) {
            return $libro['disponibles'] < $minimo;
        });
    }
    
    public function agregarEjemplares(int $libroId, int $cantidad): bool {
        try {
            // Obtener datos actuales
            $stmt = $this->pdo->prepare("SELECT * FROM libros WHERE id = ?");
            $stmt->execute([$libroId]);
            $libro = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$libro) {
                return false;
            }
            
            // Calcular nuevos valores
            $nuevosEjemplares = $libro['ejemplares'] + $cantidad;
            $nuevosDisponibles = $libro['disponibles'] + $cantidad;
            
            // Actualizar
            $stmt = $this->pdo->prepare(
                "UPDATE libros SET ejemplares = ?, disponibles = ? WHERE id = ?"
            );
            return $stmt->execute([$nuevosEjemplares, $nuevosDisponibles, $libroId]);
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public function librosPorGenero(): array {
        // Obtener géneros
        $stmt = $this->pdo->query("SELECT * FROM generos");
        $generos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Obtener libros
        $stmt = $this->pdo->query("SELECT * FROM libros");
        $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Agrupar por género
        $resultado = [];
        foreach ($generos as $genero) {
            $resultado[$genero['nombre']] = 0;
        }
        
        foreach ($libros as $libro) {
            foreach ($generos as $genero) {
                if ($genero['id'] == $libro['genero_id']) {
                    $resultado[$genero['nombre']]++;
                    break;
                }
            }
        }
        
        return $resultado;
    }
    
    public function buscarPorAutor(string $nombreAutor): array {
        // Buscar autor
        $stmt = $this->pdo->query("SELECT * FROM autores");
        $autores = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $autorId = null;
        foreach ($autores as $autor) {
            if (stripos($autor['nombre'], $nombreAutor) !== false) {
                $autorId = $autor['id'];
                break;
            }
        }
        
        if ($autorId === null) {
            return [];
        }
        
        // Buscar libros del autor
        $stmt = $this->pdo->prepare("SELECT * FROM libros WHERE autor_id = ?");
        $stmt->execute([$autorId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

// Pruebas
echo "=== GESTIÓN DE INVENTARIO ===\n\n";

$gestor = new GestorInventario();

// 1. Libros agotados
echo "1. Libros agotados:\n";
$agotados = $gestor->librosAgotados();
if (empty($agotados)) {
    echo "   ✅ No hay libros agotados\n";
} else {
    foreach ($agotados as $libro) {
        echo "   - {$libro['titulo']}\n";
    }
}
echo "\n";

// 2. Libros con poco stock
echo "2. Libros con poco stock (menos de 2):\n";
$pocoStock = $gestor->librosPocoStock(2);
foreach ($pocoStock as $libro) {
    echo "   - {$libro['titulo']} ({$libro['disponibles']} disponibles)\n";
}
echo "\n";

// 3. Agregar ejemplares
echo "3. Agregando 3 ejemplares al libro ID 7...\n";
if ($gestor->agregarEjemplares(7, 3)) {
    echo "   ✅ Ejemplares agregados correctamente\n";
} else {
    echo "   ❌ Error al agregar ejemplares\n";
}
echo "\n";

// 4. Libros por género
echo "4. Libros por género:\n";
$porGenero = $gestor->librosPorGenero();
foreach ($porGenero as $genero => $cantidad) {
    echo "   - $genero: $cantidad libros\n";
}
echo "\n";

// 5. Buscar por autor
echo "5. Libros de Gabriel García Márquez:\n";
$libros = $gestor->buscarPorAutor("García Márquez");
foreach ($libros as $libro) {
    echo "   - {$libro['titulo']}\n";
}
```
