<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Form\CategorieType;
use App\Repository\CategorieRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{

// LISTE DES catégories :
/**
    * @Route("categorie", name="categorie_index", methods={"GET"})
     */
    public function index(CategorieRepository $categorieRepository): Response
    {
        return $this->render('categorie/index.html.twig', [
            'categorie' => $categorieRepository->findAll(),
        ]);
    }

    // RECHERCHER UNE CATEGORIE  :
/**
     * @Route("/rechercherCategorie/{id}", name="rechercherCategorie_index", methods={"GET","POST"})
     */
    public function rechercheCategorie(CategorieRepository $categorieRepository): Response
    {
$categorie = $categorieRepository-> findByCategorieCivilite();
    return $this->render('categorie/rechercherCategorie.html.twig', [
        'id' => $categorie ->getId(),
        'categorie' => $categorie,
    ]);
}

// FORMULAIRE D'UNE CATEGORIE  :
/**
     * @Route("/formulaireCategorie", name = "formulaireCategorie_index", methods={"GET","POST"})
     */
    public function formulaireCategorie(Request $request): Response
    {
        $categorie = new Categorie();
        
        $form = $this->createForm(CategorieType::class, $categorie);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categorie);
            $entityManager->flush();

            return $this->redirectToRoute('categorie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('categorie/formulaireCategorie.html.twig', [
            'categorie' => $categorie,
            'formCategorie' => $form->createView(),
        ]);
    }

    // AJOUTER UNE NOUVELLE CATEGORIE  :
/**
     * @Route("/nouvelleCategorie", name="nouvelleCategorie_index", methods={"GET","POST"})
     */
    public function nouvelleCategorie(Request $request): Response
    {
        $categorie = new Categorie();
        $form = $this->createForm(CategorieType::class, $categorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categorie);
            $entityManager->flush();

            return $this->redirectToRoute('categorie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('categorie/nouvelleCategorie.html.twig', [
            'categorie' => $categorie,
            'formCategorie' => $form->createView(),
        ]);
    }

    // AFFICHER UNE CATEGORIE :

    /**
     * @Route("/afficherCategorie/{id}", name="afficherCategorie_index", methods={"GET"})
     */
    public function afficherCategorie(Categorie $categorie): Response
    {
        return $this->render('categorie/afficherCategorie.html.twig', [
            'categorie' => $categorie,
        ]);
}

// MODIFIER UNE CATEGORIE :
    /**
     * @Route("/modifierCategorie/{id}", name="modifierCategorie_index", methods={"GET","POST"})
     */
    public function modifierCategorie(Request $request, Categorie $categorie): Response
    {
        $form = $this->createForm(CategorieType::class, $categorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$this->getDoctrine()->getManager()->flush();

            $entityManager = $this->getDoctrine()->getManager();
            //$entityManager->persist($categorie);
            $entityManager->flush();

            return $this->redirectToRoute('categorie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('categorie/modifierCategorie.html.twig', [
            'categorie' => $categorie,
            'formCategorie' => $form->createView(),
        ]);
    }

// SUPPRESSION D'UNE CATEGORIE :
    /**
     * @Route("/supprimerCategorie/{id}" , name="supprimerCategorie_index", methods= {"GET","POST"})
     */
    public function supprimerCategorie(Request $request, Categorie $categorie, EntityManagerInterface $entityManager) : Response 
    {           
            $entityManager->remove($categorie);
            $entityManager->flush();
            return $this->redirectToRoute('categorie_index'); 
    }



}
