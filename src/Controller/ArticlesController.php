<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Repository\ArticlesRepository;
use App\Form\CategoriesType;

use App\Repository\CategoriesRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    /**
     * @Route("articles")
     */
    
     class ArticlesController extends AbstractController
    {
    /**
     * @Route("/", name="articles_index")
     */

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
     * @Route("/new", name="new_article", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $em): Response
    {

       $articles = new Articles();

       $articles->setTitre(" Titre de mon Article");
       $articles->setContenu(" Contenu de mon Article Contenu de mon ArticleContenu de mon ArticleContenu de mon ArticleContenu de mon Article");
       $articles->setResume(" Titre de mon Article");
       $articles->setDate(new  \DateTime());
       $articles->setImage(" Image de mon Article");
       
       $em->persist($articles);
           $em->flush();

       return $this->render('articles/newArticle.html.twig', [
           'articles' => $articles,
       ]);
}

    




    }
