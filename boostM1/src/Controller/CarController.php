<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends AbstractController
{
    /**
     * @Route("/car", name="car")
     */
    public function index(): Response
    {
        $car = [
            'brand' => 'Audi',
            'model' => 'A6',
        ];

        return $this->render('car/index.html.twig', [
            'car' => $car,
        ]);
    }
}
