<section class="hero-section d-flex align-items-center text-white position-relative" style="min-height: 50vh;">
    <div class="position-absolute w-100 h-100" style="opacity: 0.1;">
        <div class="position-absolute rounded-circle"
             style="top: 10%; right: 10%; width: 160px; height: 160px; background: #1abc9c; filter: blur(60px);"></div>
        <div class="position-absolute rounded-circle"
             style="bottom: 10%; left: 10%; width: 240px; height: 240px; background: #3498db; filter: blur(60px);"></div>
    </div>

    <div class="container position-relative text-center">
        <h1 class="display-3 fw-bold mb-4">Contacto</h1>
        <div class="bg-primary rounded-pill mx-auto mb-4" style="height: 4px; width: 100px;"></div>
        <p class="lead text-light opacity-75 col-lg-8 mx-auto">
            ¿Tienes un proyecto en mente? Me encantaría escuchar tus ideas y ayudarte a hacerlas realidad.
        </p>
    </div>
</section>

<!-- Formulario de contacto -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row g-5">
            <!-- Formulario -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="card-title mb-0">
                            <i class="bi bi-envelope me-2"></i>Envíame un mensaje
                        </h4>
                    </div>
                    <div class="card-body p-4">
                        <?php if (isset($_GET['sent']) && $_GET['sent'] == 'true'): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-2"></i>
                                <strong>¡Mensaje enviado!</strong> Te responderé lo antes posible.
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="index.php?page=contact" id="contactForm">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                               placeholder="Tu nombre" required>
                                        <label for="nombre">
                                            <i class="bi bi-person me-1"></i>Nombre completo
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email"
                                               placeholder="tu@email.com" required>
                                        <label for="email">
                                            <i class="bi bi-envelope me-1"></i>Email
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control" id="telefono" name="telefono"
                                               placeholder="+34 123 456 789">
                                        <label for="telefono">
                                            <i class="bi bi-telephone me-1"></i>Teléfono (opcional)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="tipo_proyecto" name="tipo_proyecto" required>
                                            <option value="">Selecciona...</option>
                                            <option value="web">Desarrollo Web</option>
                                            <option value="ecommerce">E-commerce</option>
                                            <option value="mobile">Aplicación Móvil</option>
                                            <option value="consultoria">Consultoría</option>
                                            <option value="otro">Otro</option>
                                        </select>
                                        <label for="tipo_proyecto">
                                            <i class="bi bi-briefcase me-1"></i>Tipo de proyecto
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="asunto" name="asunto"
                                               placeholder="Asunto del mensaje" required>
                                        <label for="asunto">
                                            <i class="bi bi-chat-dots me-1"></i>Asunto
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" id="mensaje" name="mensaje"
                                                  placeholder="Cuéntame sobre tu proyecto..."
                                                  style="height: 120px" required></textarea>
                                        <label for="mensaje">
                                            <i class="bi bi-chat-text me-1"></i>Mensaje
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="privacidad"
                                               name="privacidad" required>
                                        <label class="form-check-label text-muted small" for="privacidad">
                                            Acepto la <a href="#" class="text-primary">política de privacidad</a>
                                            y el tratamiento de mis datos personales.
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg w-100">
                                        <i class="bi bi-send me-2"></i>Enviar mensaje
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Información de contacto -->
            <div class="col-lg-4">
                <div class="sticky-top" style="top: 100px;">
                    <!-- Información personal -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">
                                <i class="bi bi-person-circle me-2 text-primary"></i>Información de contacto
                            </h5>
                            <div class="d-flex align-items-start mb-3">
                                <i class="bi bi-envelope text-primary me-3 mt-1"></i>
                                <div>
                                    <strong>Email:</strong><br>
                                    <a href="jjusticiavico@gmail.com" class="text-decoration-none">jjusticiavico@gmail.com</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-start mb-3">
                                <i class="bi bi-telephone text-primary me-3 mt-1"></i>
                                <div>
                                    <strong>Teléfono:</strong><br>
                                    <a href="tel:+34123456789" class="text-decoration-none">+34 646 80 97 88</a>
                                </div>
                            </div>
                            <div class="d-flex align-items-start mb-3">
                                <i class="bi bi-geo-alt text-primary me-3 mt-1"></i>
                                <div>
                                    <strong>Ubicación:</strong><br>
                                    Granada, España
                                </div>
                            </div>
                            <div class="d-flex align-items-start">
                                <i class="bi bi-clock text-primary me-3 mt-1"></i>
                                <div>
                                    <strong>Horario:</strong><br>
                                    Lun - Vie: 9:00 - 18:00
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Redes sociales -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">
                                <i class="bi bi-share me-2 text-primary"></i>Sígueme en redes
                            </h5>
                            <div class="d-flex gap-2">
                                <a href="#" class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-linkedin"></i>
                                </a>
                                <a href="#" class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-github"></i>
                                </a>
                                <a href="#" class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-twitter"></i>
                                </a>
                                <a href="#" class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Tiempo de respuesta -->
                    <div class="card border-0 shadow-sm bg-light">
                        <div class="card-body p-4 text-center">
                            <i class="bi bi-stopwatch text-primary fs-1 mb-3"></i>
                            <h6 class="fw-bold">Tiempo de respuesta</h6>
                            <p class="text-muted small mb-0">
                                Normalmente respondo en menos de 24 horas.
                                Para proyectos urgentes, contáctame por teléfono.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mapa o sección adicional -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h3 class="display-6 fw-bold mb-3">¿Prefieres una llamada?</h3>
            <p class="lead text-muted mb-4">
                Si prefieres hablar directamente, puedes agendar una videollamada gratuita de 30 minutos.
            </p>
            <a href="#" class="btn btn-primary btn-lg">
                <i class="bi bi-camera-video me-2"></i>Agendar videollamada
            </a>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 text-center">
                <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                     style="width: 80px; height: 80px;">
                    <i class="bi bi-chat-dots fs-1 text-primary"></i>
                </div>
                <h5 class="fw-bold">Consulta inicial</h5>
                <p class="text-muted">
                    Analizamos tu proyecto y objetivos para definir la mejor estrategia.
                </p>
            </div>
            <div class="col-lg-4 text-center">
                <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                     style="width: 80px; height: 80px;">
                    <i class="bi bi-file-earmark-text fs-1 text-success"></i>
                </div>
                <h5 class="fw-bold">Propuesta detallada</h5>
                <p class="text-muted">
                    Recibirás una propuesta completa con tiempos, costos y alcance del proyecto.
                </p>
            </div>
            <div class="col-lg-4 text-center">
                <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                     style="width: 80px; height: 80px;">
                    <i class="bi bi-rocket fs-1 text-warning"></i>
                </div>
                <h5 class="fw-bold">¡Manos a la obra!</h5>
                <p class="text-muted">
                    Una vez aprobada la propuesta, comenzamos el desarrollo de tu proyecto.
                </p>
            </div>
        </div>
    </div>
</section>

<?php
// Procesamiento del formulario de contacto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nombre'])) {
    // Aquí iría la lógica para procesar el formulario
    // Por ahora solo redirigimos con un mensaje de éxito
    header('Location: index.php?page=contact&sent=true');
    exit;
}
?>
