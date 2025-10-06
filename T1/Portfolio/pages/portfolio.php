<section class="bg-gradient-to-r from-[#2c3e50] to-[#34495e] text-white py-20 relative overflow-hidden">
    <!-- Elementos decorativos de fondo -->
    <div class="absolute top-0 left-0 w-full h-full opacity-10">
        <div class="absolute top-10 right-10 w-40 h-40 bg-[#1abc9c] rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 left-10 w-60 h-60 bg-[#3498db] rounded-full blur-3xl"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Portafolio de Proyectos</h1>
        <div class="h-1 w-24 bg-[#1abc9c] mx-auto mb-6 rounded-full"></div>
        <p class="text-xl max-w-3xl mx-auto text-gray-200 font-light">Casos de éxito y soluciones tecnológicas implementadas para clientes en diversos sectores.</p>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold mb-4 text-[#2c3e50]">Proyectos Destacados</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Una selección de los trabajos más relevantes que demuestran mi capacidad para desarrollar soluciones digitales efectivas.</p>
            <div class="h-1 w-24 bg-[#1abc9c] mx-auto mt-6 rounded-full"></div>
        </div>

        <!-- Filtros de proyectos -->
        <div class="mb-12 flex flex-wrap justify-center gap-4">
            <button class="filter-btn active bg-[#2c3e50] text-white px-5 py-2 rounded-md transition-colors duration-300 hover:bg-[#1abc9c]" data-filter="all">Todos</button>
            <button class="filter-btn bg-gray-100 hover:bg-[#1abc9c] hover:text-white px-5 py-2 rounded-md transition-colors duration-300 text-[#2c3e50] border border-gray-200" data-filter="web">Desarrollo Web</button>
            <button class="filter-btn bg-gray-100 hover:bg-[#1abc9c] hover:text-white px-5 py-2 rounded-md transition-colors duration-300 text-[#2c3e50] border border-gray-200" data-filter="app">Aplicaciones</button>
            <button class="filter-btn bg-gray-100 hover:bg-[#1abc9c] hover:text-white px-5 py-2 rounded-md transition-colors duration-300 text-[#2c3e50] border border-gray-200" data-filter="ecommerce">E-Commerce</button>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Proyecto 1 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md border border-gray-100 project-item hover:shadow-xl transition-all duration-300" data-category="ecommerce">
                <div class="relative overflow-hidden group">
                    <img src="https://via.placeholder.com/800x600" alt="E-commerce" class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#2c3e50] to-transparent opacity-0 group-hover:opacity-90 transition-opacity duration-300 flex items-end">
                        <div class="p-6">
                            <h3 class="text-white text-xl font-bold">E-commerce Premium</h3>
                            <p class="text-gray-200 mt-2 text-sm">Plataforma de comercio electrónico con tecnología avanzada</p>
                        </div>
                    </div>
                </div>
                <div class="p-6 border-t border-gray-100">
                    <h3 class="text-xl font-bold mb-2 text-[#2c3e50]">Tienda Online de Electrónica</h3>
                    <p class="text-gray-600 mb-4">Solución completa de comercio electrónico con gestión integrada de inventario, sistema de pagos y dashboard administrativo personalizado.</p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="bg-[#e8f8f5] text-[#1abc9c] text-xs px-3 py-1 rounded-full font-medium">PHP</span>
                        <span class="bg-[#e8f8f5] text-[#1abc9c] text-xs px-3 py-1 rounded-full font-medium">MySQL</span>
                        <span class="bg-[#e8f8f5] text-[#1abc9c] text-xs px-3 py-1 rounded-full font-medium">JavaScript</span>
                        <span class="bg-[#e8f8f5] text-[#1abc9c] text-xs px-3 py-1 rounded-full font-medium">Bootstrap</span>
                    </div>
                    <div class="flex justify-between">
                        <a href="#" class="text-[#2c3e50] hover:text-[#1abc9c] font-semibold inline-flex items-center transition-colors">
                            <span>Ver demo</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-[#1abc9c] font-semibold inline-flex items-center transition-colors">
                            <span>Ver código</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Proyecto 2 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md border border-gray-100 project-item hover:shadow-xl transition-all duration-300" data-category="web">
                <div class="relative overflow-hidden group">
                    <img src="https://via.placeholder.com/800x600" alt="CMS" class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#2c3e50] to-transparent opacity-0 group-hover:opacity-90 transition-opacity duration-300 flex items-end">
                        <div class="p-6">
                            <h3 class="text-white text-xl font-bold">Portal Corporativo</h3>
                            <p class="text-gray-200 mt-2 text-sm">Sistema de gestión de contenidos con arquitectura avanzada</p>
                        </div>
                    </div>
                </div>
                <div class="p-6 border-t border-gray-100">
                    <h3 class="text-xl font-bold mb-2 text-[#2c3e50]">Portal de Noticias</h3>
                    <p class="text-gray-600 mb-4">Sistema de gestión de contenidos escalable para medios digitales con administración avanzada de usuarios y flujos editoriales.</p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="bg-[#e8f8f5] text-[#1abc9c] text-xs px-3 py-1 rounded-full font-medium">PHP</span>
                        <span class="bg-[#e8f8f5] text-[#1abc9c] text-xs px-3 py-1 rounded-full font-medium">Laravel</span>
                        <span class="bg-[#e8f8f5] text-[#1abc9c] text-xs px-3 py-1 rounded-full font-medium">MySQL</span>
                        <span class="bg-[#e8f8f5] text-[#1abc9c] text-xs px-3 py-1 rounded-full font-medium">Vue.js</span>
                    </div>
                    <div class="flex justify-between">
                        <a href="#" class="text-[#2c3e50] hover:text-[#1abc9c] font-semibold inline-flex items-center transition-colors">
                            <span>Ver demo</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-[#1abc9c] font-semibold inline-flex items-center transition-colors">
                            <span>Ver código</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Proyecto 3 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md border border-gray-100 project-item hover:shadow-xl transition-all duration-300" data-category="app">
                <div class="relative overflow-hidden group">
                    <img src="https://via.placeholder.com/800x600" alt="App de gestión" class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#2c3e50] to-transparent opacity-0 group-hover:opacity-90 transition-opacity duration-300 flex items-end">
                        <div class="p-6">
                            <h3 class="text-white text-xl font-bold">Plataforma Empresarial</h3>
                            <p class="text-gray-200 mt-2 text-sm">Sistema integral para gestión de recursos y proyectos</p>
                        </div>
                    </div>
                </div>
                <div class="p-6 border-t border-gray-100">
                    <h3 class="text-xl font-bold mb-2 text-[#2c3e50]">Sistema de Gestión de Proyectos</h3>
                    <p class="text-gray-600 mb-4">Aplicación empresarial para gestión de proyectos con seguimiento en tiempo real, asignación de recursos y generación de informes personalizados.</p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="bg-[#e8f8f5] text-[#1abc9c] text-xs px-3 py-1 rounded-full font-medium">React</span>
                        <span class="bg-[#e8f8f5] text-[#1abc9c] text-xs px-3 py-1 rounded-full font-medium">Node.js</span>
                        <span class="bg-[#e8f8f5] text-[#1abc9c] text-xs px-3 py-1 rounded-full font-medium">Express</span>
                        <span class="bg-[#e8f8f5] text-[#1abc9c] text-xs px-3 py-1 rounded-full font-medium">MongoDB</span>
                    </div>
                    <div class="flex justify-between">
                        <a href="#" class="text-[#2c3e50] hover:text-[#1abc9c] font-semibold inline-flex items-center transition-colors">
                            <span>Ver demo</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-[#1abc9c] font-semibold inline-flex items-center transition-colors">
                            <span>Ver código</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Proyecto 4 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md border border-gray-100 project-item hover:shadow-xl transition-all duration-300" data-category="web">
                <div class="relative overflow-hidden group">
                    <img src="https://via.placeholder.com/800x600" alt="Landing page" class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#2c3e50] to-transparent opacity-0 group-hover:opacity-90 transition-opacity duration-300 flex items-end">
                        <div class="p-6">
                            <h3 class="text-white text-xl font-bold">Presencia Digital Corporativa</h3>
                            <p class="text-gray-200 mt-2 text-sm">Desarrollo de imagen digital para empresa tecnológica</p>
                        </div>
                    </div>
                </div>
                <div class="p-6 border-t border-gray-100">
                    <h3 class="text-xl font-bold mb-2 text-[#2c3e50]">Landing Page Corporativa</h3>
                    <p class="text-gray-600 mb-4">Página de aterrizaje de alto rendimiento con estrategia SEO integrada para empresa del sector tecnológico con funcionalidades de captación de leads.</p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="bg-[#e8f8f5] text-[#1abc9c] text-xs px-3 py-1 rounded-full font-medium">HTML5</span>
                        <span class="bg-[#e8f8f5] text-[#1abc9c] text-xs px-3 py-1 rounded-full font-medium">CSS3</span>
                        <span class="bg-[#e8f8f5] text-[#1abc9c] text-xs px-3 py-1 rounded-full font-medium">JavaScript</span>
                        <span class="bg-[#e8f8f5] text-[#1abc9c] text-xs px-3 py-1 rounded-full font-medium">Tailwind CSS</span>
                    </div>
                    <div class="flex justify-between">
                        <a href="#" class="text-[#2c3e50] hover:text-[#1abc9c] font-semibold inline-flex items-center transition-colors">
                            <span>Ver demo</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-[#1abc9c] font-semibold inline-flex items-center transition-colors">
                            <span>Ver código</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Proyecto 5 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md border border-gray-100 project-item hover:shadow-xl transition-all duration-300" data-category="app">
                <div class="relative overflow-hidden group">
                    <img src="https://via.placeholder.com/800x600" alt="Dashboard" class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#2c3e50] to-transparent opacity-0 group-hover:opacity-90 transition-opacity duration-300 flex items-end">
                        <div class="p-6">
                            <h3 class="text-white text-xl font-bold">Business Intelligence Platform</h3>
                            <p class="text-gray-200 mt-2 text-sm">Monitorización de KPIs y métricas en tiempo real</p>
                        </div>
                    </div>
                </div>
                <div class="p-6 border-t border-gray-100">
                    <h3 class="text-xl font-bold mb-2 text-[#2c3e50]">Dashboard Analítico</h3>
                    <p class="text-gray-600 mb-4">Panel de control con visualización avanzada de datos en tiempo real para monitorización de métricas clave e indicadores de negocio.</p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="bg-[#e8f8f5] text-[#1abc9c] text-xs px-3 py-1 rounded-full font-medium">Vue.js</span>
                        <span class="bg-[#e8f8f5] text-[#1abc9c] text-xs px-3 py-1 rounded-full font-medium">Node.js</span>
                        <span class="bg-[#e8f8f5] text-[#1abc9c] text-xs px-3 py-1 rounded-full font-medium">Socket.io</span>
                        <span class="bg-[#e8f8f5] text-[#1abc9c] text-xs px-3 py-1 rounded-full font-medium">Chart.js</span>
                    </div>
                    <div class="flex justify-between">
                        <a href="#" class="text-[#2c3e50] hover:text-[#1abc9c] font-semibold inline-flex items-center transition-colors">
                            <span>Ver demo</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-[#1abc9c] font-semibold inline-flex items-center transition-colors">
                            <span>Ver código</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Proyecto 6 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md border border-gray-100 project-item hover:shadow-xl transition-all duration-300" data-category="ecommerce">
                <div class="relative overflow-hidden group">
                    <img src="https://via.placeholder.com/800x600" alt="App móvil" class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#2c3e50] to-transparent opacity-0 group-hover:opacity-90 transition-opacity duration-300 flex items-end">
                        <div class="p-6">
                            <h3 class="text-white text-xl font-bold">Food Tech Solution</h3>
                            <p class="text-gray-200 mt-2 text-sm">Sistema integral para cadena de restaurantes</p>
                        </div>
                    </div>
                </div>
                <div class="p-6 border-t border-gray-100">
                    <h3 class="text-xl font-bold mb-2 text-[#2c3e50]">Aplicación de Restaurante</h3>
                    <p class="text-gray-600 mb-4">Sistema completo de gestión para cadena de restaurantes con módulo de reservas, pedidos online y programa de fidelización de clientes integrado.</p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="bg-[#e8f8f5] text-[#1abc9c] text-xs px-3 py-1 rounded-full font-medium">PHP</span>
                        <span class="bg-[#e8f8f5] text-[#1abc9c] text-xs px-3 py-1 rounded-full font-medium">Laravel</span>
                        <span class="bg-[#e8f8f5] text-[#1abc9c] text-xs px-3 py-1 rounded-full font-medium">MySQL</span>
                        <span class="bg-[#e8f8f5] text-[#1abc9c] text-xs px-3 py-1 rounded-full font-medium">React Native</span>
                    </div>
                    <div class="flex justify-between">
                        <a href="#" class="text-[#2c3e50] hover:text-[#1abc9c] font-semibold inline-flex items-center transition-colors">
                            <span>Ver demo</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-[#1abc9c] font-semibold inline-flex items-center transition-colors">
                            <span>Ver código</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA y más información -->
        <div class="mt-16 bg-gray-50 rounded-lg p-10 flex flex-col md:flex-row items-center justify-between">
            <div class="mb-6 md:mb-0 md:w-2/3">
                <h3 class="text-2xl font-bold text-[#2c3e50] mb-4">¿Tiene un proyecto en mente?</h3>
                <p class="text-gray-600 mb-0">Cada proyecto es único y merece soluciones personalizadas. Podemos conversar sobre sus necesidades específicas y cómo puedo ayudarle a alcanzar sus objetivos.</p>
            </div>
            <div>
                <a href="index.php?page=contact" class="btn-primary inline-block">
                    Agendar una consulta
                </a>
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
            filterButtons.forEach(btn => {
                btn.classList.remove('active', 'bg-[#2c3e50]', 'text-white');
                btn.classList.add('bg-gray-100', 'text-[#2c3e50]', 'border', 'border-gray-200');
            });
            this.classList.add('active', 'bg-[#2c3e50]', 'text-white');
            this.classList.remove('bg-gray-100', 'border', 'border-gray-200');

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
