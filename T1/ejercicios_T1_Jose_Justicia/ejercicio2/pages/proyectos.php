<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuestros Proyectos - Desarrollo Web Moderno</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>
<body class="bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 min-h-screen">
    <?php include '../includes/header.php'; ?>

    <!-- Hero Section de Proyectos -->
    <div class="relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-16">
            <div class="text-center mb-16">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 animate-fade-in-up">
                    Nuestros <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-400">Proyectos</span>
                </h1>
                <p class="text-xl md:text-2xl text-gray-300 mb-8 max-w-3xl mx-auto">
                    Descubre las soluciones innovadoras que hemos desarrollado para nuestros clientes
                </p>
            </div>

            <!-- Filtros de Proyectos -->
            <div class="flex flex-wrap justify-center mb-12 gap-4">
                <button class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-6 py-2 rounded-full transition-all duration-300 hover:scale-105">
                    Todos
                </button>
                <button class="bg-white/10 text-white px-6 py-2 rounded-full border border-white/20 hover:bg-white/20 transition-all duration-300">
                    E-commerce
                </button>
                <button class="bg-white/10 text-white px-6 py-2 rounded-full border border-white/20 hover:bg-white/20 transition-all duration-300">
                    Corporativo
                </button>
                <button class="bg-white/10 text-white px-6 py-2 rounded-full border border-white/20 hover:bg-white/20 transition-all duration-300">
                    Portfolio
                </button>
                <button class="bg-white/10 text-white px-6 py-2 rounded-full border border-white/20 hover:bg-white/20 transition-all duration-300">
                    Aplicaciones Web
                </button>
            </div>

            <!-- Grid de Proyectos -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Proyecto 1 -->
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl overflow-hidden border border-white/20 hover:bg-white/15 transition-all duration-300 transform hover:scale-105 group">
                    <div class="h-48 bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                        <span class="material-symbols-outlined text-6xl text-white">shopping_cart</span>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-xl font-bold text-white">TechStore Online</h3>
                            <span class="px-2 py-1 bg-blue-500/20 text-blue-300 text-xs rounded-full">E-commerce</span>
                        </div>
                        <p class="text-gray-300 mb-4">Plataforma de e-commerce completa con sistema de pagos, inventario y panel de administración avanzado.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-gray-700 text-gray-300 text-xs rounded">PHP</span>
                            <span class="px-2 py-1 bg-gray-700 text-gray-300 text-xs rounded">MySQL</span>
                            <span class="px-2 py-1 bg-gray-700 text-gray-300 text-xs rounded">Bootstrap</span>
                            <span class="px-2 py-1 bg-gray-700 text-gray-300 text-xs rounded">JavaScript</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <a href="#" class="text-blue-400 hover:text-blue-300 transition-colors flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm">launch</span>
                                Ver Demo
                            </a>
                            <a href="#" class="text-purple-400 hover:text-purple-300 transition-colors flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm">code</span>
                                Código
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Proyecto 2 -->
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl overflow-hidden border border-white/20 hover:bg-white/15 transition-all duration-300 transform hover:scale-105 group">
                    <div class="h-48 bg-gradient-to-br from-green-500 to-teal-600 flex items-center justify-center">
                        <span class="material-symbols-outlined text-6xl text-white">business</span>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-xl font-bold text-white">Innovax Solutions</h3>
                            <span class="px-2 py-1 bg-green-500/20 text-green-300 text-xs rounded-full">Corporativo</span>
                        </div>
                        <p class="text-gray-300 mb-4">Website corporativo con CMS personalizado, blog integrado y sistema de gestión de contenidos.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-gray-700 text-gray-300 text-xs rounded">WordPress</span>
                            <span class="px-2 py-1 bg-gray-700 text-gray-300 text-xs rounded">PHP</span>
                            <span class="px-2 py-1 bg-gray-700 text-gray-300 text-xs rounded">Tailwind CSS</span>
                            <span class="px-2 py-1 bg-gray-700 text-gray-300 text-xs rounded">React</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <a href="#" class="text-blue-400 hover:text-blue-300 transition-colors flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm">launch</span>
                                Ver Demo
                            </a>
                            <a href="#" class="text-purple-400 hover:text-purple-300 transition-colors flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm">code</span>
                                Código
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Proyecto 3 -->
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl overflow-hidden border border-white/20 hover:bg-white/15 transition-all duration-300 transform hover:scale-105 group">
                    <div class="h-48 bg-gradient-to-br from-pink-500 to-rose-600 flex items-center justify-center">
                        <span class="material-symbols-outlined text-6xl text-white">palette</span>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-xl font-bold text-white">Creative Portfolio</h3>
                            <span class="px-2 py-1 bg-pink-500/20 text-pink-300 text-xs rounded-full">Portfolio</span>
                        </div>
                        <p class="text-gray-300 mb-4">Portfolio interactivo para artista digital con galería dinámica y sistema de contacto avanzado.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-gray-700 text-gray-300 text-xs rounded">Vue.js</span>
                            <span class="px-2 py-1 bg-gray-700 text-gray-300 text-xs rounded">Node.js</span>
                            <span class="px-2 py-1 bg-gray-700 text-gray-300 text-xs rounded">MongoDB</span>
                            <span class="px-2 py-1 bg-gray-700 text-gray-300 text-xs rounded">SCSS</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <a href="#" class="text-blue-400 hover:text-blue-300 transition-colors flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm">launch</span>
                                Ver Demo
                            </a>
                            <a href="#" class="text-purple-400 hover:text-purple-300 transition-colors flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm">code</span>
                                Código
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Proyecto 4 -->
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl overflow-hidden border border-white/20 hover:bg-white/15 transition-all duration-300 transform hover:scale-105 group">
                    <div class="h-48 bg-gradient-to-br from-orange-500 to-red-600 flex items-center justify-center">
                        <span class="material-symbols-outlined text-6xl text-white">dashboard</span>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-xl font-bold text-white">Analytics Dashboard</h3>
                            <span class="px-2 py-1 bg-orange-500/20 text-orange-300 text-xs rounded-full">Aplicación Web</span>
                        </div>
                        <p class="text-gray-300 mb-4">Dashboard de análisis de datos en tiempo real con gráficos interactivos y reportes automatizados.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-gray-700 text-gray-300 text-xs rounded">Laravel</span>
                            <span class="px-2 py-1 bg-gray-700 text-gray-300 text-xs rounded">Vue.js</span>
                            <span class="px-2 py-1 bg-gray-700 text-gray-300 text-xs rounded">Chart.js</span>
                            <span class="px-2 py-1 bg-gray-700 text-gray-300 text-xs rounded">PostgreSQL</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <a href="#" class="text-blue-400 hover:text-blue-300 transition-colors flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm">launch</span>
                                Ver Demo
                            </a>
                            <a href="#" class="text-purple-400 hover:text-purple-300 transition-colors flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm">code</span>
                                Código
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Proyecto 5 -->
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl overflow-hidden border border-white/20 hover:bg-white/15 transition-all duration-300 transform hover:scale-105 group">
                    <div class="h-48 bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center">
                        <span class="material-symbols-outlined text-6xl text-white">school</span>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-xl font-bold text-white">EduPlatform</h3>
                            <span class="px-2 py-1 bg-indigo-500/20 text-indigo-300 text-xs rounded-full">Aplicación Web</span>
                        </div>
                        <p class="text-gray-300 mb-4">Plataforma educativa online con cursos, exámenes, certificaciones y sistema de videoconferencias.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-gray-700 text-gray-300 text-xs rounded">Django</span>
                            <span class="px-2 py-1 bg-gray-700 text-gray-300 text-xs rounded">Python</span>
                            <span class="px-2 py-1 bg-gray-700 text-gray-300 text-xs rounded">WebRTC</span>
                            <span class="px-2 py-1 bg-gray-700 text-gray-300 text-xs rounded">Redis</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <a href="#" class="text-blue-400 hover:text-blue-300 transition-colors flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm">launch</span>
                                Ver Demo
                            </a>
                            <a href="#" class="text-purple-400 hover:text-purple-300 transition-colors flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm">code</span>
                                Código
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Proyecto 6 -->
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl overflow-hidden border border-white/20 hover:bg-white/15 transition-all duration-300 transform hover:scale-105 group">
                    <div class="h-48 bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center">
                        <span class="material-symbols-outlined text-6xl text-white">restaurant</span>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-xl font-bold text-white">FoodDelivery App</h3>
                            <span class="px-2 py-1 bg-cyan-500/20 text-cyan-300 text-xs rounded-full">E-commerce</span>
                        </div>
                        <p class="text-gray-300 mb-4">Aplicación de delivery de comida con geolocalización, pagos online y seguimiento en tiempo real.</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-2 py-1 bg-gray-700 text-gray-300 text-xs rounded">React Native</span>
                            <span class="px-2 py-1 bg-gray-700 text-gray-300 text-xs rounded">Node.js</span>
                            <span class="px-2 py-1 bg-gray-700 text-gray-300 text-xs rounded">Socket.io</span>
                            <span class="px-2 py-1 bg-gray-700 text-gray-300 text-xs rounded">Stripe</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <a href="#" class="text-blue-400 hover:text-blue-300 transition-colors flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm">launch</span>
                                Ver Demo
                            </a>
                            <a href="#" class="text-purple-400 hover:text-purple-300 transition-colors flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm">code</span>
                                Código
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Estadísticas -->
            <div class="mt-20 text-center">
                <h2 class="text-3xl font-bold text-white mb-12">Nuestros Logros</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div>
                        <div class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-400 mb-2">50+</div>
                        <div class="text-gray-300">Proyectos Completados</div>
                    </div>
                    <div>
                        <div class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-teal-400 mb-2">25+</div>
                        <div class="text-gray-300">Clientes Satisfechos</div>
                    </div>
                    <div>
                        <div class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-400 mb-2">3+</div>
                        <div class="text-gray-300">Años de Experiencia</div>
                    </div>
                    <div>
                        <div class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-purple-400 mb-2">99%</div>
                        <div class="text-gray-300">Tasa de Éxito</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../pages/footer.php'; ?>
</body>
</html>
