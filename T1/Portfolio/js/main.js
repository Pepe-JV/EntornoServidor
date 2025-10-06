document.addEventListener('DOMContentLoaded', function() {
    // Toggle para el menú móvil
    const menuToggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('menu');

    if (menuToggle && menu) {
        menuToggle.addEventListener('click', function() {
            menu.classList.toggle('hidden');
        });
    }

    // Animaciones de scroll suave para enlaces internos
    document.querySelectorAll('a[href^="index.php"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            // Solo para enlaces internos
            const hrefParts = this.getAttribute('href').split('#');
            if (hrefParts.length > 1 && hrefParts[1].length > 0) {
                e.preventDefault();

                const targetId = hrefParts[1];
                const targetElement = document.getElementById(targetId);

                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });

    // Formulario de contacto
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Simulación de envío
            const submitButton = contactForm.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;

            submitButton.disabled = true;
            submitButton.textContent = 'Enviando...';

            // Aquí iría la lógica de envío real con AJAX
            setTimeout(function() {
                submitButton.textContent = '¡Mensaje enviado!';
                contactForm.reset();

                setTimeout(function() {
                    submitButton.disabled = false;
                    submitButton.textContent = originalText;
                }, 3000);
            }, 1500);
        });
    }
});
