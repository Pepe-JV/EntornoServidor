# 📝 EJERCICIO 2: Jerarquía de Personas (30 min)

## Contexto
En la biblioteca hay diferentes tipos de personas: socios normales, socios premium y bibliotecarios.

---

## Parte A: Clase abstracta Persona

Crea una clase abstracta `Persona` con:

### Propiedades:
- `id`: int
- `nombre`: string
- `email`: string

### Métodos:
- Constructor que reciba los 3 parámetros
- `abstract getRol(): string` - Devuelve el rol de la persona
- `getInfoCompleta(): string` - Devuelve "[ROL] Nombre (email)"

---

## Parte B: Clase Socio

Extiende `Persona` con:

### Propiedades adicionales:
- `fechaAlta`: DateTime
- `activo`: bool

### Métodos:
- `getRol()`: devuelve "Socio"
- `antiguedad(): int` - Meses desde la fecha de alta
- `estaActivo(): bool` - Getter del estado
- `darDeBaja(): void` - Pone activo a false
- `guardar(): bool` - INSERT o UPDATE en tabla `socios`
- `static buscarPorEmail(string $email): ?Socio` - Busca por email

---

## Parte C: Clase SocioPremium

Extiende `Socio` con:

### Propiedades adicionales:
- `limiteLibros`: int (máximo de libros simultáneos, default 10)

### Métodos:
- `getRol()`: devuelve "Socio Premium"
- `puedePrestar(int $librosActuales): bool` - True si librosActuales < limiteLibros

---

## Parte D: Clase Bibliotecario

Extiende `Persona` con:

### Propiedades adicionales:
- `seccion`: string (ej: "Infantil", "Adultos", "Consulta")

### Métodos:
- `getRol()`: devuelve "Bibliotecario - {seccion}"
- `guardar(): bool` - Puede simular (no hay tabla)

---

## Tu código:

```php
<?php
require_once 'conexion.php';

// Persona.php (abstracta)
abstract class Persona {
    protected int $id;
    protected string $nombre;
    protected string $email;
    
    public function __construct(int $id, string $nombre, string $email) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
    }
    
    abstract public function getRol(): string;
    
    public function getInfoCompleta(): string {
        return "[{$this->getRol()}] {$this->nombre} ({$this->email})";
    }
}

// Socio.php
class Socio extends Persona {
    protected DateTime $fechaAlta;
    protected bool $activo;
    
    public function __construct(
        int $id,
        string $nombre,
        string $email,
        DateTime $fechaAlta,
        bool $activo = true
    ) {
        parent::__construct($id, $nombre, $email);
        $this->fechaAlta = $fechaAlta;
        $this->activo = $activo;
    }
    
    public function getRol(): string {
        return "Socio";
    }
    
    public function antiguedad(): int {
        $ahora = new DateTime();
        $diff = $this->fechaAlta->diff($ahora);
        return ($diff->y * 12) + $diff->m;
    }
    
    public function estaActivo(): bool {
        return $this->activo;
    }
    
    public function darDeBaja(): void {
        $this->activo = false;
    }
    
    public function guardar(): bool {
        try {
            $pdo = conectar();
            
            // Verificar si existe
            $stmt = $pdo->prepare("SELECT id FROM socios WHERE id = ?");
            $stmt->execute([$this->id]);
            $existe = $stmt->fetch();
            
            if ($existe) {
                // UPDATE
                $stmt = $pdo->prepare(
                    "UPDATE socios SET nombre = ?, email = ?, fecha_alta = ?, activo = ? WHERE id = ?"
                );
                return $stmt->execute([
                    $this->nombre,
                    $this->email,
                    $this->fechaAlta->format('Y-m-d'),
                    $this->activo ? 1 : 0,
                    $this->id
                ]);
            } else {
                // INSERT
                $stmt = $pdo->prepare(
                    "INSERT INTO socios (id, nombre, email, fecha_alta, activo) VALUES (?, ?, ?, ?, ?)"
                );
                return $stmt->execute([
                    $this->id,
                    $this->nombre,
                    $this->email,
                    $this->fechaAlta->format('Y-m-d'),
                    $this->activo ? 1 : 0
                ]);
            }
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function buscarPorEmail(string $email): ?Socio {
        try {
            $pdo = conectar();
            $stmt = $pdo->prepare("SELECT * FROM socios WHERE email = ?");
            $stmt->execute([$email]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$row) {
                return null;
            }
            
            return new Socio(
                $row['id'],
                $row['nombre'],
                $row['email'],
                new DateTime($row['fecha_alta']),
                (bool)$row['activo']
            );
        } catch (PDOException $e) {
            return null;
        }
    }
}

// SocioPremium.php
class SocioPremium extends Socio {
    private int $limiteLibros;
    
    public function __construct(
        int $id,
        string $nombre,
        string $email,
        DateTime $fechaAlta,
        bool $activo = true,
        int $limiteLibros = 10
    ) {
        parent::__construct($id, $nombre, $email, $fechaAlta, $activo);
        $this->limiteLibros = $limiteLibros;
    }
    
    public function getRol(): string {
        return "Socio Premium";
    }
    
    public function puedePrestar(int $librosActuales): bool {
        return $librosActuales < $this->limiteLibros;
    }
}

// Bibliotecario.php
class Bibliotecario extends Persona {
    private string $seccion;
    
    public function __construct(
        int $id,
        string $nombre,
        string $email,
        string $seccion
    ) {
        parent::__construct($id, $nombre, $email);
        $this->seccion = $seccion;
    }
    
    public function getRol(): string {
        return "Bibliotecario - {$this->seccion}";
    }
    
    public function guardar(): bool {
        // Simular guardado (no hay tabla)
        return true;
    }
}
```
