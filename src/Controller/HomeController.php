<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }


/**
     * @Route("accueil", name="accueil")
     */
    
    public function accueil(): Response
    {
        return $this->render('home/accueil.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }


    /**
     *  @Route("/apropos", name="index_apropos") 
     */

    public function apropos(): Response
    {
        return $this->render('home/apropos.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

/**
     *  @Route("/contacter", name="index_contacter") 
     */

    public function contacter(): Response
    {
        return $this->render('home/contacter.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /** @Route("/programme", name="index_programme") 
     */


    public function programme()
    {
        return $this->render(
            'home/programme.html.twig',
            [
                'controller_name' => 'index_programme',
            ]
        );
    }

    /**
     *  @Route("/actualite", name="index_actualite") 
     */

    public function actualite()
    {
        return $this->render(
            'home/actualite.html.twig',
            [
                'controller_name' => 'index_actualite',
            ]
        );
    }

    /**
     *  @Route("/gallerie", name="index_gallerie") 
     */

    public function gallerie()
    {
        return $this->render(
            'home/gallerie.html.twig',
            [
                'controller_name' => 'index_gallerie',
            ]
        );
    }

/**
     *  @Route("/calculer", name="index_calculer") 
     */
public function calculer()
    {
            return $this->render('home/calculer.html.twig',
            [
                'controller_name' => 'index_calculer',
                ]
        );
    }




}
