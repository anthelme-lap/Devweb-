<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use App\Controller\HomeController;
use App\Controller\ContactController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    { 
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();
        $url = $this->adminUrlGenerator->setController(ContactController::class)->generateUrl();
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('DevWeb');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Tableau De Bord');
        yield MenuItem::subMenu('Slider', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter', 'fas fa-plus', Contact::class)
        ]);
        yield MenuItem::section('Tableau De Bord');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
