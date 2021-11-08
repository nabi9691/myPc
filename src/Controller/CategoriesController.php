<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Repository\CategoriesRepository;

use App\Form\CategoriesType;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManager;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
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
     * @Route("/nouvellecategorie", name="acategorie.nouvellecategorie")
    */
        
        public function pageForm(Request $request, EntityManagerInterface $manager)
    {
        $categories =new Categories(); 
        
        $form = $this->createFormBuilder($categories) 
                    ->add('titre')
                    ->add('resume')
                    ->add('contenu')
                    ->add('date')
                    ->add('image')

            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($categories); 
            $manager->flush();

            return $this->redirectToRoute('acategorie.nouvellecategorie', 
            ['id'=>$categories->getId()]); 
            
        return $this->render('categories/new2.html.twig', [
            'formCategorie' => $form->createView(),
        ]);
        }
    }
    

    /**
     * @Route("/newwithformtype", name="newwithform", methods={"GET","POST"})
     */
    public function newwithformtype(Request $request,EntityManagerInterface $manager): Response
    {
        $category = new Categories();
        $form = $this->createForm(CategoriesType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($category);
            $entityManager->flush();

            return $this->redirectToRoute('', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('categories/new2.html.twig', [
            'category' => $category,
            'form' => $form->createView(),
        ]);
    }

    

}
  