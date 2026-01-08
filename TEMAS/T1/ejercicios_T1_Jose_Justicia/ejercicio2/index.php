<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Sitio Web - Desarrollo PHP Moderno</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>
<body class="bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 min-h-screen">
    <?php include 'includes/header.php'; ?>

    <!-- Hero Section -->
    <div class="relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-16">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 animate-fade-in-up">
                    Desarrollo Web <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-400">Moderno</span>
                </h1>
                <p class="text-xl md:text-2xl text-gray-300 mb-8 max-w-3xl mx-auto animate-fade-in-up">
                    Creamos experiencias web excepcionales con PHP, tecnologías modernas y diseño innovador
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center animate-fade-in-up">
                    <button class="bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-bold py-3 px-8 rounded-full transition duration-300 transform hover:scale-105 shadow-lg">
                        Ver Proyectos
                    </button>
                    <button class="border-2 border-white text-white hover:bg-white hover:text-gray-900 font-bold py-3 px-8 rounded-full transition duration-300">
                        Contactar
                    </button>
                </div>
            </div>
        </div>

        <!-- Animated Background Elements -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-20 h-20 bg-blue-500/20 rounded-full animate-bounce-slow"></div>
            <div class="absolute top-40 right-20 w-16 h-16 bg-purple-500/20 rounded-full animate-bounce-slow" style="animation-delay: 0.5s;"></div>
            <div class="absolute bottom-40 left-20 w-12 h-12 bg-pink-500/20 rounded-full animate-bounce-slow" style="animation-delay: 1s;"></div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-16 bg-white/5 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">¿Por qué elegirnos?</h2>
                <p class="text-gray-300 text-lg max-w-2xl mx-auto">Combinamos experiencia técnica con creatividad para entregar soluciones web de calidad superior</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 hover:bg-white/20 transition duration-300 transform hover:scale-105">
                    <div class="bg-blue-500 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                        <span class="material-symbols-outlined text-white">code</span>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Código Limpio</h3>
                    <p class="text-gray-300">Desarrollamos con las mejores prácticas y estándares de la industria</p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 hover:bg-white/20 transition duration-300 transform hover:scale-105">
                    <div class="bg-purple-500 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                        <span class="material-symbols-outlined text-white">speed</span>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Alto Rendimiento</h3>
                    <p class="text-gray-300">Optimizamos cada línea de código para máxima velocidad</p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 hover:bg-white/20 transition duration-300 transform hover:scale-105">
                    <div class="bg-green-500 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                        <span class="material-symbols-outlined text-white">devices</span>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Responsive</h3>
                    <p class="text-gray-300">Diseños que se adaptan perfectamente a cualquier dispositivo</p>
                </div>

                <!-- Feature 4 -->
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 hover:bg-white/20 transition duration-300 transform hover:scale-105">
                    <div class="bg-red-500 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                        <span class="material-symbols-outlined text-white">security</span>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Seguro</h3>
                    <p class="text-gray-300">Implementamos las últimas medidas de seguridad web</p>
                </div>
            </div>
        </div>
    </div>
    <?php include 'pages/footer.php'; ?>
</body>
</html>