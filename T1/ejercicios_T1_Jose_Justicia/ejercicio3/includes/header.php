<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <!-- Logo/Brand -->
        <a class="navbar-brand fw-bold fs-3" href="index.php">
            <span class="text-dark">JS</span><span class="text-primary">.</span><span class="text-dark">Dev</span>
        </a>

        <!-- Toggle button para móvil -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menú de navegación -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo $page === 'home' ? 'active fw-semibold' : ''; ?>"
                       href="index.php?page=home">
                        <i class="bi bi-house me-1"></i>Inicio
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $page === 'about' ? 'active fw-semibold' : ''; ?>"
                       href="index.php?page=about">
                        <i class="bi bi-person me-1"></i>Sobre mí
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $page === 'skills' ? 'active fw-semibold' : ''; ?>"
                       href="index.php?page=skills">
                        <i class="bi bi-gear me-1"></i>Habilidades
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $page === 'portfolio' ? 'active fw-semibold' : ''; ?>"
                       href="index.php?page=portfolio">
                        <i class="bi bi-folder me-1"></i>Proyectos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary ms-2 <?php echo $page === 'contact' ? 'btn-success' : ''; ?>"
                       href="index.php?page=contact">
                        <i class="bi bi-envelope me-1"></i>Contacto
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
