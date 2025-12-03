# 📝 EJERCICIO 1: Conexión y Clase Libro (20 min)

## Parte A: Conexión PDO

Crea un archivo `conexion.php` con una función `conectar()` que:
- Devuelva un objeto PDO conectado a la base de datos `biblioteca`
- Configure el modo de errores como excepciones
- Use charset `utf8mb4`
- Maneje errores con try-catch

**Credenciales:**
- Host: `localhost`
- Puerto: `3307`
- BD: `biblioteca`
- Usuario: `estudiante`
- Password: `estudiante123`

---

## Parte B: Clase Libro

Crea la clase `Libro` con:

### Propiedades (usa Property Hooks donde tenga sentido):
- `id`: int (solo lectura)
- `titulo`: string (sin espacios al inicio/final)
- `autorId`: int
- `generoId`: int
- `isbn`: string
- `ejemplares`: int (mínimo 0)
- `disponibles`: int (mínimo 0, máximo = ejemplares)

### Métodos:
- `estaDisponible(): bool` - True si disponibles > 0
- `prestar(): bool` - Reduce disponibles en 1 si hay stock
- `devolver(): bool` - Aumenta disponibles en 1 (sin pasar de ejemplares)
- `toArray(): array` - Devuelve array asociativo con todas las propiedades

### Métodos estáticos:
- `buscarPorId(int $id): ?Libro` - Busca un libro por ID en la BD
- `buscarTodos(): array` - Devuelve todos los libros como objetos Libro

---

## Tu código:

```php
<?php
// conexion.php
function conectar(): PDO {
    try {
        $host = '127.0.0.1';
        $port = '3307';
        $dbname = 'biblioteca';
        $user = 'estudiante';
        $password = 'estudiante123';
        
        $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
        
        $pdo = new PDO($dsn, $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        
        return $pdo;
    } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }
}

// Libro.php
class Libro {
    // Propiedades con Property Hooks (PHP 8.4+)
    public private(set) int $id;
    
    public string $titulo {
        set {
            $this->titulo = trim($value);
        }
    }
    
    public int $autorId;
    public int $generoId;
    public string $isbn;
    
    private int $_ejemplares;
    public int $ejemplares {
        get => $this->_ejemplares;
        set {
            $this->_ejemplares = max(0, $value);
        }
    }
    
    private int $_disponibles;
    public int $disponibles {
        get => $this->_disponibles;
        set {
            $this->_disponibles = max(0, min($value, $this->_ejemplares));
        }
    }
    
    public function __construct(
        int $id,
        string $titulo,
        int $autorId,
        int $generoId,
        string $isbn,
        int $ejemplares,
        int $disponibles
    ) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->autorId = $autorId;
        $this->generoId = $generoId;
        $this->isbn = $isbn;
        $this->ejemplares = $ejemplares;
        $this->disponibles = $disponibles;
    }
    
    public function estaDisponible(): bool {
        return $this->disponibles > 0;
    }
    
    public function prestar(): bool {
        if ($this->disponibles > 0) {
            $this->disponibles--;
            return true;
        }
        return false;
    }
    
    public function devolver(): bool {
        if ($this->disponibles < $this->ejemplares) {
            $this->disponibles++;
            return true;
        }
        return false;
    }
    
    public function toArray(): array {
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'autorId' => $this->autorId,
            'generoId' => $this->generoId,
            'isbn' => $this->isbn,
            'ejemplares' => $this->ejemplares,
            'disponibles' => $this->disponibles
        ];
    }
    
    public static function buscarPorId(int $id): ?Libro {
        try {
            $pdo = conectar();
            $stmt = $pdo->prepare("SELECT * FROM libros WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$row) {
                return null;
            }
            
            return new Libro(
                $row['id'],
                $row['titulo'],
                $row['autor_id'],
                $row['genero_id'],
                $row['isbn'],
                $row['ejemplares'],
                $row['disponibles']
            );
        } catch (PDOException $e) {
            return null;
        }
    }
    
    public static function buscarTodos(): array {
        try {
            $pdo = conectar();
            $stmt = $pdo->query("SELECT * FROM libros");
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $libros = [];
            foreach ($rows as $row) {
                $libros[] = new Libro(
                    $row['id'],
                    $row['titulo'],
                    $row['autor_id'],
                    $row['genero_id'],
                    $row['isbn'],
                    $row['ejemplares'],
                    $row['disponibles']
                );
            }
            
            return $libros;
        } catch (PDOException $e) {
            return [];
        }
    }
}
```
