<?php
/**
 * Componente: Estadísticas compactas
 *
 * @var array $stats
 */
$stats = $stats ?? [
    ['value' => '850+',  'label' => 'En la comunidad'],
    ['value' => '240+',  'label' => 'Dinámicas realizadas'],
    ['value' => '95+',   'label' => 'Bendecidos este mes'],
    ['value' => '4.9★',  'label' => 'Valoración'],
];
?>
<section class="stats-section section-block" id="estadisticas" aria-label="Estadísticas">
    <div class="container">
        <div class="row g-3 stats-grid">
            <?php foreach ($stats as $index => $stat): ?>
            <div class="col-6 col-lg-3">
                <div class="stat-card stat-card-compact">
                    <div class="stat-value"><?= e($stat['value'] ?? '0') ?></div>
                    <div class="stat-label"><?= e($stat['label'] ?? '') ?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
