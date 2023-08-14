<?php

namespace App\Controller;

use Twig\Environment;
use Symfony\Component\HttpFoundation\Response;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class WithoutTwigCarController
{
    const PATH_TO_TEMPLATES = 'templates';
    /**
     * composer require twig
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function carDetails(): Response
    {
        $twig = new Environment(
            new FilesystemLoader(self::PATH_TO_TEMPLATES)
        );

        $car = [
            'brand' => 'Audi',
            'model' => 'A6',
        ];

        $html = $twig->render('car/index.html.twig', [
            'car' => $car,
        ]);

        return new Response($html);
    }
}
