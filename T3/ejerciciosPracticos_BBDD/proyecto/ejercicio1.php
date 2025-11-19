
<?php
/**
 * Ejercicio 1: Crear la BD de Tienda de Frutas
 * Ejecutar desde terminal: php ejercicio1.php
 *
 * Crea una base de datos llamada "tienda_frutas" con las siguientes tablas:
 * - categorias (id, nombre, descripcion)
 * - productos (id, nombre, categoria_id, precio, stock)
 * - usuarios (id, usuario_id, fecha, total)
 * - pedidos (id, usuario_id, fecha, total)
 */

echo "\n";
echo "EJERCICIO 1: Crear la BD de Tienda de Frutas\n";
echo "\n";

$host = 'db';
$username = 'alumno';
$password = 'alumno';

try {
    echo "Conectando al servidor de base de datos...\n";

    // Conexión sin especificar base de datos para poder crearla
    $pdo = new PDO("mysql:host=$host;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conexión establecida\n\n";
    echo "Iniciando proceso de creación...\n\n";

    // Crear la base de datos si no existe
    $pdo->exec("CREATE DATABASE IF NOT EXISTS tienda_frutas");
    echo "Base de datos 'tienda_frutas' creada correctamente\n";

    // Usar la base de datos
    $pdo->exec("USE tienda_frutas");

    // Crear tabla categorias
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS categorias (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(100) NOT NULL,
            descripcion TEXT
        )
    ");
    echo "Tabla 'categorias' creada (id, nombre, descripcion)\n";

    // Crear tabla productos
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS productos (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(100) NOT NULL,
            categoria_id INT NOT NULL,
            precio DECIMAL(10,2) NOT NULL,
            stock INT NOT NULL DEFAULT 0,
            FOREIGN KEY (categoria_id) REFERENCES categorias(id)
        )
    ");
    echo "Tabla 'productos' creada (id, nombre, categoria_id, precio, stock)\n";

    // Crear tabla usuarios
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS usuarios (
            id INT AUTO_INCREMENT PRIMARY KEY,
            usuario_id VARCHAR(50) NOT NULL,
            fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            total DECIMAL(10,2)
        )
    ");
    echo "Tabla 'usuarios' creada (id, usuario_id, fecha, total)\n";

    // Crear tabla pedidos
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS pedidos (
            id INT AUTO_INCREMENT PRIMARY KEY,
            usuario_id INT NOT NULL,
            fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            total DECIMAL(10,2) NOT NULL,
            FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
        )
    ");
    echo "tabla 'pedidos' creada (id, usuario_id, fecha, total)\n";

    // Verificar las tablas creadas
    echo "\nTablas creadas en la base de datos:\n";
    echo "-------------------------------------------\n";
    $stmt = $pdo->query("SHOW TABLES");
    $tablas = $stmt->fetchAll(PDO::FETCH_COLUMN);

    foreach ($tablas as $tabla) {
        echo "  > $tabla\n";
    }

    echo "\n";
    echo "Base de datos 'tienda_frutas' creada exitosamente\n";
    echo "\n";

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}
