<?php

namespace App\Controller;

use App\Entity\Auteur;
use App\Form\AuteurType;
use App\Repository\AuteurRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuteurController extends AbstractController
{

// LISTE DES AUTEURS :
/**
    * @Route("auteur", name="auteur_index", methods={"GET"})
     */
    public function index(AuteurRepository $auteurRepository): Response
    {
        return $this->render('auteur/index.html.twig', [
            'auteur' => $auteurRepository->findAll(),
        ]);
    }

    // RECHERCHER UN AUTEUR :
/**
     * @Route("/rechercherAuteur/{id}", name="rechercherAuteur_index", methods={"GET","POST"})
     */
    public function rechercheAuteur(AuteurRepository $auteurRepository): Response
    {
        $auteur = $auteurRepository-> findByAuteurCivilite();
    return $this->render('auteur/rechercherAuteur.html.twig', [
        'id' => $auteur ->getId(),
        'auteur' => $auteur,
    ]);
}

// FORMULAIRE D'UN AUTEUR :
/**
     * @Route("/formulaireAuteur", name = "formulaireAuteur_index", methods={"GET","POST"})
     */
    public function formulaireAuteur(Request $request): Response
    {
        $auteur = new Auteur();
        
        $form = $this->createForm(AuteurType::class, $auteur);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($auteur);
            $entityManager->flush();

            return $this->redirectToRoute('auteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('auteur/formulaireAuteur.html.twig', [
            'auteur' => $auteur,
            'formAuteur' => $form->createView(),
        ]);
    }

    // AJOUTER UN NOUVEL AUTEUR :
/**
     * @Route("/nouvelAuteur", name="nouvelAuteur_index", methods={"GET","POST"})
     */
    public function nouvelAuteur(Request $request): Response
    {
        $auteur = new Auteur();
        $form = $this->createForm(AuteurType::class, $auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($auteur);
            $entityManager->flush();

            return $this->redirectToRoute('auteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('auteur/nouvelAuteur.html.twig', [
            'auteur' => $auteur,
            'formAuteur' => $form->createView(),
        ]);
    }

    // AFFICHER UN AUTEUR :

    /**
     * @Route("/afficherAuteur/{id}", name="afficherAuteur_index", methods={"GET"})
     */
    public function afficherAuteur(Auteur $auteur): Response
    {
        return $this->render('auteur/afficherAuteur.html.twig', [
            'auteur' => $auteur,
        ]);
    }

// MODIFIER UN AUTEUR :
    /**
     * @Route("/modifierAuteur/{id}", name="modifierAuteur_index", methods={"GET","POST"})
     */
    public function modifierAuteur(Request $request, Auteur $auteur): Response
    {
        $form = $this->createForm(AuteurType::class, $auteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$this->getDoctrine()->getManager()->flush();

            $entityManager = $this->getDoctrine()->getManager();
            //$entityManager->persist($auteur);
            $entityManager->flush();

            return $this->redirectToRoute('auteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('auteur/modifierAuteur.html.twig', [
            'auteur' => $auteur,
            'formAuteur' => $form->createView(),
        ]);
    }

// SUPPRESSION DES AUTEURS :
    /**
     * @Route("/supprimerAuteur/{id}" , name="supprimerAuteur_index", methods= {"GET","POST"})
     */
    public function supprimerAuteur(Request $request, Auteur $auteur , EntityManagerInterface $entityManager) : Response 
    {           
            $entityManager->remove($auteur);
            $entityManager->flush();
            return $this->redirectToRoute('auteur_index'); 
    }



}
