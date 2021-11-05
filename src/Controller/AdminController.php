<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Form\AdminType;
use App\Repository\AdminRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
     * @Route("admin")
     */

     class AdminController extends AbstractController
{
    /**
     * @Route("admin", name="admin_index")
     */
    public function index(): Response
    {
        $repo= $this->getDoctrine()->getRepository(Admin::class);
        $admins = $repo->findAll();
                return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
'admin' => $admins,
        ]);
    }

    /**
     * @Route("/new", name="admin_nouveau", methods={"GET", "POST"})
     */
    public function nouveau(Request $request, EntityManagerInterface $em): Response
    {

       $admins = new Admin();

       $admins->setNom(" nom de mon admin ");
       $admins->setPrenom(" prenom de mon admin ");
       $admins->setLogin(" login de mon admin ");
       $admins->setPassword(" mot de passe de mon admin ");
       
       $em->persist($admins);
           $em->flush();

       return $this->render ('admin/newadmin.html.twig', [
           'admin' => $admins,
       ]);
}

    
    /**
     * @Route("/{id}", name="admin_affichage", methods={"GET"})
     */
    public function show(Admin $admins, AdminRepository $adminsRepository, Request $request, EntityManagerInterface $manager ): Response
    {
        return $this->render('admin/affichage.html.twig', [
            'id'=>$admins->getId(),
            'admin' => $admins,
        ]);
    }

    
/**
     * @Route("/action", name="admin_afficher", methods={"GET", "POST"})
     */
    public function action(Request $request, EntityManagerInterface $em): Response
    {

       $action = new Action();

       $admins->setNom(" nom de mon admin ");
       $admins->setPrenom(" prenom de mon admin ");
       $admins->setLogin(" login de mon admin ");
       $admins->setPassword(" mot de passe de mon admin ");
       
       
       $em->persist($admin);
       $em->flush();

       return $this->render('admin/index.html.twig', [
           'admin' => $admins,
       ]);
}



}
