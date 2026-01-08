<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario de Eventos - Desarrollo Web Moderno</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>
<body class="bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 min-h-screen">
    <?php include '../includes/header.php'; ?>

    <?php
    // Datos del calendario (simulados)
    $eventos = [
        [
            'titulo' => 'Reunión de Equipo',
            'fecha' => '2024-10-15',
            'hora' => '09:00',
            'tipo' => 'reunion',
            'descripcion' => 'Reunión semanal del equipo de desarrollo'
        ],
        [
            'titulo' => 'Entrega Proyecto TechStore',
            'fecha' => '2024-10-18',
            'hora' => '14:00',
            'tipo' => 'entrega',
            'descripcion' => 'Presentación final del proyecto e-commerce'
        ],
        [
            'titulo' => 'Workshop Frontend',
            'fecha' => '2024-10-22',
            'hora' => '10:00',
            'tipo' => 'formacion',
            'descripcion' => 'Taller de nuevas tecnologías Frontend'
        ],
        [
            'titulo' => 'Review Código Analytics',
            'fecha' => '2024-10-25',
            'hora' => '11:00',
            'tipo' => 'revision',
            'descripcion' => 'Revisión de código del dashboard de analytics'
        ]
    ];

    // Obtener el mes actual
    $mes_actual = date('n');
    $año_actual = date('Y');
    $primer_dia = mktime(0, 0, 0, $mes_actual, 1, $año_actual);
    $nombre_mes = date('F', $primer_dia);
    $dias_mes = date('t', $primer_dia);
    $dia_semana = date('w', $primer_dia);
    ?>

    <!-- Hero Section del Calendario -->
    <div class="relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-16">
            <div class="text-center mb-16">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 animate-fade-in-up">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-400">Calendario</span> de Eventos
                </h1>
                <p class="text-xl md:text-2xl text-gray-300 mb-8 max-w-3xl mx-auto">
                    Mantente al día con nuestros proyectos, reuniones y eventos importantes
                </p>
            </div>

            <!-- Navegación del Calendario -->
            <div class="flex justify-between items-center mb-8 bg-white/10 backdrop-blur-lg rounded-2xl p-4 border border-white/20">
                <button class="flex items-center gap-2 text-white hover:text-blue-400 transition-colors">
                    <span class="material-symbols-outlined">chevron_left</span>
                    Anterior
                </button>
                <h2 class="text-2xl font-bold text-white capitalize"><?php echo $nombre_mes . ' ' . $año_actual; ?></h2>
                <button class="flex items-center gap-2 text-white hover:text-blue-400 transition-colors">
                    Siguiente
                    <span class="material-symbols-outlined">chevron_right</span>
                </button>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Calendario Principal -->
                <div class="lg:col-span-2">
                    <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20">
                        <!-- Días de la semana -->
                        <div class="grid grid-cols-7 gap-1 mb-4">
                            <?php
                            $dias_semana = ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'];
                            foreach ($dias_semana as $dia) {
                                echo "<div class='text-center text-gray-300 font-semibold py-2'>$dia</div>";
                            }
                            ?>
                        </div>

                        <!-- Días del mes -->
                        <div class="grid grid-cols-7 gap-1">
                            <?php
                            // Espacios en blanco para el primer día del mes
                            for ($i = 0; $i < $dia_semana; $i++) {
                                echo "<div class='h-12'></div>";
                            }

                            // Días del mes
                            for ($dia = 1; $dia <= $dias_mes; $dia++) {
                                $fecha_completa = sprintf('%04d-%02d-%02d', $año_actual, $mes_actual, $dia);
                                $tiene_evento = false;

                                foreach ($eventos as $evento) {
                                    if ($evento['fecha'] === $fecha_completa) {
                                        $tiene_evento = true;
                                        break;
                                    }
                                }

                                $clase_dia = "h-12 flex items-center justify-center text-white rounded-lg cursor-pointer transition-all duration-300 hover:bg-white/20";
                                if ($tiene_evento) {
                                    $clase_dia .= " bg-gradient-to-r from-blue-500 to-purple-600 font-bold";
                                } else {
                                    $clase_dia .= " hover:bg-white/10";
                                }

                                if ($dia == date('j')) {
                                    $clase_dia .= " ring-2 ring-yellow-400";
                                }

                                echo "<div class='$clase_dia'>$dia</div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <!-- Panel de Eventos -->
                <div class="space-y-6">
                    <!-- Próximos Eventos -->
                    <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20">
                        <h3 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                            <span class="material-symbols-outlined">event</span>
                            Próximos Eventos
                        </h3>

                        <?php foreach ($eventos as $evento): ?>
                            <?php
                            $fecha_evento = DateTime::createFromFormat('Y-m-d', $evento['fecha']);
                            $fecha_formateada = $fecha_evento->format('d/m/Y');

                            // Definir colores por tipo de evento
                            $colores = [
                                'reunion' => 'from-blue-500 to-blue-600',
                                'entrega' => 'from-green-500 to-green-600',
                                'formacion' => 'from-purple-500 to-purple-600',
                                'revision' => 'from-orange-500 to-orange-600'
                            ];

                            $iconos = [
                                'reunion' => 'groups',
                                'entrega' => 'assignment_turned_in',
                                'formacion' => 'school',
                                'revision' => 'code_blocks'
                            ];
                            ?>

                            <div class="mb-4 bg-gradient-to-r <?php echo $colores[$evento['tipo']]; ?> rounded-xl p-4 text-white">
                                <div class="flex items-start gap-3">
                                    <span class="material-symbols-outlined mt-1"><?php echo $iconos[$evento['tipo']]; ?></span>
                                    <div class="flex-1">
                                        <h4 class="font-semibold mb-1"><?php echo $evento['titulo']; ?></h4>
                                        <p class="text-sm opacity-90 mb-2"><?php echo $evento['descripcion']; ?></p>
                                        <div class="flex items-center gap-4 text-sm">
                                            <span class="flex items-center gap-1">
                                                <span class="material-symbols-outlined text-sm">calendar_today</span>
                                                <?php echo $fecha_formateada; ?>
                                            </span>
                                            <span class="flex items-center gap-1">
                                                <span class="material-symbols-outlined text-sm">schedule</span>
                                                <?php echo $evento['hora']; ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Acciones Rápidas -->
                    <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20">
                        <h3 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                            <span class="material-symbols-outlined">add_circle</span>
                            Acciones Rápidas
                        </h3>

                        <div class="space-y-3">
                            <button class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-3 px-4 rounded-lg hover:from-blue-600 hover:to-purple-700 transition-all duration-300 flex items-center gap-2">
                                <span class="material-symbols-outlined">add</span>
                                Crear Evento
                            </button>

                            <button class="w-full bg-white/10 text-white py-3 px-4 rounded-lg border border-white/20 hover:bg-white/20 transition-all duration-300 flex items-center gap-2">
                                <span class="material-symbols-outlined">groups</span>
                                Programar Reunión
                            </button>

                            <button class="w-full bg-white/10 text-white py-3 px-4 rounded-lg border border-white/20 hover:bg-white/20 transition-all duration-300 flex items-center gap-2">
                                <span class="material-symbols-outlined">notification_add</span>
                                Configurar Recordatorio
                            </button>
                        </div>
                    </div>

                    <!-- Estadísticas del Mes -->
                    <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20">
                        <h3 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                            <span class="material-symbols-outlined">analytics</span>
                            Este Mes
                        </h3>

                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-300">Total Eventos</span>
                                <span class="text-2xl font-bold text-blue-400"><?php echo count($eventos); ?></span>
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="text-gray-300">Reuniones</span>
                                <span class="text-lg font-semibold text-green-400">
                                    <?php echo count(array_filter($eventos, function($e) { return $e['tipo'] === 'reunion'; })); ?>
                                </span>
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="text-gray-300">Entregas</span>
                                <span class="text-lg font-semibold text-purple-400">
                                    <?php echo count(array_filter($eventos, function($e) { return $e['tipo'] === 'entrega'; })); ?>
                                </span>
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="text-gray-300">Formación</span>
                                <span class="text-lg font-semibold text-orange-400">
                                    <?php echo count(array_filter($eventos, function($e) { return $e['tipo'] === 'formacion'; })); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vista de Lista de Eventos -->
            <div class="mt-12">
                <h2 class="text-3xl font-bold text-white mb-8 text-center">Todos los Eventos del Mes</h2>

                <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-white/20">
                                    <th class="text-left text-white font-semibold py-3 px-4">Evento</th>
                                    <th class="text-left text-white font-semibold py-3 px-4">Fecha</th>
                                    <th class="text-left text-white font-semibold py-3 px-4">Hora</th>
                                    <th class="text-left text-white font-semibold py-3 px-4">Tipo</th>
                                    <th class="text-left text-white font-semibold py-3 px-4">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($eventos as $evento): ?>
                                    <?php
                                    $fecha_evento = DateTime::createFromFormat('Y-m-d', $evento['fecha']);
                                    $fecha_formateada = $fecha_evento->format('d/m/Y');

                                    $badges_tipo = [
                                        'reunion' => 'bg-blue-500/20 text-blue-300',
                                        'entrega' => 'bg-green-500/20 text-green-300',
                                        'formacion' => 'bg-purple-500/20 text-purple-300',
                                        'revision' => 'bg-orange-500/20 text-orange-300'
                                    ];
                                    ?>
                                    <tr class="border-b border-white/10 hover:bg-white/5 transition-colors">
                                        <td class="py-4 px-4">
                                            <div>
                                                <div class="text-white font-medium"><?php echo $evento['titulo']; ?></div>
                                                <div class="text-gray-300 text-sm"><?php echo $evento['descripcion']; ?></div>
                                            </div>
                                        </td>
                                        <td class="py-4 px-4 text-gray-300"><?php echo $fecha_formateada; ?></td>
                                        <td class="py-4 px-4 text-gray-300"><?php echo $evento['hora']; ?></td>
                                        <td class="py-4 px-4">
                                            <span class="px-2 py-1 rounded-full text-xs <?php echo $badges_tipo[$evento['tipo']]; ?>">
                                                <?php echo ucfirst($evento['tipo']); ?>
                                            </span>
                                        </td>
                                        <td class="py-4 px-4">
                                            <div class="flex gap-2">
                                                <button class="text-blue-400 hover:text-blue-300 transition-colors">
                                                    <span class="material-symbols-outlined text-sm">edit</span>
                                                </button>
                                                <button class="text-red-400 hover:text-red-300 transition-colors">
                                                    <span class="material-symbols-outlined text-sm">delete</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../pages/footer.php'; ?>

    <script>
        // JavaScript para interactividad del calendario
        document.addEventListener('DOMContentLoaded', function() {
            // Agregar interactividad a los días del calendario
            const dias = document.querySelectorAll('.grid.grid-cols-7 > div:not(.text-gray-300)');

            dias.forEach(dia => {
                dia.addEventListener('click', function() {
                    // Remover selección anterior
                    dias.forEach(d => d.classList.remove('ring-2', 'ring-blue-400'));
                    // Agregar selección al día clickeado
                    this.classList.add('ring-2', 'ring-blue-400');
                });
            });

            // Simulación de filtros para los botones
            const botones = document.querySelectorAll('button');
            botones.forEach(boton => {
                boton.addEventListener('click', function() {
                    // Agregar efecto de click
                    this.classList.add('scale-95');
                    setTimeout(() => {
                        this.classList.remove('scale-95');
                    }, 150);
                });
            });
        });
    </script>
</body>
</html>
