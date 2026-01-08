<section class="hero-section d-flex align-items-center text-white position-relative" style="min-height: 50vh;">
    <div class="position-absolute w-100 h-100" style="opacity: 0.1;">
        <div class="position-absolute rounded-circle"
             style="top: 10%; right: 10%; width: 160px; height: 160px; background: #1abc9c; filter: blur(60px);"></div>
        <div class="position-absolute rounded-circle"
             style="bottom: 10%; left: 10%; width: 240px; height: 240px; background: #3498db; filter: blur(60px);"></div>
    </div>

    <div class="container position-relative text-center">
        <h1 class="display-3 fw-bold mb-4">Portfolio</h1>
        <div class="bg-primary rounded-pill mx-auto mb-4" style="height: 4px; width: 100px;"></div>
        <p class="lead text-light opacity-75 col-lg-8 mx-auto">
            Una selección de proyectos que demuestran mi experiencia y habilidades técnicas.
        </p>
    </div>
</section>

<!-- Filtros de proyectos -->
<section class="py-4 bg-light border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-center gap-2">
            <button class="btn btn-primary btn-sm filter-btn active" data-filter="all">
                Todos los proyectos
            </button>
            <button class="btn btn-outline-primary btn-sm filter-btn" data-filter="web">
                Desarrollo Web
            </button>
            <button class="btn btn-outline-primary btn-sm filter-btn" data-filter="ecommerce">
                E-commerce
            </button>
            <button class="btn btn-outline-primary btn-sm filter-btn" data-filter="mobile">
                Apps Móviles
            </button>
        </div>
    </div>
</section>

<!-- Proyectos -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row g-4" id="portfolio-grid">
            <!-- Proyecto 1 -->
            <div class="col-lg-4 col-md-6 portfolio-item" data-category="web">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="position-relative overflow-hidden">
                        <img src="https://via.placeholder.com/400x250/0d6efd/ffffff?text=E-Commerce+Platform"
                             class="card-img-top" alt="Proyecto E-commerce" style="height: 250px; object-fit: cover;">
                        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-75 d-flex align-items-center justify-content-center opacity-0 portfolio-overlay">
                            <div class="text-center text-white">
                                <a href="#" class="btn btn-light btn-sm me-2">
                                    <i class="bi bi-eye"></i> Ver Demo
                                </a>
                                <a href="#" class="btn btn-outline-light btn-sm">
                                    <i class="bi bi-github"></i> Código
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Plataforma E-commerce</h5>
                        <p class="card-text text-muted">
                            Tienda online completa con panel de administración, gestión de inventario y pasarela de pagos.
                        </p>
                        <div class="d-flex flex-wrap gap-1 mb-3">
                            <span class="badge bg-primary">PHP</span>
                            <span class="badge bg-success">Laravel</span>
                            <span class="badge bg-info">MySQL</span>
                            <span class="badge bg-warning text-dark">Bootstrap</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="bi bi-calendar me-1"></i>Marzo 2024
                            </small>
                            <span class="badge bg-success">Completado</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Proyecto 2 -->
            <div class="col-lg-4 col-md-6 portfolio-item" data-category="web">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="position-relative overflow-hidden">
                        <img src="https://via.placeholder.com/400x250/198754/ffffff?text=Corporate+Website"
                             class="card-img-top" alt="Sitio Web Corporativo" style="height: 250px; object-fit: cover;">
                        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-75 d-flex align-items-center justify-content-center opacity-0 portfolio-overlay">
                            <div class="text-center text-white">
                                <a href="#" class="btn btn-light btn-sm me-2">
                                    <i class="bi bi-eye"></i> Ver Demo
                                </a>
                                <a href="#" class="btn btn-outline-light btn-sm">
                                    <i class="bi bi-github"></i> Código
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Sitio Web Corporativo</h5>
                        <p class="card-text text-muted">
                            Portal empresarial con CMS personalizado, blog integrado y sistema de contacto.
                        </p>
                        <div class="d-flex flex-wrap gap-1 mb-3">
                            <span class="badge bg-primary">React</span>
                            <span class="badge bg-success">Node.js</span>
                            <span class="badge bg-info">MongoDB</span>
                            <span class="badge bg-warning text-dark">Tailwind</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="bi bi-calendar me-1"></i>Febrero 2024
                            </small>
                            <span class="badge bg-success">Completado</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Proyecto 3 -->
            <div class="col-lg-4 col-md-6 portfolio-item" data-category="mobile">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="position-relative overflow-hidden">
                        <img src="https://via.placeholder.com/400x250/dc3545/ffffff?text=Task+Manager+App"
                             class="card-img-top" alt="App de Gestión" style="height: 250px; object-fit: cover;">
                        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-75 d-flex align-items-center justify-content-center opacity-0 portfolio-overlay">
                            <div class="text-center text-white">
                                <a href="#" class="btn btn-light btn-sm me-2">
                                    <i class="bi bi-eye"></i> Ver Demo
                                </a>
                                <a href="#" class="btn btn-outline-light btn-sm">
                                    <i class="bi bi-github"></i> Código
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">App Gestión de Tareas</h5>
                        <p class="card-text text-muted">
                            Aplicación móvil para gestión de proyectos con sincronización en tiempo real.
                        </p>
                        <div class="d-flex flex-wrap gap-1 mb-3">
                            <span class="badge bg-primary">React Native</span>
                            <span class="badge bg-success">Firebase</span>
                            <span class="badge bg-info">Redux</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="bi bi-calendar me-1"></i>Enero 2024
                            </small>
                            <span class="badge bg-success">Completado</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Proyecto 4 -->
            <div class="col-lg-4 col-md-6 portfolio-item" data-category="ecommerce">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="position-relative overflow-hidden">
                        <img src="https://via.placeholder.com/400x250/ffc107/000000?text=Restaurant+App"
                             class="card-img-top" alt="App Restaurante" style="height: 250px; object-fit: cover;">
                        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-75 d-flex align-items-center justify-content-center opacity-0 portfolio-overlay">
                            <div class="text-center text-white">
                                <a href="#" class="btn btn-light btn-sm me-2">
                                    <i class="bi bi-eye"></i> Ver Demo
                                </a>
                                <a href="#" class="btn btn-outline-light btn-sm">
                                    <i class="bi bi-github"></i> Código
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Sistema de Pedidos Online</h5>
                        <p class="card-text text-muted">
                            Plataforma para restaurantes con pedidos online, gestión de mesas y delivery.
                        </p>
                        <div class="d-flex flex-wrap gap-1 mb-3">
                            <span class="badge bg-primary">Vue.js</span>
                            <span class="badge bg-success">Laravel</span>
                            <span class="badge bg-info">MySQL</span>
                            <span class="badge bg-warning text-dark">Stripe</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="bi bi-calendar me-1"></i>Diciembre 2023
                            </small>
                            <span class="badge bg-success">Completado</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Proyecto 5 -->
            <div class="col-lg-4 col-md-6 portfolio-item" data-category="web">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="position-relative overflow-hidden">
                        <img src="https://via.placeholder.com/400x250/0dcaf0/000000?text=Learning+Platform"
                             class="card-img-top" alt="Plataforma Educativa" style="height: 250px; object-fit: cover;">
                        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-75 d-flex align-items-center justify-content-center opacity-0 portfolio-overlay">
                            <div class="text-center text-white">
                                <a href="#" class="btn btn-light btn-sm me-2">
                                    <i class="bi bi-eye"></i> Ver Demo
                                </a>
                                <a href="#" class="btn btn-outline-light btn-sm">
                                    <i class="bi bi-github"></i> Código
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Plataforma Educativa</h5>
                        <p class="card-text text-muted">
                            LMS completo con cursos online, evaluaciones y seguimiento de progreso.
                        </p>
                        <div class="d-flex flex-wrap gap-1 mb-3">
                            <span class="badge bg-primary">PHP</span>
                            <span class="badge bg-success">CodeIgniter</span>
                            <span class="badge bg-info">MySQL</span>
                            <span class="badge bg-warning text-dark">jQuery</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="bi bi-calendar me-1"></i>Noviembre 2023
                            </small>
                            <span class="badge bg-warning text-dark">En desarrollo</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Proyecto 6 -->
            <div class="col-lg-4 col-md-6 portfolio-item" data-category="web">
                <div class="card border-0 shadow-sm h-100 overflow-hidden">
                    <div class="position-relative overflow-hidden">
                        <img src="https://via.placeholder.com/400x250/6f42c1/ffffff?text=Analytics+Dashboard"
                             class="card-img-top" alt="Dashboard Analytics" style="height: 250px; object-fit: cover;">
                        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-75 d-flex align-items-center justify-content-center opacity-0 portfolio-overlay">
                            <div class="text-center text-white">
                                <a href="#" class="btn btn-light btn-sm me-2">
                                    <i class="bi bi-eye"></i> Ver Demo
                                </a>
                                <a href="#" class="btn btn-outline-light btn-sm">
                                    <i class="bi bi-github"></i> Código
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Dashboard de Analytics</h5>
                        <p class="card-text text-muted">
                            Panel de control con métricas en tiempo real y reportes avanzados.
                        </p>
                        <div class="d-flex flex-wrap gap-1 mb-3">
                            <span class="badge bg-primary">Angular</span>
                            <span class="badge bg-success">Node.js</span>
                            <span class="badge bg-info">PostgreSQL</span>
                            <span class="badge bg-warning text-dark">Chart.js</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="bi bi-calendar me-1"></i>Octubre 2023
                            </small>
                            <span class="badge bg-success">Completado</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-light">
    <div class="container text-center">
        <h3 class="display-6 fw-bold mb-3">¿Interesado en trabajar juntos?</h3>
        <p class="lead text-muted mb-4">
            Estos son solo algunos ejemplos de mi trabajo. Cada proyecto es único y se adapta a las necesidades específicas del cliente.
        </p>
        <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
            <a href="index.php?page=contact" class="btn btn-primary btn-lg">
                <i class="bi bi-envelope me-2"></i>Contactar para un proyecto
            </a>
            <a href="#" class="btn btn-outline-primary btn-lg">
                <i class="bi bi-download me-2"></i>Descargar Portfolio Completo
            </a>
        </div>
    </div>
</section>

<style>
.portfolio-item:hover .portfolio-overlay {
    opacity: 1 !important;
    transition: opacity 0.3s ease;
}

.portfolio-overlay {
    transition: opacity 0.3s ease;
}
</style>
