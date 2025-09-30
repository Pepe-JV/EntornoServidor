# 📚 Ejercicios T1 - José Justicia

## 📖 Descripción General
Este repositorio contiene dos ejercicios prácticos de desarrollo web con PHP, implementando diferentes enfoques y tecnologías para demostrar competencias en desarrollo frontend y backend.

---

## 🚀 Ejercicio 1: Introducción a PHP

### 📋 Descripción
Primer ejercicio básico de introducción a PHP con estructura HTML simple e integración de archivos modulares.

### 🛠️ Tecnologías Utilizadas
- **HTML5**: Estructura semántica del documento
- **CSS3**: Estilos básicos personalizados
- **JavaScript**: Funcionalidades interactivas básicas
- **PHP**: Inclusión de archivos modulares

### 📁 Estructura del Proyecto
```
ejercicio1/
├── index.php                 # Página principal
├── assets/
│   ├── css/
│   │   └── style.css         # Estilos CSS personalizados
│   └── js/
│       └── main.js           # JavaScript básico
├── config/
│   └── config.php            # Configuración del proyecto
├── includes/
│   ├── header.php            # Header reutilizable
│   └── footer.php            # Footer reutilizable
└── pages/
    ├── about.php             # Página "Acerca de"
    ├── contact.php           # Página de contacto
    └── services.php          # Página de servicios
```

### 🔧 Características Implementadas
- ✅ Estructura HTML5 semántica
- ✅ Inclusión de header mediante `<?php include 'includes/header.php'; ?>`
- ✅ Separación de estilos y scripts
- ✅ Organización modular de archivos

---

## 🌟 Ejercicio 2: Sitio Web Completo con PHP Moderno

### 📋 Descripción
Desarrollo de un sitio web completo y moderno usando PHP con arquitectura modular, sistema de login, y diseño responsive con Tailwind CSS.

### 🛠️ Tecnologías Utilizadas
- **PHP 7.4+**: Lógica backend y manejo de sesiones
- **HTML5**: Estructura semántica avanzada
- **Tailwind CSS**: Framework CSS utilitario para diseño moderno
- **JavaScript ES6+**: Interactividad avanzada y animaciones
- **Material Symbols**: Iconografía moderna de Google
- **Sessions PHP**: Sistema de autenticación básico

### 📁 Estructura del Proyecto
```
ejercicio2/
├── index.php                 # Página de inicio moderna
├── login.php                 # Sistema de login con sesiones
├── assets/
│   ├── css/
│   │   └── style.css         # Estilos CSS personalizados + Tailwind
│   └── js/
│       └── main.js           # JavaScript avanzado con animaciones
├── config/
│   └── config.php            # Configuración centralizada del sitio
├── includes/
│   ├── header.php            # Header reutilizable (en /includes/)
│   ├── footer.php            # Footer reutilizable 
│   └── login.php             # Componente de login (no usado)
└── pages/
    ├── header.php            # Header con navegación Tailwind
    ├── footer.php            # Footer simple
    ├── about.php             # Página "Acerca de"
    ├── contact.php           # Página de contacto con formulario
    └── services.php          # Página de servicios
```

### 🔧 Sistema de Includes - Arquitectura Modular

#### 📝 Configuración Centralizada (`config/config.php`)
```php
// Configuración general del sitio
define('SITE_NAME', 'Mi Sitio Web');
define('SITE_DESCRIPTION', 'Un sitio web de ejemplo con PHP');
define('SITE_AUTHOR', 'José Justicia');

// Configuración de páginas
$pages = [
    'inicio' => ['title' => 'Inicio', 'file' => 'index.php'],
    'acerca' => ['title' => 'Acerca de', 'file' => 'pages/about.php'],
    // ... más páginas
];

// Funciones globales
function getPageTitle($current_page = 'inicio') { /* ... */ }
function generateNavigation($current_page = 'inicio') { /* ... */ }
```

#### 🎯 Header Reutilizable (`includes/header.php`)
```php
<?php
require_once __DIR__ . '/../config/config.php';
$current_page = isset($page) ? $page : 'inicio';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title><?php echo getPageTitle($current_page); ?></title>
    <!-- Metadatos dinámicos desde config -->
</head>
<body>
    <header class="site-header">
        <!-- Navegación generada dinámicamente -->
        <?php echo generateNavigation($current_page); ?>
    </header>
    <main class="main-content">
        <div class="container">
```

#### 👥 Uso en Páginas
```php
// En index.php
<?php
$page = 'inicio';
include 'includes/header.php';
?>
<!-- Contenido específico de la página -->
<?php include 'includes/footer.php'; ?>

// En pages/about.php
<?php
$page = 'acerca';
include '../includes/header.php';
?>
<!-- Contenido específico de la página -->
<?php include '../includes/footer.php'; ?>
```

### 🎨 Características de Diseño
- ✅ **Diseño Responsive**: Adaptativo a móviles, tablets y desktop
- ✅ **Tailwind CSS**: Framework utilitario para estilos modernos
- ✅ **Glassmorphism**: Efectos de cristal con `backdrop-blur`
- ✅ **Gradientes**: Fondos degradados modernos
- ✅ **Animaciones**: Transiciones suaves y efectos hover
- ✅ **Material Icons**: Iconografía consistente

### 🔐 Sistema de Autenticación
- ✅ **Login/Logout**: Sistema básico con sesiones PHP
- ✅ **Credenciales de prueba**: admin/admin123
- ✅ **Redirección**: Enlace desde el icono de usuario en navegación
- ✅ **Manejo de estados**: Verificación de sesiones activas

### ⚡ Funcionalidades JavaScript
- ✅ **Animaciones al scroll**: Intersection Observer API
- ✅ **Validación de formularios**: Validación en tiempo real
- ✅ **Navegación dinámica**: Resaltado de página activa
- ✅ **Efectos visuales**: Hover effects y transiciones
- ✅ **Botón "volver arriba"**: Scroll suave al top

### 📱 Páginas Implementadas

#### 🏠 Página de Inicio (`index.php`)
- Hero section con call-to-action
- Sección de características (4 tarjetas)
- Tecnologías utilizadas (6 items)
- Call-to-action final
- Footer integrado

#### 📞 Página de Contacto (`pages/contact.php`)
- Formulario de contacto funcional
- Validación PHP y JavaScript
- Información de contacto
- Manejo de envío de formularios

#### 🛠️ Página de Servicios (`pages/services.php`)
- Catálogo de servicios
- Proceso de trabajo (6 pasos)
- Tecnologías utilizadas
- Precios y características

#### ℹ️ Página Acerca de (`pages/about.php`)
- Información de la empresa
- Equipo de trabajo
- Misión y visión
- Tecnologías y herramientas

### 🔄 Flujo de Includes

1. **Configuración global** se carga desde `config/config.php`
2. **Header dinámico** se incluye con `include 'includes/header.php'`
3. **Navegación activa** se genera automáticamente según la página
4. **Contenido específico** de cada página se renderiza
5. **Footer consistente** se incluye con `include 'includes/footer.php'`

### 🎯 Ventajas de la Arquitectura Modular

#### ✅ Mantenibilidad
- Cambios en header/footer se reflejan en todas las páginas
- Configuración centralizada fácil de modificar
- Código reutilizable y limpio

#### ✅ Escalabilidad
- Fácil agregar nuevas páginas al array de configuración
- Sistema de navegación se actualiza automáticamente
- Estructura preparada para futuras funcionalidades

#### ✅ Consistencia
- Mismo header/footer en todas las páginas
- Navegación coherente y funcional
- Estilos unificados con Tailwind CSS

---

## 🚀 Cómo Ejecutar los Proyectos

### 📋 Requisitos
- Servidor web local (XAMPP, WAMP, MAMP, etc.)
- PHP 7.4 o superior
- Navegador web moderno

### 🔧 Instalación
1. Clona o descarga este repositorio
2. Coloca los archivos en tu servidor web local
3. Accede a `http://localhost/ejercicio1/` o `http://localhost/ejercicio2/`
4. Para el ejercicio 2, puedes probar el login con: `admin/admin123`

---

## 👨‍💻 Autor
**José Justicia**
- Ejercicios desarrollados para la asignatura de Manu
- Fecha: Sep 2025

---

## 📝 Notas Técnicas

### Ejercicio 1
- Enfoque en aprender inclusión básica de archivos PHP
- Estructura simple y clara para principiantes

### Ejercicio 2
- Implementación de buenas prácticas de desarrollo web
- Arquitectura modular escalable y mantenible
- Diseño moderno con frameworks actuales
- Sistema de autenticación básico pero funcional

---

*¡Gracias por revisar estos ejercicios!* 🎉
