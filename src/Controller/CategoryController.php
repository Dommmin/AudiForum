<?php

namespace App\Controller;

use App\Repository\CarRepository;
use App\Repository\ModelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/{slug}/{name}', name: 'app_car')]
    public function index(CarRepository $carRepository, string $name, string $slug, ModelRepository $modelRepository): Response
    {
        $models = $modelRepository->findOneByModel($name);

        $cars = $carRepository->findOneByCar($slug);

        return $this->render('car/index.html.twig', [
            'models' => $models,
            'cars' => $cars,
        ]);
    }
}
