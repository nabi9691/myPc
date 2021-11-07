<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Categories;
use App\Form\CategoriesType;
use App\Repository\CategoriesRepository;


        /**
                     * @Route("categories")
                     */
                    
class CategoriesController extends AbstractController
{
    
/**
     * @Route("/", name="categories_index")
     */
    
    public function index(): Response
    {   
        $repo= $this->getDoctrine()->getRepository(Categories::class);
        $categories = $repo->findAll();

        return $this->render('categories/index.html.twig', [
            'controller_name' => 'CategoriesController',
            'categories' => $categories,
        ]);
    }
     
    
    /**
     * @Route("/new", name="new_categorie", methods={"GET", "POST"})
     */
     public function new(Request $request, EntityManagerInterface $em): Response
     {

        $categories = new Categories();

        $categories->setTitre(" Titre de ma categorie ");
        $categories->setResume(" Résumé de ma categorie ");
        $categories->setDate(new  \DateTime());
        
        $em->persist($categories);
        $em->flush();

        return $this->render('categories/newCategorie.html.twig', [
            'newCategorie_name' => 'CategoriesController',
            
            'categorie' => $categories,
        ]);
}

/**
     * @Route("/{id}", name="categories_affichage", methods={"GET"})
     */
    public function show(Categories $categories, CategoriesRepository $categoriesRepository, Request $request, EntityManagerInterface $manager): Response
    {
        return $this->render('categories/affichage.html.twig', [
            'id'=>$categories->getId(),
            'categories' => $categories,
        ]);
    }

    

}
