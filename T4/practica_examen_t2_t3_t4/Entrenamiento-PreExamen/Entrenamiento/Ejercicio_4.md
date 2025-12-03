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

## Parte B: Clase EstadisticasBiblioteca

Crea una clase que use el trait `Auditable`:

### Método librosDisponibles(): array
1. Obtén todos los libros: `SELECT * FROM libros`
2. Usa `array_filter()` para quedarte con los que tienen `disponibles > 0`
3. Registra la acción: "Consultados libros disponibles"
4. Devuelve el array filtrado

### Método sociosActivos(): array
1. Obtén todos los socios: `SELECT * FROM socios`
2. Filtra con PHP los que tienen `activo = true`
3. Registra la acción
4. Devuelve el resultado

### Método librosPopulares(int $limite = 3): array
1. Obtén todos los préstamos: `SELECT * FROM prestamos`
2. Cuenta cuántas veces aparece cada libro_id usando `foreach` y un array contador
3. Ordena el array de mayor a menor con `arsort()`
4. Devuelve los primeros $limite con `array_slice()`
5. Registra la acción

### Método prestamosPorMes(): array
1. Obtén todos los préstamos: `SELECT * FROM prestamos`
2. Agrupa por mes (formato "Y-m") usando `foreach`
3. Devuelve array asociativo: ['2025-11' => 4, '2025-10' => 2, ...]
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

// Clase EstadisticasBiblioteca
class EstadisticasBiblioteca {
    use Auditable;
    
    private PDO $pdo;
    
    public function __construct() {
        $this->pdo = conectar();
    }
    
    public function librosDisponibles(): array {
        $stmt = $this->pdo->query("SELECT * FROM libros");
        $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $disponibles = array_filter($libros, function($libro) {
            return $libro['disponibles'] > 0;
        });
        
        $this->registrar("Consultados libros disponibles");
        return $disponibles;
    }
    
    public function sociosActivos(): array {
        $stmt = $this->pdo->query("SELECT * FROM socios");
        $socios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $activos = array_filter($socios, function($socio) {
            return $socio['activo'] == 1;
        });
        
        $this->registrar("Consultados socios activos");
        return $activos;
    }
    
    public function librosPopulares(int $limite = 3): array {
        $stmt = $this->pdo->query("SELECT * FROM prestamos");
        $prestamos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Contar préstamos por libro
        $contador = [];
        foreach ($prestamos as $prestamo) {
            $libroId = $prestamo['libro_id'];
            if (!isset($contador[$libroId])) {
                $contador[$libroId] = 0;
            }
            $contador[$libroId]++;
        }
        
        // Ordenar de mayor a menor
        arsort($contador);
        
        // Obtener los primeros $limite
        $resultado = array_slice($contador, 0, $limite, true);
        
        $this->registrar("Consultados libros populares (top $limite)");
        return $resultado;
    }
    
    public function prestamosPorMes(): array {
        $stmt = $this->pdo->query("SELECT * FROM prestamos");
        $prestamos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $porMes = [];
        foreach ($prestamos as $prestamo) {
            $mes = date('Y-m', strtotime($prestamo['fecha_prestamo']));
            if (!isset($porMes[$mes])) {
                $porMes[$mes] = 0;
            }
            $porMes[$mes]++;
        }
        
        $this->registrar("Consultados préstamos por mes");
        return $porMes;
    }
}

// Prueba las estadísticas
echo "=== ESTADÍSTICAS DE LA BIBLIOTECA ===\n\n";

$stats = new EstadisticasBiblioteca();

// Libros disponibles
echo "1. Libros disponibles:\n";
$disponibles = $stats->librosDisponibles();
foreach ($disponibles as $libro) {
    echo "   - {$libro['titulo']} ({$libro['disponibles']} disponibles)\n";
}
echo "\n";

// Socios activos
echo "2. Socios activos:\n";
$activos = $stats->sociosActivos();
foreach ($activos as $socio) {
    echo "   - {$socio['nombre']} ({$socio['email']})\n";
}
echo "\n";

// Libros populares
echo "3. Top 3 libros más prestados:\n";
$populares = $stats->librosPopulares(3);
foreach ($populares as $libroId => $cantidad) {
    echo "   - Libro ID $libroId: $cantidad préstamos\n";
}
echo "\n";

// Préstamos por mes
echo "4. Préstamos por mes:\n";
$porMes = $stats->prestamosPorMes();
foreach ($porMes as $mes => $cantidad) {
    echo "   - $mes: $cantidad préstamos\n";
}
echo "\n";

// Mostrar registro de auditoría
echo "5. Registro de auditoría:\n";
foreach ($stats->getRegistros() as $registro) {
    echo "   $registro\n";
}
```
