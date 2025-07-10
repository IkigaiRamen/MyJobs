<?php

namespace App\Controller;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Entity\Annonce;
use App\Entity\Apply;
use App\Entity\Education;
use App\Form\Travailleur\CvWorkFormType;
use App\Form\Travailleur\ModifierCvType;
use App\Form\Travailleur\CvEducationFormType;
use App\Form\EditAnnonceType;
use App\Form\AnnonceFormType;
use App\Form\Employeur\AnnonceEmployerType;

use App\Form\EducationFormType;
use App\Form\Employeur\ModifierProfileType;
use App\Form\Employeur\ModifySocieteType;
use App\Form\Travailleur\ModifyProfilType;
use App\Form\ModifierProfilType;
use App\Repository\AnnonceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Form\Travailleur\CvQualifType;


class UserController extends AbstractController
{


    
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/profile", name="Dashboard")
     */
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');


    /** @var \App\Entity\User $user */
    if ($this->isGranted ('ROLE_EMPLOYEUR'))
    {
        return $this->redirectToRoute('modifier_user');
    }
    else {
        return $this->redirectToRoute('modifier_travailleur');
    }
    }
    

    /**
     * @IsGranted("ROLE_TRAVAILLEUR")
     * @Route("/travailleur/cv", name="cv")
     */
    public function cv(Request $request){
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        /** @var \App\Entity\User $user */
        return $this->render('user/Travailleur/cv.html.twig');
    }

    /**
     * @IsGranted("ROLE_TRAVAILLEUR")
     * @Route("/travailleur/modifier", name="modifier_travailleur")
     */
    public function modifierProfil(Request $request){

        $user = $this->getUser();
        $form = $this->createForm(ModifyProfilType::class, $user );
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
           
            $doctrine = $this->getDoctrine()->getManager();
            $doctrine->persist($user);
            $doctrine->flush();
        }

        return $this->render('user/Travailleur/modifierProfil.html.twig', [
            'modifierProfilForm' => $form->createView()
        ]);
    }

     /**
     * @IsGranted("ROLE_TRAVAILLEUR")
     * @Route("/travailleur/MesAnnonces", name="Annonce Travailleur")
     */
    public function annonceTravailleur(Request $request){
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        /** @var \App\Entity\User $user */
        return $this->render('user/Travailleur/TravailleurManageJobs.html.twig');
    }

/**
     * @IsGranted("ROLE_TRAVAILLEUR")
     * @Route("/travailleur/GererOffres", name="GererOffres")
     */
    public function GererOffres(Request $request){
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        /** @var \App\Entity\User $user */
        return $this->render('user/Travailleur/TravailleurManageOffres.html.twig');
    }

    /**
     * @IsGranted("ROLE_TRAVAILLEUR")
     * @Route("/travailleur/modifierCV", name="modifier_CV")
     */
    public function modifierCV(Request $request){

        $user = $this->getUser();
        $usereducationform= $this->createForm(CvEducationFormType::class,$user );
        $usereducationform->handleRequest($request);
        $userform = $this->createForm(ModifierCvType::class, $user );
        $userform->handleRequest($request);
        $userwork = $this->createForm(CvWorkFormType::class, $user );
        $userwork->handleRequest($request);
        $userq = $this->createForm(CvQualifType::class, $user );
        $userq->handleRequest($request);
        if($userform->isSubmitted() && $userform->isValid()){

            $doctrine = $this->getDoctrine()->getManager();
            $doctrine->persist($user);
            $doctrine->flush();
        }

        if($usereducationform->isSubmitted() && $usereducationform->isValid()){

            $doctrine = $this->getDoctrine()->getManager();
            $doctrine->persist($user);
            $doctrine->flush();
        }

        if($userwork->isSubmitted() && $userwork->isValid()){

            $doctrine = $this->getDoctrine()->getManager();
            $doctrine->persist($user);
            $doctrine->flush();
        }

        if($userq->isSubmitted() && $userq->isValid()){

            $doctrine = $this->getDoctrine()->getManager();
            $doctrine->persist($user);
            $doctrine->flush();
        }

        return $this->render('user/Travailleur/editcv.html.twig' , [
            'modifierCVForm' => $userform->createView(),
            'CvEducationForm' => $usereducationform->createView(),
            'CvQualificationsForm'=>$userq->createview(),
            'CvWorkForm'=>$userwork->createview()
            

        ]);
    }

    /**
     * @IsGranted("ROLE_EMPLOYEUR")
     * @Route("/Employeur/Societe", name="Societe")
     */
    public function Societe(Request $request){
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        /** @var \App\Entity\User $user */
        return $this->render('user/Employeur/society.html.twig');
    }


    /**
     * @IsGranted("ROLE_EMPLOYEUR")
     * @Route("/Employeur/GererEmploi", name="GererEmploi")
     */
    public function GererEmploi(Request $request){
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        /** @var \App\Entity\User $user */
        return $this->render('user/Employeur/EmployerManageJobs.html.twig');
    }

    

    /**
     * @IsGranted("ROLE_EMPLOYEUR")
     * @Route("/Employeur/modifier", name="modifier_user")
     */
    public function modifierProfileEmployeur(Request $request){

        $user = $this->getUser();
        $form = $this->createForm(ModifierProfileType::class,$user );
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
           
            $doctrine = $this->getDoctrine()->getManager();
            $doctrine->persist($user);
            $doctrine->flush();
        }

        return $this->render('user/Employeur/EmployerModifierProfile.html.twig', [
            'modifierProfilForm' => $form->createView()
        ]);
    }

    

    /**
     * @IsGranted("ROLE_EMPLOYEUR")
     * @Route("/Employeur/ModifierSociete", name="Modifier societe")
     */
    public function modifierSociete(Request $request){

        $user = $this->getUser();

        $societeform = $this->createForm(ModifySocieteType::class,$user );
        $societeform->handleRequest($request);
        
        if($societeform->isSubmitted() && $societeform->isValid()){

            $doctrine = $this->getDoctrine()->getManager();
            $doctrine->persist($user);
            $doctrine->flush();
        }

        


        return $this->render('user/Employeur/EmployerModifierSociete.html.twig' , [
            'modifierSocieteForm' => $societeform->createView(),

        ]);
    }
 /**
     * @IsGranted("ROLE_EMPLOYEUR")
     * @Route("/Employeur/GererCandidats", name="GererCandidats")
     */
    public function GererCandidats(Request $request){
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        /** @var \App\Entity\User $user */
        return $this->render('user/Employeur/EmployerManageCandidats.html.twig');
    }






     /**
     * @Route("/users", name="users")
     */
    public function listAll()
    {
        $user= $this->getDoctrine()->getRepository(User::class)->findAll();
        return  $this->render('user/listing.html.twig',[  'user' => $user]);
    }
    
    /** 
      * @Route("/user/{id}", name="user_show")
      */
    
    public function show(int $id, Request $request): Response
     {
         $user = $this->getDoctrine()
         ->getRepository(User::class)
         ->find($id);

     if (!$user) {
         throw $this->createNotFoundException(
             'No User found for id '.$id
         );
     }
     return $this->render('user/UserShowProfile.html.twig', ['user' => $user]);
  
    }




    /**
     * @Route("/mesAnnonces", name="user_annonces")
     */
    
    public function MyPost()
    {
        
    return $this->render('user/MesAnnonces.html.twig');
  
}


/**
     * @Route("/ModifierAnnonceEmployeur/{id}", name="Myannonce_showEmployer")
     */
    
    public function showmyEmployerPost(int $id, Request $request,UserRepository $ur,AnnonceRepository $ar): Response
    {

       
       

        $annonce = $this->getDoctrine()
        ->getRepository(Annonce::class)
        ->find($id);

       
       // $user =$ur->findTravailleur();
      //  $a2[] = $user->getAnnonces();

        $sex = $annonce->getSex();
        $exp = $annonce->getExp();
        $job = $annonce->getCategorie();
        $annoncex =$ar->findExactDemandeDemploi($sex,$exp);
        
        
        //$annonceTravailleur =$ar->findOneByCityandExp($city,$exp,$type);



    if (!$annonce) {
        throw $this->createNotFoundException(
            'No Annonce found for titre '.$id
        );
    }
    $form = $this->createForm(AnnonceEmployerType::class,$annonce );
    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){
       
        $doctrine = $this->getDoctrine()->getManager();
        $doctrine->persist($annonce);
        $doctrine->flush();
    }
   
        return $this->render('user/Employeur/EmployeurEditAnnonce.html.twig', ['annonce' => $annonce ,'annoncex' => $annoncex, 'annonceForm' =>$form->createView()] );
    }
   
    

    /** 
     * @Route("/ModifierAnnonce/{id}", name="Myannonce_show")
     */
    
    public function showMyPost(int $id, Request $request,UserRepository $ur,AnnonceRepository $ar): Response
    {

       
        $annonce = $this->getDoctrine()
        ->getRepository(Annonce::class)
        ->find($id);

       
        $sex = $annonce->getSex();
        $exp = $annonce->getExp();
        $job = $annonce->getCategorie();
        $annoncex =$ar->findExactDemandeDemploi($sex,$exp,$job);
        
        
        //$annonceTravailleur =$ar->findOneByCityandExp($city,$exp,$type);



    if (!$annonce) {
        throw $this->createNotFoundException(
            'No Annonce found for titre '.$id
        );
    }
    $form = $this->createForm(AnnonceFormType::class,$annonce );
    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){
       
        $doctrine = $this->getDoctrine()->getManager();
        $doctrine->persist($annonce);
        $doctrine->flush();
    }
   
        return $this->render('user/Travailleur/TravailleurEditAnnonce.html.twig', ['annonce' => $annonce ,'annoncex' => $annoncex, 'form' =>$form->createView()] );
    }
   
    

   

}
