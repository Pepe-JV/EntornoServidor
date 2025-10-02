<div class="contact-section">
    <h3 class="section-title">📧 Contacto</h3>

    <div class="contact-form">
        <form method="POST" action="">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                echo '<div class="alert alert-success" role="alert">
                        ¡Gracias por tu mensaje! Te contactaré pronto.
                      </div>';
            }
            ?>

            <div class="mb-3">
                <label for="name" class="form-label">Nombre completo</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="subject" class="form-label">Asunto</label>
                <input type="text" class="form-control" id="subject" name="subject" required>
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Mensaje</label>
                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Enviar mensaje</button>
            </div>
        </form>

        <div class="contact-info mt-5 text-center">
            <h5>Información de contacto</h5>
            <p class="mb-1"><strong>Email:</strong> jose.justicia@email.com</p>
            <p class="mb-1"><strong>Teléfono:</strong> +34 123 456 789</p>
            <p class="mb-0"><strong>LinkedIn:</strong> /in/jose-justicia</p>
        </div>
    </div>
</div>