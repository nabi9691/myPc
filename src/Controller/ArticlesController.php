<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Form\ArticlesType;
use App\Repository\ArticlesRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    /**
     * @Route("/articles")
     */
    
     class ArticlesController extends AbstractController
    {
    /**
     * @Route("/", name="articles_index")
     */

    // 1e Methode
    
    public function index(): Response
    {   
        $repo= $this->getDoctrine()->getRepository(Articles::class);
        $articles = $repo->findAll();
        return $this->render('articles/index.html.twig', [
            'controller_name' => 'ArticlesController',
            'articles' => $articles,
        ]);
    }
    


    /**
     * @Route("/new", name="articles_nouveau", methods={"GET", "POST"})
     */
    public function nouveau(Request $request, EntityManagerInterface $em): Response
    {

       $articles = new Articles();

       $articles->setTitre(" Titre de mon Article");
       $articles->setContenu(" Contenu de mon Article Contenu de mon ArticleContenu de mon ArticleContenu de mon ArticleContenu de mon Article");
       $articles->setResume(" Titre de mon Article");
       $articles->setDate(new  \DateTime());
       $articles->setImage(" Image de mon Article");
       
       $em->persist($articles);
           $em->flush();

       return $this->render('articles/newarticle.html.twig', [
           'articles' => $articles,
       ]);
}

    

    
    /**
     * @Route("/{id}", name="articles_affichage", methods={"GET"})
     */
    public function show(Articles $articles, ArticlesRepository $articlesRepository, Request $request, EntityManagerInterface $manager ): Response
    {
        return $this->render('articles/affichage.html.twig', [
            'id'=>$articles->getId(),
            'articles' => $articles,
        ]);
    }

    
/**
     * @Route("/action", name="articles_afficher", methods={"GET", "POST"})
     */
    public function action(Request $request, EntityManagerInterface $em): Response
    {

       $action = new Action();

       $articles->setTitre(" Titre de mon Article");
       $articles->setImage(" photo de mon Article");
       $articles->setResume(" Titre de mon Article");
       $articles->setDate(new  \DateTime());
       $articles->setContenu(" Contenu de mon Article Contenu de mon ArticleContenu de mon ArticleContenu de mon ArticleContenu de mon Article");
        
       $em->persist($articles);
       $em->flush();

       return $this->render('articles/index.html.twig', [
           'articles' => $articles,
       ]);
}
}
