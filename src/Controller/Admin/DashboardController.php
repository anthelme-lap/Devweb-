<?php

namespace App\Controller\Admin;

use App\Entity\Team;
use App\Entity\Slider;
use App\Entity\AboutUs;
use App\Entity\Contact;
use App\Entity\Services;
use App\Entity\Whoareyou;
use App\Controller\HomeController;
use App\Controller\ContactController;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\Admin\ContactCrudController;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
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
        $url = $this->adminUrlGenerator->setController(SliderCrudController::class)->generateUrl();
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
            MenuItem::linkToCrud('Ajouter', 'fas fa-plus', Slider::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher', 'fas fa-eye', Slider::class)->setAction(Crud::PAGE_INDEX)
        ]);
        yield MenuItem::subMenu('SERVICES', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter', 'fas fa-plus', Services::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher', 'fas fa-eye', Services::class)->setAction(Crud::PAGE_INDEX)
        ]);
        yield MenuItem::subMenu('QUI SOMMES-NOUS ?', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter', 'fas fa-plus', Whoareyou::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher', 'fas fa-eye', Whoareyou::class)->setAction(Crud::PAGE_INDEX)
        ]);
        yield MenuItem::subMenu('A PROPOS DE NOUS', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter', 'fas fa-plus', AboutUs::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher', 'fas fa-eye', AboutUs::class)->setAction(Crud::PAGE_INDEX)
        ]);
        yield MenuItem::subMenu('EQUIPE', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajouter', 'fas fa-plus', Team::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Afficher', 'fas fa-eye', Team::class)->setAction(Crud::PAGE_INDEX)
        ]);

    }
}
