<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    class BiblioController extends AbstractController
{
    /**
     * @Route("biblio", name="index_biblio")
     */
    public function index(): Response
    {
        return $this->render('biblio/index.html.twig', [
            'controller_name' => 'BiblioController',
        ]);
    }

    /**
     * @Route("utilisateur", name="index_utilisateur")
     */
    public function utilisateur(): Response
    {
        $utilisateurs = ["NABI Mohammed", "Matthieu THUET", "Moaaz KHASSAWNEH","Modou NDAO", "Rudy LOPEZ","Valéry NWEHLA", "Ange PLANITEYE", "Bandiougou TRAORE", "Fabrice FOLLEREAU", ];
        return $this->render('biblio/utilisateur.html.twig', [
            'ListeDeMesUtilisateurs_name' => 'VOICI LA LISTE DE MES UTILISATEURS : ',
            'liste_prenom' => $utilisateurs,
        ]);
    }

    /**
     * @Route("livre", name="index_livre")
     */
    public function livre(): Response
    {
        $livres = ["le petit chaperon rouge", "le loup", "les métiers", "la mer", "les animaux", "les saisons", "les fleurs", "les jeux", "les moyens de transport", "le corona"];
        return $this->render('biblio/livre.html.twig', [
            'LesTitresDeMesLivres_name' => 'LA LISTE DES TITRES DE MES LIVRES',
        'liste_titre' => $livres,
        
        ]);
    }

    /**
     * @Route("location", name="index_location")
     */
    public function location(): Response
    {
        $locations = ["NABI Mohammed", "Matthieu THUET", "Moaaz KHASSAWNEH","Modou NDAO", "Rudy LOPEZ","Valéry NWEHLA", "Ange PLANITEYE", "Bandiougou TRAORE", "Fabrice FOLLEREAU", ];
return $this->render('biblio/location.html.twig', [
            'LaListeDesNomsDeMesLocataires_name' => 'VOICI LA LISTE DES NOMS DE MES LOCATAIRES :',
            'liste_titre' => $locations,
        ]);
    }
        

/**
     * @Route("categorie", name="index_categorie")
     */
    public function categorie(): Response
    {
        $categorie = ["Conte pour enfants", "Livre de calcul", "Journal le monde", "roman policier", "tragédie", "Livre d'histoires", "revue de sport"];
return $this->render('biblio/categorie.html.twig', [
            'CategorieDeMesLivres_name' => 'LA LISTE DES CATEGORIES DE MES LIVRES : ',
        'categorie' => $categorie,
        ]);
    }





}
