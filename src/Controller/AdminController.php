<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
     * @Route("/admin", name="index")
     */
    
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="index_admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

/**
     * @Route("utilisateur", name="index_utilisateur")
     */
    public function utilisateur(): Response
    {
        $users = ["NABI", "KEVINE", "ABDEL"];
        return $this->render('admin/utilisateur.html.twig', [
            'UTILISATEUR_name' => 'MES UTILISATEURS :',
            'utilisateur' => $users,
        ]);
    }

/**
     * @Route("lister", name="index_lister")
     */
    public function lister(): Response
    {
        $listUsers = ["NABI", "KEVINE", "ABDEL"];
        return $this->render('admin/lister.html.twig', [
            'listerUtilisateurs_name' => 'LA LISTE DE MES UTILISATEURS :',
            'Liste_utilisateur' => $listUsers,
        ]);
    }

/**
     * @Route("ajouter", name="index_ajouter")
     */
    public function ajouter(): Response
    {
        return $this->render('admin/ajouter.html.twig', [
    'AjouterUtilisateur_name' => 'AJOUTER UN UTILISATEUR :',
        ]);
    }

/**
     * @Route("modifier", name="index_modifier")
     */
    public function modifier(): Response
    {
        
        return $this->render('admin/modifier.html.twig', [
            'Modifier_name' => 'MODIFIER UTILISATEURS :',
        ]
        );
    }




}
