<?php

namespace App\Controller;

use App\Entity\Locations;
use App\Form\LocationsType;
use App\Repository\LocationsRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
     * @Route("locations")
     */
    
class LocationsController extends AbstractController
{
    /**
     * @Route("/", name="locations_index")
     */
    public function index(): Response
    {
        $repo= $this->getDoctrine()->getRepository(Locations::class);
        $locations = $repo->findAll();
        return $this->render('locations/index.html.twig', [
            'controller_name' => 'LocationsController',
'locations' => $locations,
        ]);
    }


    /**
     * @Route("/new", name="new_location", methods={"GET", "POST"})
     */
     public function new(Request $request, EntityManagerInterface $em): Response
     {

        $locations = new Locations();

        $locations->setDate(new  \DateTime());
        $locations->setTitre(" Titre de ma location");
        $locations->setCategories(" Categorie de ma location");
        $locations->setImage(" L'image de ma location");
        $locations->setDescription(" Description de ma location");
        $locations->setValeur(" La valeur de ma location");
        $locations->setAdresse(" L'adresse de ma location");
        $locations->setAccessibility(" L'accessibilité de ma location");
        $locations->setStatuts(" Statuts de ma location");
        $locations->setAlaune(" à la une de ma location");
        
        $em->persist($locations);
        $em->flush();

        return $this->render('locations/newLocation.html.twig', [
            'location' => $locations,
        ]);
}

/**
     * @Route("/{id}", name="locations_affichage", methods={"GET"})
     */
    public function show(Locations $locations, LocationsRepository $locationsRepository, Request $request, EntityManagerInterface $manager ): Response
    {
        return $this->render('locations/affichage.html.twig', [
            'id'=>$locations->getId(),
            'locations' => $locations,
        ]);
    }

    

/**
     * @Route("/action", name="locations_afficher", methods={"GET", "POST"})
     */
    public function action(Request $request, EntityManagerInterface $em): Response
    {

       $action = new Action();

       $locations->setDate(" Date de ma location");
       $locations->setTitre(" Titre de ma location");
       $locations->setCategorie(" Categorie de ma location");
       $locations->setImage(" L'image de ma location");
       $locations->setDescription(" Description de ma location");
       $locations->setValeur(" La valeur de ma location");
       $locations->setAdresse(" L'adresse de ma location");
       $locations->setAccessibility(" L'accessibilité de ma location");
       $locations->setStatuts(" Statuts de ma location");
       $locations->setAlaUne(" à la une de ma location");
       

       $em->persist($locations);
       $em->flush();

       return $this->render('locations/index.html.twig', [
        'locations' => $locations,
    ]);
}


    

}
