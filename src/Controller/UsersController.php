<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\UsersType;
use App\Repository\UsersRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
     * @Route("/users")
     */
    
class UsersController extends AbstractController
{
    /**
     * @Route("/", name="utilisateurs_index")
     */
    public function index(): Response
    {
        $repo= $this->getDoctrine()->getRepository(Users::class);
        $users = $repo->findAll();
        return $this->render('users/index.html.twig', [
            'utilisateur_name' => 'UsersController',
'user' => $users,
        ]);
    }


    /**
     * @Route("/new", name="new_utilisateur", methods={"GET", "POST"})
     */
     public function new(Request $request, EntityManagerInterface $em): Response
     {

        $users = new Users();

        $users->setNom(" Le nom de mon utilisateur ");
        $users->setPrenom(" Le prenom de mon utilisateur ");
        $users->setDatedenaissance(" La date de naissance de mon utilisateur ");
        $users->setAdresse(" L'adresse de mon utilisateur ");
                        $users->setLogin(" Le login de mon utilisateur ");
                $users->setPassword(" Le mot de passe de mon utilisateur ");
        $users->setPhoto(" La photo de mon utilisateur ");
        $users->setEmail(" L'email de mon utilisateur ");
        $users->setRole(" Le Rôle de mon utilisateur ");
        $users->setLocataire("Mon locataire ");
        $users->setProprietaire(" Mon propriétaire");
        $users->setgestionnaire(" Mon gestionnaire ");
        
        $em->persist($users);
        $em->flush();

        return $this->render('users/newUtilisateur.html.twig', [
            'users' => $users,
        ]);
}

/**
     * @Route("/{id}", name="users_affichage", methods={"GET"})
     */
    public function show(Users $users, UsersRepository $usersRepository, Request $request, EntityManagerInterface $manager ): Response
    {
        return $this->render('users/affichage.html.twig', [
            'id'=>$users->getId(),
            'utilisateur' => $users,
        ]);
    }
}
