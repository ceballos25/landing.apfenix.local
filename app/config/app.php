<?php
/**
 * Configuración global de la aplicación
 * Valores cargados desde .env con fallbacks seguros
 */

declare(strict_types=1);

return [
    'name'        => env('APP_NAME', 'APFENIX'),
    'url'         => rtrim((string) env('APP_URL', 'http://localhost'), '/'),
    'brand'       => env('BRAND_NAME', 'AP FENIX'),
    'logo'        => env('BRAND_LOGO', '/assets/img/logo.jpg'),
    'whatsapp'    => env('WHATSAPP_URL', '#'),
    'colors'      => [
        'primary'   => env('PRIMARY_COLOR', '#2D0434'),
        'secondary' => env('SECONDARY_COLOR', '#D4AF37'),
        'dark'      => env('DARK_COLOR', '#1A1A1A'),
        'gold_light'=> env('GOLD_LIGHT', '#E8C547'),
        'gold_dark' => env('GOLD_DARK', '#B8960C'),
    ],
    'analytics'   => [
        'meta_pixel' => env('META_PIXEL_ID', ''),
        'google'     => env('GOOGLE_ANALYTICS_ID', ''),
    ],
    'seo'         => [
        'description' => env('META_DESCRIPTION', 'Únete a nuestra comunidad activa.'),
        'keywords'    => env('META_KEYWORDS', 'comunidad,participaciones,dinámicas'),
        'og_image'    => env('OG_IMAGE', '/assets/img/logo.jpg'),
    ],
    'contact'     => [
        'email'   => env('CONTACT_EMAIL', 'info@apfenix.com'),
        'phone'   => env('CONTACT_PHONE', '(+57) 320 292 5348'),
        'country' => env('CONTACT_COUNTRY', 'Colombia'),
    ],
    'developer'   => [
        'name' => env('DEVELOPER_NAME', 'Cristian Ceballos'),
        'url'  => env('DEVELOPER_URL', 'https://rifacloud-landing.cristianceballos.com/'),
    ],
    'social'      => [
        'facebook'  => env('SOCIAL_FACEBOOK', '#'),
        'instagram' => env('SOCIAL_INSTAGRAM', '#'),
        'twitter'   => env('SOCIAL_TWITTER', '#'),
        'tiktok'    => env('SOCIAL_TIKTOK', '#'),
    ],
    'paths'       => [
        'root'    => dirname(__DIR__, 2),
        'app'     => dirname(__DIR__),
        'public'  => dirname(__DIR__, 2),
        'storage' => dirname(__DIR__, 2) . '/storage',
    ],
];
