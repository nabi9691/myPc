<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
     * @Route("/accueil")
     */
    
class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil_index")
     */
    public function index(): Response
    {
        return $this->render('accueil/index.html.twig', [
            'accueil_name' => 'BIEN VENU DANS MA PAGE D ACCUEIL !!!',
        ]);
    }
}
