<?php

namespace App\Controller;

use App\Repository\AboutUsRepository;
use App\Repository\TeamRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{
    public function __construct(
        private TeamRepository $teamRepository,
        private AboutUsRepository $aboutUsRepository)
    {   
    }
    #[Route('/about', name: 'app_about')]
    public function index(): Response
    {
        return $this->render('about/index.html.twig',[
            'team' => $this->teamRepository->findAll(),
            'about' => $this->aboutUsRepository->findAll()
        ]);
    }
}
