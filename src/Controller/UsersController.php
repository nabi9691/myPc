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
     * @Route("/", name="users_index")
     */
    public function index(): Response
    {
        $repo= $this->getDoctrine()->getRepository(Users::class);
        $users = $repo->findAll();
        return $this->render('users/index.html.twig', [
            'controller_name' => 'UsersController',
'users' => $users,
        ]);
    }


    /**
     * @Route("/new", name="user_nouveau", methods={"GET", "POST"})
     */
     public function nouveau(Request $request, EntityManagerInterface $em): Response
     {

        $users = new Users();


        $users->setNom(" Le nom de mon utilisateur ");
        $users->setPrenom(" Le prenom de mon utilisateur ");
        $users->setDateNaissance(" La date de naissance de mon utilisateur ");
        $users->setAdresse(" L'adresse de mon utilisateur ");
                        $users->setLogin(" Le login de mon utilisateur ");
                $users->setPassword(" Le mot de passe de mon utilisateur ");
        $users->setPhoto(" La photo de mon utilisateur ");
        $users->setEmail(" L'email de mon utilisateur ");
        $users->setRole(" Le Rôle de mon utilisateur ");
        $users->setLocataire("Mon locataire ");
        $users->setProprietaire(" Mon propriétaire");
        $users->setgestionnaire(" Mon gestionnaire ");
        $users->setAdministrateur("Mon administrateur ");


        $em->persist($users);
        $em->flush();

        return $this->render('users/nouveau.html.twig', [
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
            'users' => $users,
        ]);
    }


/**
     * @Route("/action", name="users_afficher", methods={"GET", "POST"})
     */
    public function action(Request $request, EntityManagerInterface $em): Response
    {

       $action = new Action();

       $users->setNom(" Le nom de mon utilisateur ");
        $users->setPrenom(" Le prenom de mon utilisateur ");
        $users->setDateNaissance(" La date de naissance de mon utilisateur ");
        $users->setAdresse(" L'adresse de mon utilisateur ");
                        $users->setLogin(" Le login de mon utilisateur ");
                $users->setPassword(" Le mot de passe de mon utilisateur ");
        $users->setPhoto(" La photo de mon utilisateur ");
        $users->setEmail(" L'email de mon utilisateur ");
        $users->setRole(" Le Rôle de mon utilisateur ");
        $users->setLocataire("Mon locataire ");
        $users->setProprietaire(" Mon propriétaire");
        $users->setgestionnaire(" Mon gestionnaire ");
        $users->setAdministrateur("Mon administrateur ");


       $em->persist($users);
       $em->flush();

       return $this->render('users/index.html.twig', [
           'users' => $users,
       ]);
}





}



