<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

// LISTE DES ARTICLES :
/**
    * @Route("article", name="article_index", methods={"GET"})
     */
    public function index(ArticleRepository $articleRepository): Response
    {
        return $this->render('article/index.html.twig', [
            'article' => $articleRepository->findAll(),
        ]);
    }

    // RECHERCHER UN ARTICLE :
/**
     * @Route("/rechercherArticle/{id}", name="rechercherArticle_index", methods={"GET","POST"})
     */
    public function rechercheArticle(ArticleRepository $articleRepository): Response
    {
        $article = $articleRepository-> findByArticleCivilite();
    return $this->render('article/rechercherArticle.html.twig', [
        'id' => $article ->getId(),
        'article' => $article,
    ]);
}

// FORMULAIRE D'UN ARTICLE :
/**
     * @Route("/formulaireArticle", name = "formulaireArticle_index", methods={"GET","POST"})
     */
    public function formulaireArticle(Request $request): Response
    {
        $article = new Article();
        
        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($article);
            $entityManager->flush();

            return $this->redirectToRoute('article_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('article/formulaireArticle.html.twig', [
            'article' => $article,
            'formArticle' => $form->createView(),
        ]);
    }

    // AJOUTER UN NOUVEL ARTICLE :
/**
     * @Route("/nouvelArticle", name="nouvelArticle_index", methods={"GET","POST"})
     */
    public function nouvelArticle(Request $request): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($article);
            $entityManager->flush();

            return $this->redirectToRoute('article_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('article/nouvelArticle.html.twig', [
            'article' => $article,
            'formArticle' => $form->createView(),
        ]);
    }

    // AFFICHER UN ARTICLE :

    /**
     * @Route("/afficherArticle/{id}", name="afficherArticle_index", methods={"GET"})
     */
    public function afficherArticle(Article $article): Response
    {
        return $this->render('article/afficherArticle.html.twig', [
            'article' => $article,
        ]);
    }

// MODIFIER UN ARTICLE :
    /**
     * @Route("/modifierArticle/{id}", name="modifierArticle_index", methods={"GET","POST"})
     */
    public function modifierArticle(Request $request, Article $article): Response
    {
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$this->getDoctrine()->getManager()->flush();

            $entityManager = $this->getDoctrine()->getManager();
            //$entityManager->persist($article);
            $entityManager->flush();

            return $this->redirectToRoute('article_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('article/modifierArticle.html.twig', [
            'article' => $article,
            'formArticle' => $form->createView(),
        ]);
    }

// SUPPRESSION D'UN ARTICLE :
    /**
     * @Route("/supprimerArticle/{id}" , name="supprimerArticle_index", methods= {"GET","POST"})
     */
    public function supprimerArticle(Request $request, Article $article , EntityManagerInterface $entityManager) : Response 
    {           
            $entityManager->remove($article);
            $entityManager->flush();
            return $this->redirectToRoute('article_index'); 
    }



}
