<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use App\Repository\UtilisateurRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UtilisateurController extends AbstractController
{
    /**
     * @Route("utilisateur", name="utilisateur_index", methods={"GET"})
     */
    public function index(UtilisateurRepository $utilisateurRepository): Response
    {
        return $this->render('utilisateur/index.html.twig', [
            'utilisateur' => $utilisateurRepository->findAll(),
        ]);
    }

/**
     * @Route("/rechercheUtilisateur/{id}", name="rechercheUtilisateur_index", methods={"GET","POST"})
     */
    public function rechercheUtilisateur(UtilisateurRepository $utilisateurRepository): Response
    {
        $utilisateur = $utilisateurRepository-> findByUtilisateurCivilite();
    return $this->render('utilisateur/rechercheUtilisateur.html.twig', [
        'id' => $utilisateur ->getId(),
        'utilisateur' => $utilisateur,
    ]);
}
    
/**
     * @Route("/formulaireUtilisateur", name = "formulaireUtilisateur_index", methods={"GET","POST"})
     */
    public function formulaireUtilisateur(Request $request): Response
    {
        $utilisateur = new Utilisateur();
        
        $form = $this->createForm(UtilisateurType::class, $utilisateur);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($utilisateur);
            $entityManager->flush();

            return $this->redirectToRoute('utilisateur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilisateur/formulaireUtilisateur.html.twig', [
            'utilisateur' => $utilisateur,
            'formUtilisateur' => $form->createView(),
        ]);
    }

    /**
     * @Route("/nouvelUtilisateur", name="nouvelUtilisateur_index", methods={"GET","POST"})
     */
    public function nouvelUtilisateur(Request $request): Response
    {
        $utilisateur = new Utilisateur();
        $form = $this->createForm(UtilisateurType::class, $utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($utilisateur);
            $entityManager->flush();

            return $this->redirectToRoute('utilisateur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilisateur/nouvelUtilisateur.html.twig', [
            'utilisateur' => $utilisateur,
            'formUtilisateur' => $form->createView(),
        ]);
    }

    /**
     * @Route("/afficherUtilisateur/{id}", name="afficherUtilisateur_index", methods={"GET"})
     */
    public function afficherUtilisateur(Utilisateur $utilisateur): Response
    {
        return $this->render('utilisateur/afficherUtilisateur.html.twig', [
            'utilisateur' => $utilisateur,
        ]);
    }

    /**
     * @Route("/modifierUtilisateur/{id}", name="modifierUtilisateur_index", methods={"GET","POST"})
     */
    public function modifierUtilisateur(Request $request, Utilisateur $utilisateur): Response
    {
        $form = $this->createForm(UtilisateurType::class, $utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$this->getDoctrine()->getManager()->flush();

            $entityManager = $this->getDoctrine()->getManager();
            //$entityManager->persist($utilisateur);
            $entityManager->flush();

            return $this->redirectToRoute('utilisateur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilisateur/modifierUtilisateur.html.twig', [
            'utilisateur' => $utilisateur,
            'formUtilisateur' => $form->createView(),
        ]);
    }

// SUPPRESSION DES UTILISATEURS
    /**
     * @Route("/supprimerUtilisateur/{id}" , name="supprimerUtilisateur_index", methods= {"GET","POST"})
     */
    public function supprimerUtilisateur(Request $request, Utilisateur $utilisateur , EntityManagerInterface $entityManager) : Response 
    {           
            $entityManager->remove($utilisateur);
            $entityManager->flush();
            return $this->redirectToRoute('utilisateur_index'); 
    }



}
