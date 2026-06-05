<?php
/**
 * Componente: Hero Section — conversión directa
 */
$brand        = e(config('brand'));
$whatsapp     = e(config('whatsapp'));
$comprobantes = $comprobantes ?? loadJson('comprobantes.json');
$destacado    = $comprobantes[0] ?? null;
?>
<section class="hero-section" id="inicio" aria-label="Sección principal">
    <div class="hero-bg-elements" aria-hidden="true">
        <div class="hero-gradient-orb hero-orb-1"></div>
        <div class="hero-gradient-orb hero-orb-2"></div>
    </div>

    <div class="container">
        <div class="row align-items-center py-5 hero-row">
            <div class="col-lg-6">
                <div class="hero-content">
                    <span class="hero-badge">
                        <i class="bi bi-geo-alt-fill me-1"></i> Colombia · Pagos verificados
                    </span>

                    <h1 class="hero-title">
                        Pagos reales.<br>Comunidad <span class="text-gradient">activa hoy</span>.
                    </h1>

                    <p class="hero-subtitle">
                        Únete al grupo de WhatsApp. Comprobantes publicados, bendecidos confirmados, dinámicas diarias.
                    </p>

                    <a href="<?= $whatsapp ?>" class="btn btn-whatsapp btn-hero-cta"
                       target="_blank" rel="noopener noreferrer" data-track="hero-cta-primary">
                        <i class="bi bi-whatsapp"></i>
                        <span>
                            <strong>Entrar al grupo ahora</strong>
                            <small>Gratis · Respuesta inmediata</small>
                        </span>
                    </a>

                    <div class="hero-trust-badges">
                        <div class="trust-badge"><i class="bi bi-shield-check"></i> Nequi & Bancolombia</div>
                        <div class="trust-badge"><i class="bi bi-people-fill"></i> +850 en el grupo</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <?php if ($destacado): ?>
                <div class="hero-proof-card">
                    <div class="hero-proof-label">
                        <i class="bi bi-receipt"></i> Último comprobante publicado
                    </div>
                    <img src="<?= e(asset(ltrim($destacado['image'] ?? '', '/'))) ?>"
                         alt="Comprobante — <?= e($destacado['name'] ?? '') ?>"
                         class="hero-proof-image"
                         loading="eager">
                    <div class="hero-proof-info">
                        <strong><?= e($destacado['name'] ?? '') ?></strong>
                        <span class="hero-proof-amount"><?= e($destacado['amount'] ?? '') ?></span>
                    </div>
                    <a href="<?= $whatsapp ?>" class="btn btn-primary btn-sm w-100 mt-3"
                       target="_blank" rel="noopener noreferrer" data-track="hero-proof-cta">
                        Yo también quiero participar
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
