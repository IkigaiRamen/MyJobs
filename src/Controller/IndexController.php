<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/security", name="index")
     */
    public function indexAction()
    {
    
            /** @var \App\Entity\User $user */
    if ($this->isGranted ('ROLE_EMPLOYEUR'))
    {
        return $this->render('user/Employeur/EmployerModifierProfile.html.twig');
    }
    else {
        return $this->render('user/Travailleur/modifierProfil.html.html.twig');
    }
        throw new \Exception(AccessDeniedException::class);
    }
}
