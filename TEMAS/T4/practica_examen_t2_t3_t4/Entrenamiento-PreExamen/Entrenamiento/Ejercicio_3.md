# 📝 EJERCICIO 3: Sistema de Préstamos con Interface (30 min)

## Parte A: Interface Prestable

Define una interface `Prestable` con los siguientes métodos:

```php
interface Prestable {
    public function registrarPrestamo(int $socioId, int $libroId): int;
    public function registrarDevolucion(int $prestamoId): bool;
    public function getPrestamosActivos(int $socioId): array;
    public function getHistorial(int $socioId): array;
}
```

---

## Parte B: Clase GestorPrestamos

Implementa la interface `Prestable`:

### Método registrarPrestamo():
1. Verifica que el libro tenga ejemplares disponibles (SELECT + comprobación PHP)
2. Usa una **transacción**:
   - INSERT en tabla `prestamos`
   - UPDATE en tabla `libros` para reducir `disponibles`
3. Si algo falla, rollback y lanzar excepción
4. Devuelve el ID del préstamo creado

### Método registrarDevolucion():
1. Busca el préstamo por ID
2. Usa una **transacción**:
   - UPDATE en `prestamos`: devuelto = TRUE, fecha_devolucion = HOY
   - UPDATE en `libros`: aumentar `disponibles`
3. Devuelve true si todo OK

### Método getPrestamosActivos():
1. SELECT * FROM prestamos WHERE socio_id = ? AND devuelto = FALSE
2. Devuelve array de préstamos

### Método getHistorial():
1. SELECT * FROM prestamos WHERE socio_id = ?
2. Devuelve todos los préstamos (activos y devueltos)

---

## Parte C: Probar el sistema

Crea un archivo `test_prestamos.php` que:
1. Cree una instancia de GestorPrestamos
2. Registre un préstamo del libro ID 5 al socio ID 2
3. Muestre los préstamos activos del socio 2
4. Registre la devolución del préstamo
5. Muestre el historial completo

---

## Tu código:

```php
<?php
require_once 'conexion.php';

// Interface Prestable
interface Prestable {
    public function registrarPrestamo(int $socioId, int $libroId): int;
    public function registrarDevolucion(int $prestamoId): bool;
    public function getPrestamosActivos(int $socioId): array;
    public function getHistorial(int $socioId): array;
}

// Clase GestorPrestamos
class GestorPrestamos implements Prestable {
    private PDO $pdo;
    
    public function __construct() {
        $this->pdo = conectar();
    }
    
    public function registrarPrestamo(int $socioId, int $libroId): int {
        try {
            // Verificar disponibilidad
            $stmt = $this->pdo->prepare("SELECT disponibles FROM libros WHERE id = ?");
            $stmt->execute([$libroId]);
            $libro = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$libro || $libro['disponibles'] <= 0) {
                throw new Exception("No hay ejemplares disponibles");
            }
            
            // Iniciar transacción
            $this->pdo->beginTransaction();
            
            try {
                // INSERT en prestamos
                $stmt = $this->pdo->prepare(
                    "INSERT INTO prestamos (socio_id, libro_id, fecha_prestamo, devuelto) 
                     VALUES (?, ?, CURRENT_DATE, FALSE)"
                );
                $stmt->execute([$socioId, $libroId]);
                $prestamoId = (int)$this->pdo->lastInsertId();
                
                // UPDATE en libros
                $stmt = $this->pdo->prepare(
                    "UPDATE libros SET disponibles = disponibles - 1 WHERE id = ?"
                );
                $stmt->execute([$libroId]);
                
                $this->pdo->commit();
                return $prestamoId;
            } catch (Exception $e) {
                $this->pdo->rollBack();
                throw $e;
            }
        } catch (Exception $e) {
            throw new Exception("Error al registrar préstamo: " . $e->getMessage());
        }
    }
    
    public function registrarDevolucion(int $prestamoId): bool {
        try {
            // Buscar el préstamo
            $stmt = $this->pdo->prepare("SELECT libro_id FROM prestamos WHERE id = ?");
            $stmt->execute([$prestamoId]);
            $prestamo = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$prestamo) {
                return false;
            }
            
            // Iniciar transacción
            $this->pdo->beginTransaction();
            
            try {
                // UPDATE en prestamos
                $stmt = $this->pdo->prepare(
                    "UPDATE prestamos SET devuelto = TRUE, fecha_devolucion = CURRENT_DATE 
                     WHERE id = ?"
                );
                $stmt->execute([$prestamoId]);
                
                // UPDATE en libros
                $stmt = $this->pdo->prepare(
                    "UPDATE libros SET disponibles = disponibles + 1 WHERE id = ?"
                );
                $stmt->execute([$prestamo['libro_id']]);
                
                $this->pdo->commit();
                return true;
            } catch (Exception $e) {
                $this->pdo->rollBack();
                throw $e;
            }
        } catch (Exception $e) {
            return false;
        }
    }
    
    public function getPrestamosActivos(int $socioId): array {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM prestamos WHERE socio_id = ? AND devuelto = FALSE"
        );
        $stmt->execute([$socioId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getHistorial(int $socioId): array {
        $stmt = $this->pdo->prepare("SELECT * FROM prestamos WHERE socio_id = ?");
        $stmt->execute([$socioId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

// test_prestamos.php
echo "=== SISTEMA DE PRÉSTAMOS ===\n\n";

$gestor = new GestorPrestamos();

// 1. Registrar un préstamo
echo "1. Registrando préstamo del libro ID 5 al socio ID 2...\n";
try {
    $prestamoId = $gestor->registrarPrestamo(2, 5);
    echo "✅ Préstamo registrado con ID: $prestamoId\n\n";
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n\n";
}

// 2. Mostrar préstamos activos
echo "2. Préstamos activos del socio 2:\n";
$activos = $gestor->getPrestamosActivos(2);
foreach ($activos as $prestamo) {
    echo "   - Préstamo #{$prestamo['id']}: Libro {$prestamo['libro_id']} (Fecha: {$prestamo['fecha_prestamo']})\n";
}
echo "\n";

// 3. Registrar devolución
if (!empty($activos)) {
    $idParaDevolver = $activos[0]['id'];
    echo "3. Registrando devolución del préstamo #$idParaDevolver...\n";
    if ($gestor->registrarDevolucion($idParaDevolver)) {
        echo "✅ Devolución registrada correctamente\n\n";
    } else {
        echo "❌ Error al registrar devolución\n\n";
    }
}

// 4. Mostrar historial completo
echo "4. Historial completo del socio 2:\n";
$historial = $gestor->getHistorial(2);
foreach ($historial as $prestamo) {
    $estado = $prestamo['devuelto'] ? "Devuelto" : "Activo";
    echo "   - Préstamo #{$prestamo['id']}: Libro {$prestamo['libro_id']} - $estado\n";
}
```
