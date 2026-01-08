<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuestro Equipo - Desarrollo Web Moderno</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>
<body class="bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 min-h-screen">
    <?php include '../includes/header.php'; ?>

    <!-- Hero Section del Equipo -->
    <div class="relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-16">
            <div class="text-center mb-16">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 animate-fade-in-up">
                    Nuestro <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-400">Equipo</span>
                </h1>
                <p class="text-xl md:text-2xl text-gray-300 mb-8 max-w-3xl mx-auto">
                    Conoce a los profesionales que hacen posible cada proyecto
                </p>
            </div>

            <!-- Grid de Miembros del Equipo -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Miembro 1 -->
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300 transform hover:scale-105">
                    <div class="text-center">
                        <div class="w-24 h-24 mx-auto mb-4 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                            <span class="material-symbols-outlined text-4xl text-white">person</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">José Justicia</h3>
                        <p class="text-purple-300 mb-4">Desarrollador Full Stack</p>
                        <p class="text-gray-300 text-sm mb-4">Especialista en PHP, JavaScript y frameworks modernos. Apasionado por crear soluciones web innovadoras.</p>
                        <div class="flex justify-center space-x-3">
                            <a href="#" class="text-blue-400 hover:text-blue-300 transition-colors">
                                <span class="material-symbols-outlined">link</span>
                            </a>
                            <a href="#" class="text-blue-400 hover:text-blue-300 transition-colors">
                                <span class="material-symbols-outlined">mail</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Miembro 2 -->
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300 transform hover:scale-105">
                    <div class="text-center">
                        <div class="w-24 h-24 mx-auto mb-4 bg-gradient-to-r from-green-500 to-teal-600 rounded-full flex items-center justify-center">
                            <span class="material-symbols-outlined text-4xl text-white">design_services</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Ana García</h3>
                        <p class="text-green-300 mb-4">UI/UX Designer</p>
                        <p class="text-gray-300 text-sm mb-4">Experta en diseño de interfaces y experiencia de usuario. Crea diseños que conectan con las personas.</p>
                        <div class="flex justify-center space-x-3">
                            <a href="#" class="text-green-400 hover:text-green-300 transition-colors">
                                <span class="material-symbols-outlined">link</span>
                            </a>
                            <a href="#" class="text-green-400 hover:text-green-300 transition-colors">
                                <span class="material-symbols-outlined">mail</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Miembro 3 -->
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300 transform hover:scale-105">
                    <div class="text-center">
                        <div class="w-24 h-24 mx-auto mb-4 bg-gradient-to-r from-orange-500 to-red-600 rounded-full flex items-center justify-center">
                            <span class="material-symbols-outlined text-4xl text-white">campaign</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Carlos Ruiz</h3>
                        <p class="text-orange-300 mb-4">Project Manager</p>
                        <p class="text-gray-300 text-sm mb-4">Gestor de proyectos con amplia experiencia en metodologías ágiles y liderazgo de equipos.</p>
                        <div class="flex justify-center space-x-3">
                            <a href="#" class="text-orange-400 hover:text-orange-300 transition-colors">
                                <span class="material-symbols-outlined">link</span>
                            </a>
                            <a href="#" class="text-orange-400 hover:text-orange-300 transition-colors">
                                <span class="material-symbols-outlined">mail</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Miembro 4 -->
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300 transform hover:scale-105">
                    <div class="text-center">
                        <div class="w-24 h-24 mx-auto mb-4 bg-gradient-to-r from-pink-500 to-rose-600 rounded-full flex items-center justify-center">
                            <span class="material-symbols-outlined text-4xl text-white">security</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Laura Martín</h3>
                        <p class="text-pink-300 mb-4">DevOps Engineer</p>
                        <p class="text-gray-300 text-sm mb-4">Especialista en infraestructura cloud y automatización de despliegues. Garantiza la seguridad y escalabilidad.</p>
                        <div class="flex justify-center space-x-3">
                            <a href="#" class="text-pink-400 hover:text-pink-300 transition-colors">
                                <span class="material-symbols-outlined">link</span>
                            </a>
                            <a href="#" class="text-pink-400 hover:text-pink-300 transition-colors">
                                <span class="material-symbols-outlined">mail</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Miembro 5 -->
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300 transform hover:scale-105">
                    <div class="text-center">
                        <div class="w-24 h-24 mx-auto mb-4 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center">
                            <span class="material-symbols-outlined text-4xl text-white">code</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Miguel Torres</h3>
                        <p class="text-indigo-300 mb-4">Backend Developer</p>
                        <p class="text-gray-300 text-sm mb-4">Experto en APIs REST, bases de datos y arquitecturas escalables. Construye la base sólida de cada aplicación.</p>
                        <div class="flex justify-center space-x-3">
                            <a href="#" class="text-indigo-400 hover:text-indigo-300 transition-colors">
                                <span class="material-symbols-outlined">link</span>
                            </a>
                            <a href="#" class="text-indigo-400 hover:text-indigo-300 transition-colors">
                                <span class="material-symbols-outlined">mail</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Miembro 6 -->
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300 transform hover:scale-105">
                    <div class="text-center">
                        <div class="w-24 h-24 mx-auto mb-4 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-full flex items-center justify-center">
                            <span class="material-symbols-outlined text-4xl text-white">mobile_friendly</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Sofia López</h3>
                        <p class="text-cyan-300 mb-4">Frontend Developer</p>
                        <p class="text-gray-300 text-sm mb-4">Especialista en React, Vue.js y tecnologías frontend. Transforma diseños en experiencias interactivas.</p>
                        <div class="flex justify-center space-x-3">
                            <a href="#" class="text-cyan-400 hover:text-cyan-300 transition-colors">
                                <span class="material-symbols-outlined">link</span>
                            </a>
                            <a href="#" class="text-cyan-400 hover:text-cyan-300 transition-colors">
                                <span class="material-symbols-outlined">mail</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sección de Valores del Equipo -->
            <div class="mt-20">
                <h2 class="text-3xl font-bold text-white text-center mb-12">Nuestros Valores</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                            <span class="material-symbols-outlined text-2xl text-white">lightbulb</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Innovación</h3>
                        <p class="text-gray-300">Siempre buscamos las mejores soluciones y tecnologías más avanzadas para cada proyecto.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-r from-green-500 to-teal-600 rounded-full flex items-center justify-center">
                            <span class="material-symbols-outlined text-2xl text-white">handshake</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Colaboración</h3>
                        <p class="text-gray-300">Trabajamos en equipo, compartiendo conocimiento y apoyándonos mutuamente.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-r from-orange-500 to-red-600 rounded-full flex items-center justify-center">
                            <span class="material-symbols-outlined text-2xl text-white">star</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Excelencia</h3>
                        <p class="text-gray-300">Nos comprometemos a entregar la máxima calidad en cada línea de código.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../pages/footer.php'; ?>
</body>
</html>
