<?php

namespace App\Controller;

use App\Entity\Slider;
use App\Repository\SliderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(SliderRepository $sliderRepository): Response
    {
        return $this->render('home/index.html.twig',[
            'slider' => $sliderRepository->findByDisplay(true)
        ]);
    }
}
