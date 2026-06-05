<?php
/**
 * Componente: Testimonios — compacto
 *
 * @var array $testimonials
 */
$testimonials = $testimonials ?? [];
?>
<section class="testimonials-section section-block" id="testimonios" aria-label="Testimonios">
    <div class="container">
        <div class="section-header text-center mb-4">
            <h2 class="section-title">Lo dicen ellos</h2>
        </div>

        <?php if (!empty($testimonials)): ?>
        <div class="row g-3">
            <?php foreach ($testimonials as $index => $testimonial): ?>
            <div class="col-md-4">
                <blockquote class="testimonial-card testimonial-card-compact">
                    <div class="testimonial-rating">
                        <?php for ($i = 0; $i < (int) ($testimonial['rating'] ?? 5); $i++): ?>
                        <i class="bi bi-star-fill"></i>
                        <?php endfor; ?>
                    </div>
                    <p class="testimonial-text">"<?= e($testimonial['text'] ?? '') ?>"</p>
                    <footer class="testimonial-author">
                        <div>
                            <cite class="testimonial-name"><?= e(maskName($testimonial['name'] ?? '')) ?></cite>
                            <span class="testimonial-city"><?= e($testimonial['city'] ?? '') ?></span>
                        </div>
                    </footer>
                </blockquote>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
