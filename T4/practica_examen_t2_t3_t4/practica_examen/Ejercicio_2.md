# 📝 EJERCICIO 2: Jerarquía de Usuarios (30 min)

## Contexto
En la frutería hay diferentes tipos de usuarios: clientes regulares, clientes VIP y empleados.

---

## Parte A: Clase abstracta Usuario

Crea una clase abstracta `Usuario` con:

### Propiedades:
- `id`: int
- `nombre`: string
- `email`: string

### Métodos:
- Constructor que reciba los 3 parámetros
- `abstract getTipo(): string` - Devuelve el tipo de usuario
- `getInfoCompleta(): string` - Devuelve "[TIPO] Nombre (email)"

---

## Parte B: Clase Cliente

Extiende `Usuario` con:

### Propiedades adicionales:
- `fechaRegistro`: DateTime
- `puntos`: int (puntos de fidelidad)

### Métodos:
- `getTipo()`: devuelve "Cliente"
- `diasDesdeRegistro(): int` - Días desde el registro
- `agregarPuntos(int $puntos): void` - Suma puntos
- `canjearPuntos(int $puntos): bool` - Resta puntos si hay suficientes
- `guardar(): bool` - INSERT o UPDATE en tabla `clientes`
- `static buscarPorEmail(string $email): ?Cliente` - Busca por email

---

## Parte C: Clase ClienteVIP

Extiende `Cliente` con:

### Propiedades adicionales:
- `descuento`: int (porcentaje de descuento, default 15)

### Métodos:
- `getTipo()`: devuelve "Cliente VIP"
- `aplicarDescuento(float $precio): float` - Aplica el descuento al precio
- `esVIP(): bool` - Devuelve true

---

## Parte D: Clase Empleado

Extiende `Usuario` con:

### Propiedades adicionales:
- `puesto`: string (ej: "Cajero", "Reponedor", "Gerente")
- `salario`: float

### Métodos:
- `getTipo()`: devuelve "Empleado - {puesto}"
- `aumentarSalario(float $porcentaje): void` - Aumenta el salario
- `guardar(): bool` - Puede simular (no hay tabla)

---

## Tu código:

```php
<?php
require_once 'conexion.php';

// Usuario.php (abstracta)
abstract class Usuario {
    protected int $id;
    protected string $nombre;
    protected string $email;
    
    public function __construct(int $id, string $nombre, string $email) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
    }
    
    abstract public function getTipo(): string;
    
    public function getInfoCompleta(): string {
        return "[{$this->getTipo()}] {$this->nombre} ({$this->email})";
    }
}

// Cliente.php
class Cliente extends Usuario {
    protected DateTime $fechaRegistro;
    protected int $puntos;
    
    public function __construct(
        int $id,
        string $nombre,
        string $email,
        DateTime $fechaRegistro,
        int $puntos = 0
    ) {
        parent::__construct($id, $nombre, $email);
        $this->fechaRegistro = $fechaRegistro;
        $this->puntos = $puntos;
    }
    
    public function getTipo(): string {
        return "Cliente";
    }
    
    public function diasDesdeRegistro(): int {
        $ahora = new DateTime();
        $diff = $this->fechaRegistro->diff($ahora);
        return $diff->days;
    }
    
    public function agregarPuntos(int $puntos): void {
        $this->puntos += $puntos;
    }
    
    public function canjearPuntos(int $puntos): bool {
        if ($this->puntos >= $puntos) {
            $this->puntos -= $puntos;
            return true;
        }
        return false;
    }
    
    public function guardar(): bool {
        try {
            $pdo = conectar();
            
            // Verificar si existe
            $stmt = $pdo->prepare("SELECT id FROM clientes WHERE id = ?");
            $stmt->execute([$this->id]);
            $existe = $stmt->fetch();
            
            if ($existe) {
                // UPDATE
                $stmt = $pdo->prepare(
                    "UPDATE clientes SET nombre = ?, email = ?, fecha_registro = ? WHERE id = ?"
                );
                return $stmt->execute([
                    $this->nombre,
                    $this->email,
                    $this->fechaRegistro->format('Y-m-d H:i:s'),
                    $this->id
                ]);
            } else {
                // INSERT
                $stmt = $pdo->prepare(
                    "INSERT INTO clientes (id, nombre, email, fecha_registro) VALUES (?, ?, ?, ?)"
                );
                return $stmt->execute([
                    $this->id,
                    $this->nombre,
                    $this->email,
                    $this->fechaRegistro->format('Y-m-d H:i:s')
                ]);
            }
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function buscarPorEmail(string $email): ?Cliente {
        try {
            $pdo = conectar();
            $stmt = $pdo->prepare("SELECT * FROM clientes WHERE email = ?");
            $stmt->execute([$email]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$row) {
                return null;
            }
            
            return new Cliente(
                $row['id'],
                $row['nombre'],
                $row['email'],
                new DateTime($row['fecha_registro']),
                0 // Los puntos no están en la BD
            );
        } catch (PDOException $e) {
            return null;
        }
    }
}

// ClienteVIP.php
class ClienteVIP extends Cliente {
    private int $descuento;
    
    public function __construct(
        int $id,
        string $nombre,
        string $email,
        DateTime $fechaRegistro,
        int $puntos = 0,
        int $descuento = 15
    ) {
        parent::__construct($id, $nombre, $email, $fechaRegistro, $puntos);
        $this->descuento = $descuento;
    }
    
    public function getTipo(): string {
        return "Cliente VIP";
    }
    
    public function aplicarDescuento(float $precio): float {
        return $precio * (1 - $this->descuento / 100);
    }
    
    public function esVIP(): bool {
        return true;
    }
}

// Empleado.php
class Empleado extends Usuario {
    private string $puesto;
    private float $salario;
    
    public function __construct(
        int $id,
        string $nombre,
        string $email,
        string $puesto,
        float $salario
    ) {
        parent::__construct($id, $nombre, $email);
        $this->puesto = $puesto;
        $this->salario = $salario;
    }
    
    public function getTipo(): string {
        return "Empleado - {$this->puesto}";
    }
    
    public function aumentarSalario(float $porcentaje): void {
        $this->salario += $this->salario * ($porcentaje / 100);
    }
    
    public function guardar(): bool {
        // Simular guardado (no hay tabla)
        return true;
    }
}

// Pruebas
echo "=== TEST JERARQUÍA DE USUARIOS ===\n\n";

// Cliente regular
$cliente = new Cliente(10, "Ana Torres", "ana@example.com", new DateTime('2025-10-01'), 100);
echo $cliente->getInfoCompleta() . "\n";
echo "Días desde registro: {$cliente->diasDesdeRegistro()}\n";
$cliente->agregarPuntos(50);
echo "Puntos totales: 150\n\n";

// Cliente VIP
$clienteVIP = new ClienteVIP(11, "Pedro Ruiz", "pedro@example.com", new DateTime('2024-01-01'), 500, 20);
echo $clienteVIP->getInfoCompleta() . "\n";
$precioOriginal = 100.0;
$precioConDescuento = $clienteVIP->aplicarDescuento($precioOriginal);
echo "Precio original: €{$precioOriginal}\n";
echo "Precio con descuento: €{$precioConDescuento}\n\n";

// Empleado
$empleado = new Empleado(20, "Laura Gómez", "laura@fruteria.com", "Gerente", 2500.0);
echo $empleado->getInfoCompleta() . "\n";
$empleado->aumentarSalario(10);
echo "Salario aumentado un 10%\n";
```
