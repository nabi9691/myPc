<?php

namespace App\DataFixtures;

use App\Entity\Users;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
 use Faker;

class UsersFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
        for ($i=0; $i<100 ; $i++ ) 
      { 
          $users = new Users();
          
          $users->setNom(" Le nom de mon utilisateur N° $i ")
        ->setPrenom(" Le prenom de mon utilisateur N° $i  ")
        ->setDatedenaissance(" La date de naissance de mon utilisateur N° $i  ")
        ->setAdresse(" L'adresse de mon utilisateur N° $i  ")
                        ->setLogin(" Le login de mon utilisateur N° $i  ")
                ->setPassword(" Le mot de passe de mon utilisateur N° $i  N° $i  ")
        ->setPhoto(" La photo de mon utilisateur N° $i  ")
->setEmail(" L'email de mon utilisateur N° $i  ")
        ->setRole(" Le Rôle de mon utilisateur N° $i  ")
->setLocataire("Mon locataire N° $i  ")
        ->setProprietaire(" Mon propriétaireN° $i  ")
->setGestionnaire(" Mon gestionnaire N° $i  ")
        ->setAdministrateur("Mon administrateur N° $i  ");

          $manager->persist($users);
      $manager->flush();
    }       

}
}
