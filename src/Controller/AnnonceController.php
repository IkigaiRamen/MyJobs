<?php

namespace App\Controller;
use App\Entity\Annonce;
use App\Entity\Apply;
use App\Entity\User;
use App\Entity\Search;
use App\Form\Employeur\AnnonceEmployerType;
use App\Form\AnnonceFormType;
use App\Form\ApplyFormType;
use App\Form\SearchType;
use App\Repository\AnnonceRepository;
use App\Repository\UserRepository;
use PhpParser\Node\Expr\BinaryOp\Equal;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\EqualTo;




class AnnonceController extends AbstractController
{
    /**
     * @Route("/annonce", name="annonce")
     */
    public function index(Request $request, AnnonceRepository $ar)
    {
        $search = new Search();
        $form = $this->createForm(SearchType::class,$search);
    $form->handleRequest($request);
   // $annonce= [];

        //appelle la liste des annonces;
        
        $annonce = $this->getDoctrine()->getRepository(Annonce::class)->findAll();
        if($form->isSubmitted() && $form->isValid()) {
            //on récupère le nom d'article tapé dans le formulaire
            $city = $search->getCity();  
            $exp =  $search->getExp();
            $type = $search->getType();
            $categorie = $search->getCategorie();
            $qualification = $search->getQualification();
            $sex = $search->getSex();
           // $titre= $search->getTitre();
            
            
               $annonce =$ar->findOneByCityandExp($city,$exp,$type,$sex,$qualification,$categorie);
              
             
              
            }
        
            
            return  $this->render('annonce/index.html.twig',[ 'form' =>$form->createView(), 'annonce' => $annonce]);
        /*return $this->render('annonce/index.html.twig', [
            'annonce' => $annonce
        ]);*/
    }

    /**
     * @IsGranted("ROLE_TRAVAILLEUR")
     * @Route("/travailleur/Publier", name="add_annoncetravailleur")
     */
    public function ajoutAnnonce(Request $request){
    $annonce = new Annonce();
    $form = $this->createForm(AnnonceFormType::class,$annonce);
    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){
        $annonce->setUser($this->getUser());    
        
        $doctrine = $this->getDoctrine()->getManager();
        $doctrine->persist($annonce);
        $doctrine->flush();
    }

    return $this->render('annonce/AddAnnonceWorker.twig', [
        'annonceForm' => $form->createView()
    ]);
}

/**
     * @IsGranted("ROLE_EMPLOYEUR")
     * @Route("/Employeur/PublierOffre", name="add_annonce")
     */
    public function ajoutAnnonceEmployeur(Request $request){
        $annonce = new Annonce();
        $form = $this->createForm(AnnonceEmployerType::class,$annonce);
        $form->handleRequest($request);
    
        if($form->isSubmitted() && $form->isValid()){
            $annonce->setUser($this->getUser());
            $doctrine = $this->getDoctrine()->getManager();
            $doctrine->persist($annonce);
            $doctrine->flush();
        }
    
        return $this->render('annonce/AddAnnonceEmployer.html.twig', [
            'annonceForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/annonce/{id}", name="annonce_show")
     */
    
    public function show(int $id, Request $request ,UserRepository $ur,AnnonceRepository $ar): Response
    {
        $annonce = $this->getDoctrine()
        ->getRepository(Annonce::class)
        ->find($id);
        $sex = $annonce->getSex();
        $exp = $annonce->getExp();
        $job = $annonce->getCategorie();
        $annoncex =$ar->findExactDemandeDemploi($sex,$exp,$job);
    if (!$annonce) {
        throw $this->createNotFoundException(
            'No Annonce found for titre '.$id
        );  
    }


    //instance l'entité apply
    $apply = new Apply();
    //creation de lobjet formulaire
    $form = $this->createForm(ApplyFormType::class,$apply);
    //on recupere les données saisies
    $form->handleRequest($request);
    //on verifie si la form est valide;
    if($form->isSubmitted() && $form->isValid()){
        $apply->setAnnonce($annonce);
        $user = $this->getUser();
        $usermail = $user->getEmail();
        $userId = $user->getId();
        $userfirstname = $user->getFirstname();
        $userlastname = $user->getLastname();
        $userjob = $user->getJob();
        $usercity= $user->getCity();
        $userimage=$user->getImage();
        $usersociete=$user->getsociete();
        $apply->setsociete($usersociete);
        $apply->setEmail($usermail);
        $apply->setUserId($userId);
        $apply->setFirstname($userfirstname);
        $apply->setLastname($userlastname);
        $apply->setJob($userjob);
        $apply->setCity($usercity);
        $apply->setImage($userimage);


        

        $doctrine = $this->getDoctrine()->getManager();
        $doctrine->persist($apply);
        $doctrine->flush();
    }

    

    return $this->render('annonce/annonceshow.html.twig', ['annonce' => $annonce,'annoncex' => $annoncex,'formApply'=>$form->createView()]);
    }



}
