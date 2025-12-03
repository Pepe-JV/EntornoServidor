# 📚 Ejercicios de Práctica - Sistema de Frutería

Esta carpeta contiene 5 ejercicios prácticos de PHP orientado a objetos usando la base de datos de frutería.

## 🗄️ Base de Datos

La base de datos `fruteria` contiene las siguientes tablas:
- **categorias**: Tipos de frutas (Cítricos, Frutas Rojas, Tropicales)
- **productos**: Frutas con precio y stock
- **clientes**: Clientes registrados
- **pedidos**: Pedidos realizados por clientes
- **detalles_pedido**: Líneas de cada pedido

### Credenciales
- Host: `localhost`
- Puerto: `3306`
- Base de datos: `fruteria`
- Usuario: `alumno`
- Password: `alumno123`

## 🚀 Iniciar la Base de Datos

```bash
cd /home/pepe/git/EntornoServidor/T4/practica_examen_t2_t3_t4/practica_examen
sudo docker-compose up -d
```

Para verificar que funciona:
```bash
sudo docker-compose ps
```

Para detener:
```bash
sudo docker-compose down
```

## 📝 Ejercicios

### Ejercicio 1: Conexión y Clase Producto (20 min)
- Crear función de conexión PDO
- Implementar clase `Producto` con Property Hooks
- Métodos para gestionar stock
- Consultas a la base de datos

**Archivo**: `Ejercicio_1.md`

### Ejercicio 2: Jerarquía de Usuarios (30 min)
- Clase abstracta `Usuario`
- Clases: `Cliente`, `ClienteVIP`, `Empleado`
- Herencia y polimorfismo
- Sistema de puntos y descuentos

**Archivo**: `Ejercicio_2.md`

### Ejercicio 3: Sistema de Pedidos con Interface (30 min)
- Interface `Pedible`
- Clase `GestorPedidos`
- Transacciones SQL
- Gestión completa de pedidos

**Archivo**: `Ejercicio_3.md`

### Ejercicio 4: Trait y Estadísticas (25 min)
- Trait `Auditable`
- Clase `EstadisticasFruteria`
- Uso de `array_filter()`, `arsort()`, `array_slice()`
- Análisis de ventas y productos

**Archivo**: `Ejercicio_4.md`

### Ejercicio 5: Gestión de Inventario y Análisis (15 min)
- Clase `GestorInventario`
- Filtrado y ordenamiento de productos
- Reabastecimiento
- Cálculo de valor del inventario

**Archivo**: `Ejercicio_5.md`

## 🧪 Cómo Probar los Ejercicios

Cada ejercicio incluye código de prueba al final. Para ejecutar:

```bash
# Extraer el código PHP del markdown y ejecutarlo
# O crear archivos .php separados y ejecutar:

php ejercicio1.php
php ejercicio2.php
php ejercicio3.php
php ejercicio4.php
php ejercicio5.php
```

## 💡 Conceptos Clave Practicados

- ✅ Conexión PDO con manejo de errores
- ✅ Property Hooks (PHP 8.4+)
- ✅ Clases abstractas e interfaces
- ✅ Herencia y polimorfismo
- ✅ Traits
- ✅ Transacciones SQL
- ✅ Prepared statements
- ✅ Array functions (filter, map, slice, sort)
- ✅ CRUD completo
- ✅ Consultas JOIN implícitas
- ✅ Cálculos y agregaciones

## 📊 Estructura de la BD

```
categorias (id, nombre, descripcion)
    ↓
productos (id, nombre, categoria_id, precio, stock, activo)
    ↓
detalles_pedido (id, pedido_id, producto_id, cantidad, precio_unitario)
    ↑
pedidos (id, cliente_id, fecha, total, estado)
    ↑
clientes (id, nombre, email, fecha_registro)
```

## 🎯 Evaluación

Estos ejercicios cubren:
- **Tema 2**: PHP Orientado a Objetos
- **Tema 3**: Bases de Datos con PDO
- **Tema 4**: Transacciones y CRUD avanzado

¡Buena suerte! 🍊🍓🍌
