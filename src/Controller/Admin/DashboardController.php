<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Annonce;
use App\Entity\Apply;
use App\Entity\Categorie;
use App\Entity\Messages;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        //return parent::index();
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(UserCrudController::class)->generateUrl());
        return $this->redirect($routeBuilder->setController(AnnonceCrudController::class)->generateUrl());
        return $this->redirect($routeBuilder->setController(CategorieCrudController::class)->generateUrl());
        return $this->redirect($routeBuilder->setController(ApplyCrudController::class)->generateUrl());
        return $this->redirect($routeBuilder->setController(MessagesCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Admin DASHBOARD');
    }

    public function configureMenuItems(): iterable
    {
       // yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Les Utilisateurs', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Les Annonces', 'fas fa-list', Annonce::class);
        yield MenuItem::linkToCrud('Les Categories', 'fas fa-list', Categorie::class);
        yield MenuItem::linkToCrud('Les Apply', 'fas fa-list', Apply::class);
        yield MenuItem::linkToCrud('Les Messages', 'fas fa-list', Messages::class);
    }
}
