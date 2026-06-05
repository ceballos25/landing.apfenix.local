<?php
/**
 * Layout principal de la landing page
 *
 * @var string $content Contenido renderizado de la vista
 * @var string $pageTitle Título de la página
 */

$primaryColor   = e(config('colors.primary'));
$secondaryColor = e(config('colors.secondary'));
$brandName      = e(config('brand'));
$appUrl         = e(config('url'));
$description    = e(config('seo.description'));
$keywords       = e(config('seo.keywords'));
$ogImage        = e(url(config('seo.og_image')));
$whatsappUrl    = e(config('whatsapp'));
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- SEO Meta Tags -->
    <title><?= e($pageTitle ?? $brandName) ?></title>
    <meta name="description" content="<?= $description ?>">
    <meta name="keywords" content="<?= $keywords ?>">
    <meta name="author" content="<?= $brandName ?>">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?= $appUrl ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= $appUrl ?>">
    <meta property="og:title" content="<?= e($pageTitle ?? $brandName) ?>">
    <meta property="og:description" content="<?= $description ?>">
    <meta property="og:image" content="<?= $ogImage ?>">
    <meta property="og:locale" content="es_CO">
    <meta property="og:site_name" content="<?= $brandName ?>">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= e($pageTitle ?? $brandName) ?>">
    <meta name="twitter:description" content="<?= $description ?>">
    <meta name="twitter:image" content="<?= $ogImage ?>">

    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="<?= asset(ltrim((string) config('logo', '/assets/img/logo.jpg'), '/')) ?>">
    <link rel="apple-touch-icon" href="<?= asset(ltrim((string) config('logo', '/assets/img/logo.jpg'), '/')) ?>">

    <!-- Preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Google Fonts — Montserrat (misma familia que apfenix.com) -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= asset('assets/css/main.css?v=5') ?>">

    <!-- CSS Variables dinámicas desde .env -->
    <style>
        :root {
            --color-primary: <?= $primaryColor ?>;
            --color-primary-light: <?= e(config('colors.primary_light', '#451552')) ?>;
            --color-secondary: <?= e(config('colors.secondary')) ?>;
            --color-dark: <?= e(config('colors.dark', '#1A1A1A')) ?>;
            --color-primary-rgb: <?= implode(',', sscanf($primaryColor, "#%02x%02x%02x") ?: [45, 4, 52]) ?>;
            --color-secondary-rgb: <?= implode(',', sscanf((string) config('colors.secondary'), "#%02x%02x%02x") ?: [212, 175, 55]) ?>;
        }
    </style>

    <?php if ($pixelId = config('analytics.meta_pixel')): ?>
    <!-- Meta Pixel -->
    <script>
        !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
        n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
        document,'script','https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '<?= e($pixelId) ?>');
        fbq('track', 'PageView');
    </script>
    <?php endif; ?>

    <?php if ($gaId = config('analytics.google')): ?>
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?= e($gaId) ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '<?= e($gaId) ?>');
    </script>
    <?php endif; ?>
</head>
<body>

    <?php component('site-header'); ?>

    <main id="main-content">
        <?= $content ?>
    </main>

    <?php component('footer'); ?>
    <?php component('mobile-cta-bar'); ?>
    <?php component('whatsapp-float'); ?>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Custom JS -->
    <script src="<?= asset('assets/js/main.js?v=5') ?>" defer></script>
</body>
</html>
