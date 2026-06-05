<?php
/**
 * Componente: Barra de urgencia superior
 */
$whatsapp = e(config('whatsapp'));
?>
<div class="promo-bar">
    <div class="container d-flex flex-wrap align-items-center justify-content-center justify-content-md-between gap-2 py-2">
        <span class="promo-bar-text">
            <i class="bi bi-lightning-charge-fill"></i>
            Dinámica activa hoy · Cupos limitados en el grupo
        </span>
        <a href="<?= $whatsapp ?>" class="promo-bar-cta" target="_blank" rel="noopener noreferrer" data-track="promo-bar">
            Entrar ahora <i class="bi bi-whatsapp"></i>
        </a>
    </div>
</div>
