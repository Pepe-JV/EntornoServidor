<section class="bg-blue-600 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold mb-4">Mis Proyectos</h1>
        <p class="text-xl max-w-3xl mx-auto">Una muestra de los proyectos más destacados que he desarrollado.</p>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <!-- Filtros de proyectos -->
        <div class="mb-12 flex flex-wrap justify-center gap-4">
            <button class="filter-btn active bg-blue-600 text-white px-4 py-2 rounded-md transition-colors duration-300" data-filter="all">Todos</button>
            <button class="filter-btn bg-gray-200 hover:bg-blue-600 hover:text-white px-4 py-2 rounded-md transition-colors duration-300" data-filter="web">Desarrollo Web</button>
            <button class="filter-btn bg-gray-200 hover:bg-blue-600 hover:text-white px-4 py-2 rounded-md transition-colors duration-300" data-filter="app">Aplicaciones</button>
            <button class="filter-btn bg-gray-200 hover:bg-blue-600 hover:text-white px-4 py-2 rounded-md transition-colors duration-300" data-filter="ecommerce">E-Commerce</button>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Proyecto 1 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg border border-gray-200 project-item" data-category="ecommerce">
                <img src="https://via.placeholder.com/800x600" alt="E-commerce" class="w-full h-52 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">Tienda Online de Electrónica</h3>
                    <p class="text-gray-600 mb-4">Plataforma e-commerce completa con gestión de inventario, carrito de compras y pasarela de pago integrada.</p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">PHP</span>
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">MySQL</span>
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">JavaScript</span>
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Bootstrap</span>
                    </div>
                    <div class="flex justify-between">
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold inline-flex items-center">
                            <span>Demo</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-gray-800 font-semibold inline-flex items-center">
                            <span>Código</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Proyecto 2 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg border border-gray-200 project-item" data-category="web">
                <img src="https://via.placeholder.com/800x600" alt="CMS" class="w-full h-52 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">Portal de Noticias</h3>
                    <p class="text-gray-600 mb-4">Sistema de gestión de contenidos para un portal de noticias con roles de usuario y panel de administración.</p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">PHP</span>
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Laravel</span>
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">MySQL</span>
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Vue.js</span>
                    </div>
                    <div class="flex justify-between">
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold inline-flex items-center">
                            <span>Demo</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-gray-800 font-semibold inline-flex items-center">
                            <span>Código</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Proyecto 3 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg border border-gray-200 project-item" data-category="app">
                <img src="https://via.placeholder.com/800x600" alt="App de gestión" class="w-full h-52 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">Sistema de Gestión de Proyectos</h3>
                    <p class="text-gray-600 mb-4">Aplicación para la gestión de proyectos, tareas, equipos y seguimiento de tiempo con informes personalizados.</p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">React</span>
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Node.js</span>
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Express</span>
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">MongoDB</span>
                    </div>
                    <div class="flex justify-between">
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold inline-flex items-center">
                            <span>Demo</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-gray-800 font-semibold inline-flex items-center">
                            <span>Código</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Proyecto 4 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg border border-gray-200 project-item" data-category="web">
                <img src="https://via.placeholder.com/800x600" alt="Landing page" class="w-full h-52 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">Landing Page Corporativa</h3>
                    <p class="text-gray-600 mb-4">Página de aterrizaje para empresa tecnológica, optimizada para SEO y con alto rendimiento en todos los dispositivos.</p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">HTML5</span>
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">CSS3</span>
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">JavaScript</span>
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Tailwind CSS</span>
                    </div>
                    <div class="flex justify-between">
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold inline-flex items-center">
                            <span>Demo</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-gray-800 font-semibold inline-flex items-center">
                            <span>Código</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Proyecto 5 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg border border-gray-200 project-item" data-category="app">
                <img src="https://via.placeholder.com/800x600" alt="Dashboard" class="w-full h-52 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">Dashboard Analítico</h3>
                    <p class="text-gray-600 mb-4">Panel de control con visualización de datos en tiempo real para monitorización de métricas clave de negocio.</p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Vue.js</span>
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Node.js</span>
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Socket.io</span>
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Chart.js</span>
                    </div>
                    <div class="flex justify-between">
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold inline-flex items-center">
                            <span>Demo</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-gray-800 font-semibold inline-flex items-center">
                            <span>Código</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Proyecto 6 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-lg border border-gray-200 project-item" data-category="ecommerce">
                <img src="https://via.placeholder.com/800x600" alt="App móvil" class="w-full h-52 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">Aplicación de Restaurante</h3>
                    <p class="text-gray-600 mb-4">App para gestión de reservas, pedidos online y programa de fidelización para cadena de restaurantes.</p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">PHP</span>
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">Laravel</span>
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">MySQL</span>
                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">React Native</span>
                    </div>
                    <div class="flex justify-between">
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold inline-flex items-center">
                            <span>Demo</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-gray-800 font-semibold inline-flex items-center">
                            <span>Código</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Filtro de proyectos
    const filterButtons = document.querySelectorAll('.filter-btn');
    const projectItems = document.querySelectorAll('.project-item');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filterValue = this.getAttribute('data-filter');

            // Actualizar botones activos
            filterButtons.forEach(btn => btn.classList.remove('active', 'bg-blue-600', 'text-white'));
            filterButtons.forEach(btn => btn.classList.add('bg-gray-200'));
            this.classList.add('active', 'bg-blue-600', 'text-white');
            this.classList.remove('bg-gray-200');

            // Filtrar proyectos
            projectItems.forEach(item => {
                if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
});
</script>
