<?php
/**
 * Controlador principal de la landing page
 */

declare(strict_types=1);

namespace App\Controllers;

class HomeController
{
    public function index(): void
    {
        $data = [
            'pageTitle'    => config('brand') . ' — Entra al grupo · Colombia',
            'comprobantes' => loadJson('comprobantes.json'),
            'testimonials' => loadJson('testimonials.json'),
            'stats'        => loadJson('stats.json'),
            'howItWorks'   => $this->getHowItWorksSteps(),
        ];

        view('home', $data);
    }

    private function getHowItWorksSteps(): array
    {
        return [
            [
                'icon'        => 'bi-whatsapp',
                'title'       => 'Entra al grupo',
                'description' => 'Un clic y ya estás dentro.',
            ],
            [
                'icon'        => 'bi-hand-thumbs-up',
                'title'       => 'Participa',
                'description' => 'Dinámicas diarias, fáciles y claras.',
            ],
            [
                'icon'        => 'bi-shield-check',
                'title'       => 'Comprobante publicado',
                'description' => 'Cada pago queda verificado para todos.',
            ],
        ];
    }
}
