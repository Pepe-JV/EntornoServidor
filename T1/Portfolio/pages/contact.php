<section class="bg-gradient-to-r from-[#2c3e50] to-[#34495e] text-white py-20 relative overflow-hidden">
    <!-- Elementos decorativos de fondo -->
    <div class="absolute top-0 left-0 w-full h-full opacity-10">
        <div class="absolute top-10 right-10 w-40 h-40 bg-[#1abc9c] rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 left-10 w-60 h-60 bg-[#3498db] rounded-full blur-3xl"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Contacto</h1>
        <div class="h-1 w-24 bg-[#1abc9c] mx-auto mb-6 rounded-full"></div>
        <p class="text-xl max-w-3xl mx-auto text-gray-200 font-light">Conversemos sobre sus necesidades y cómo podemos trabajar juntos para alcanzar sus objetivos.</p>
    </div>
</section>

<section class="py-20 bg-white relative">
    <div class="container mx-auto px-6">
        <div class="flex flex-col lg:flex-row gap-16">
            <!-- Formulario de contacto -->
            <div class="w-full lg:w-7/12">
                <div class="bg-white rounded-lg shadow-lg p-8 relative z-10 border border-gray-100">
                    <h2 class="text-2xl font-bold mb-2 text-[#2c3e50] relative inline-block pb-3">
                        Solicitar información
                        <span class="absolute bottom-0 left-0 w-1/3 h-1 bg-[#1abc9c] rounded-full"></span>
                    </h2>
                    <p class="text-gray-600 mb-8">
                        Complete el formulario y me pondré en contacto con usted a la brevedad para discutir su proyecto con más detalle.
                    </p>

                    <form id="contactForm" action="includes/process_contact.php" method="post" class="space-y-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-gray-700 font-medium mb-2 text-sm">Nombre completo <span class="text-[#1abc9c]">*</span></label>
                                <input type="text" id="name" name="name" required class="w-full px-4 py-3 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-[#1abc9c] focus:border-transparent transition-colors">
                            </div>
                            <div>
                                <label for="email" class="block text-gray-700 font-medium mb-2 text-sm">Correo electrónico <span class="text-[#1abc9c]">*</span></label>
                                <input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-[#1abc9c] focus:border-transparent transition-colors">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="phone" class="block text-gray-700 font-medium mb-2 text-sm">Teléfono</label>
                                <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-[#1abc9c] focus:border-transparent transition-colors">
                            </div>
                            <div>
                                <label for="company" class="block text-gray-700 font-medium mb-2 text-sm">Empresa</label>
                                <input type="text" id="company" name="company" class="w-full px-4 py-3 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-[#1abc9c] focus:border-transparent transition-colors">
                            </div>
                        </div>

                        <div>
                            <label for="subject" class="block text-gray-700 font-medium mb-2 text-sm">Asunto <span class="text-[#1abc9c]">*</span></label>
                            <input type="text" id="subject" name="subject" required class="w-full px-4 py-3 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-[#1abc9c] focus:border-transparent transition-colors">
                        </div>

                        <div>
                            <label for="message" class="block text-gray-700 font-medium mb-2 text-sm">Mensaje <span class="text-[#1abc9c]">*</span></label>
                            <textarea id="message" name="message" rows="6" required class="w-full px-4 py-3 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-[#1abc9c] focus:border-transparent transition-colors"></textarea>
                        </div>

                        <div class="flex items-start">
                            <input type="checkbox" id="privacy" name="privacy" required class="mt-1 mr-3">
                            <label for="privacy" class="text-gray-600 text-sm">Acepto la <a href="#" class="text-[#1abc9c] hover:underline">política de privacidad</a> y el tratamiento de mis datos para la gestión de esta solicitud.</label>
                        </div>

                        <div>
                            <button type="submit" class="btn-primary py-3 px-8 rounded-md font-medium transition-all duration-300">
                                Enviar mensaje
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Información de contacto -->
            <div class="w-full lg:w-5/12">
                <div class="bg-[#2c3e50] text-white p-8 rounded-lg shadow-lg h-full relative overflow-hidden">
                    <!-- Elementos decorativos de fondo -->
                    <div class="absolute top-0 right-0 w-40 h-40 bg-[#1abc9c] rounded-full opacity-10"></div>
                    <div class="absolute bottom-0 left-0 w-60 h-60 bg-[#3498db] rounded-full opacity-10"></div>

                    <div class="relative z-10">
                        <h2 class="text-2xl font-bold mb-8 relative inline-block pb-3">
                            Información de contacto
                            <span class="absolute bottom-0 left-0 w-1/3 h-1 bg-[#1abc9c] rounded-full"></span>
                        </h2>

                        <div class="space-y-8">
                            <div class="flex items-start">
                                <div class="bg-[#1abc9c] bg-opacity-20 p-3 rounded-lg mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#1abc9c]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-lg text-[#1abc9c]">Correo electrónico</h3>
                                    <p class="text-gray-300 mt-1">contacto@jsdev.com</p>
                                    <p class="text-gray-400 text-sm mt-1">Respuesta en menos de 24 horas</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="bg-[#1abc9c] bg-opacity-20 p-3 rounded-lg mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#1abc9c]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-lg text-[#1abc9c]">Teléfono</h3>
                                    <p class="text-gray-300 mt-1">+34 600 000 000</p>
                                    <p class="text-gray-400 text-sm mt-1">Lunes a viernes, 9:00 - 18:00</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="bg-[#1abc9c] bg-opacity-20 p-3 rounded-lg mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#1abc9c]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-lg text-[#1abc9c]">Ubicación</h3>
                                    <p class="text-gray-300 mt-1">Madrid, España</p>
                                    <p class="text-gray-400 text-sm mt-1">Disponibilidad para proyectos remotos</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-10">
                            <h3 class="font-semibold text-lg text-[#1abc9c] mb-4">Conectemos</h3>
                            <div class="flex space-x-4">
                                <a href="#" class="bg-[#34495e] hover:bg-[#1abc9c] text-white p-3 rounded-lg transition-colors duration-300">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                                    </svg>
                                </a>
                                <a href="#" class="bg-[#34495e] hover:bg-[#1abc9c] text-white p-3 rounded-lg transition-colors duration-300">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                                <a href="#" class="bg-[#34495e] hover:bg-[#1abc9c] text-white p-3 rounded-lg transition-colors duration-300">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm-1 15h-2v-6h2v6zm-1-7c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm5 7h-2v-3.5c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5V17h-2v-6h2v1.5c.75-.69 1.75-1.5 3-1.5 2.76 0 5 2.24 5 5V17z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold mb-4 text-[#2c3e50]">Ubicación</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Disponibilidad para reuniones presenciales en Madrid o encuentros virtuales para clientes internacionales.</p>
            <div class="h-1 w-24 bg-[#1abc9c] mx-auto mt-6 rounded-full"></div>
        </div>

        <div class="h-96 rounded-lg overflow-hidden shadow-lg border border-gray-100">
            <!-- Mapa de Google -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d194348.1398825228!2d-3.819638707538454!3d40.43813108210035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd422997800a3c81%3A0xc436dec1618c2269!2sMadrid!5e0!3m2!1ses!2ses!4v1633537178991!5m2!1ses!2ses" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</section>

<!-- FAQs -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold mb-4 text-[#2c3e50]">Preguntas Frecuentes</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Respuestas a las consultas más habituales sobre mi metodología de trabajo y servicios.</p>
            <div class="h-1 w-24 bg-[#1abc9c] mx-auto mt-6 rounded-full"></div>
        </div>

        <div class="max-w-4xl mx-auto space-y-6">
            <div class="bg-white rounded-lg shadow-md border border-gray-100 p-6 hover:shadow-lg transition-shadow">
                <h3 class="text-xl font-semibold mb-3 text-[#2c3e50]">¿Cuál es su proceso de trabajo para nuevos proyectos?</h3>
                <p class="text-gray-600">Mi metodología incluye una fase inicial de análisis y definición de requisitos, seguida de diseño, desarrollo, pruebas e implementación. Mantengo una comunicación constante con el cliente y entregas periódicas para garantizar que el proyecto avanza según lo esperado.</p>
            </div>

            <div class="bg-white rounded-lg shadow-md border border-gray-100 p-6 hover:shadow-lg transition-shadow">
                <h3 class="text-xl font-semibold mb-3 text-[#2c3e50]">¿Cuáles son sus plazos habituales de entrega?</h3>
                <p class="text-gray-600">Los plazos varían según la complejidad del proyecto. Un sitio web corporativo puede estar listo en 3-4 semanas, mientras que aplicaciones más complejas pueden requerir 2-3 meses. Siempre proporciono un cronograma detallado al inicio del proyecto.</p>
            </div>

            <div class="bg-white rounded-lg shadow-md border border-gray-100 p-6 hover:shadow-lg transition-shadow">
                <h3 class="text-xl font-semibold mb-3 text-[#2c3e50]">¿Ofrece servicios de mantenimiento posteriores?</h3>
                <p class="text-gray-600">Sí, ofrezco planes de mantenimiento y soporte técnico adaptados a las necesidades de cada cliente, que incluyen actualizaciones de seguridad, mejoras de rendimiento y resolución de incidencias.</p>
            </div>

            <div class="bg-white rounded-lg shadow-md border border-gray-100 p-6 hover:shadow-lg transition-shadow">
                <h3 class="text-xl font-semibold mb-3 text-[#2c3e50]">¿Cómo gestiona los derechos de propiedad del código?</h3>
                <p class="text-gray-600">Una vez finalizado el proyecto y completado el pago, todos los derechos de propiedad del código fuente se transfieren al cliente. Proporciono documentación técnica completa y acceso a todos los repositorios y recursos utilizados.</p>
            </div>
        </div>
    </div>
</section>
