<nav class="bg-white shadow-md py-4 sticky top-0 z-50">
    <div class="container mx-auto flex flex-wrap items-center justify-between px-6">
        <div class="flex items-center flex-shrink-0 mr-6">
            <a href="index.php" class="flex items-center">
                <span class="font-semibold text-xl tracking-tight text-gray-800">JS<span class="text-[#1abc9c]">.</span>Dev</span>
            </a>
        </div>
        <div class="block lg:hidden">
            <button id="menu-toggle" class="flex items-center px-3 py-2 border rounded text-[#2c3e50] border-gray-400 hover:text-[#1abc9c] hover:border-[#1abc9c] transition-colors">
                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20"><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
            </button>
        </div>
        <div id="menu" class="w-full block flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block">
            <div class="lg:flex-grow text-right">
                <a href="index.php?page=home" class="block mt-4 lg:inline-block lg:mt-0 text-gray-800 hover:text-[#1abc9c] mr-6 nav-link <?php echo $page === 'home' ? 'active' : ''; ?>">
                    Inicio
                </a>
                <a href="index.php?page=about" class="block mt-4 lg:inline-block lg:mt-0 text-gray-800 hover:text-[#1abc9c] mr-6 nav-link <?php echo $page === 'about' ? 'active' : ''; ?>">
                    Sobre mí
                </a>
                <a href="index.php?page=skills" class="block mt-4 lg:inline-block lg:mt-0 text-gray-800 hover:text-[#1abc9c] mr-6 nav-link <?php echo $page === 'skills' ? 'active' : ''; ?>">
                    Habilidades
                </a>
                <a href="index.php?page=portfolio" class="block mt-4 lg:inline-block lg:mt-0 text-gray-800 hover:text-[#1abc9c] mr-6 nav-link <?php echo $page === 'portfolio' ? 'active' : ''; ?>">
                    Proyectos
                </a>
                <a href="index.php?page=contact" class="block mt-4 lg:inline-block lg:mt-0 lg:ml-4 px-5 py-2 bg-[#1abc9c] text-white rounded hover:bg-[#16a085] transition-colors">
                    Contacto
                </a>
            </div>
        </div>
    </div>
</nav>
