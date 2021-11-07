<?php

namespace App\Controller;

use App\Entity\Livres;
use App\Form\LivresType;
use App\Repository\LivresRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
     * @Route("livres")
     */
    
class LivresController extends AbstractController
{
    /**
     * @Route("/", name="livres_index")
     */
    public function index(): Response
    {
        $repo= $this->getDoctrine()->getRepository(Livres::class);
        $livres = $repo->findAll();
        return $this->render('livres/index.html.twig', [
            'controller_name' => 'LivresController',
'livres' => $livres,
        ]);
    }

    /**
     * @Route("/new", name="new_livre", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $em): Response
    {
$livres = new Livres();

$livres->setDate(new  \DateTime());
 $livres->setTitre(" Le titre de mon livre");
        $livres->setHauteur("  l'auteur de mon livre");
 $livres->setResume("  Le résumé de mon livre");
 $livres->setContenu("  Le contenu de mon livre");
 $livres->setCommentaires("  Les commentaires de mon livre"); 

       $em->persist($livres);
           $em->flush();

       return $this->render('livres/newLivre.html.twig', [
           'livre' => $livres,
       ]);
}    


/**
     * @Route("/action", name="livres_afficher", methods={"GET", "POST"})
     */
    public function action(Request $request, EntityManagerInterface $em): Response
    {

       $action = new Action();

       $livres->setTitre(" Le titre de mon livre");
       $livres->setHauteur("  l'auteur de mon livre");
$livres->setDate("  La date de sortie de mon livre");
$livres->setResume("  Le résumé de mon livre");
$livres->setContenu("  Le contenu de mon livre");
$livres->setCommentaires("  Les commentaires de mon livre");

       $em->persist($livres);
       $em->flush();

       return $this->render('livres/index.html.twig', [
           'livres' => $livres,
       ]);


    }

/**
     * @Route("/{id}", name="livres_affichage", methods={"GET"})
     */
    public function show(Livres $livres, LivresRepository $livresRepository, Request $request, EntityManagerInterface $manager ): Response
    {
        return $this->render('livres/affichage.html.twig', [
            'id'=>$livres->getId(),
            'livres' => $livres,
        ]);
    }

    /**
     * @Route("/new", name="livres_nouveau", methods={"GET", "POST"})
     */
     public function nouveau(Request $request, EntityManagerInterface $em): Response
     {

        $livres = new Livres();

        $livres->setTitre(" Le titre de mon livre");
                $livres->setHauteur("  l'auteur de mon livre");
        $livres->setDate("  La date de sortie de mon livre");
        $livres->setResume("  Le résumé de mon livre");
        $livres->setContenu("  Le contenu de mon livre");
        $livres->setCommentaires("  Les commentaires de mon livre");
        
        $em->persist($livres);
            $em->flush();

        return $this->render('livres/nouveau.html.twig', [
            'livres' => $livres,
        ]);
}







}


