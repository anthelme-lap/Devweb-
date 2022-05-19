<?php

namespace App\Controller;

use App\Entity\Services;
use App\Entity\Slider;
use App\Repository\ServicesRepository;
use App\Repository\SliderRepository;
use App\Repository\WhoareyouRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\DependencyInjection\ServicesResetter;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    public function __construct(
        private SliderRepository $sliderRepository,
        private ServicesRepository $servicesRepository,
        private WhoareyouRepository $whoareyouRepository
    ){}

    #[Route('/', name: 'app_home')]
    public function index(SliderRepository $sliderRepository): Response
    {
        return $this->render('home/index.html.twig',[
            'slider' => $sliderRepository->findByDisplay(true),
            'services' => $this->servicesRepository->findAll(),
            'whoareyou' => $this->whoareyouRepository->findAll()
        ]);
    }
}
