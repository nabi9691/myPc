<?php

namespace App\DataFixtures;

use App\Entity\Admin;
  use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
 use Faker;


class Admin extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
        for ($i=0; $i<20 ; $i++ ) 
      { 
          $admins = new Admin();
          
          $admins->setNom(" nom de mon admin N°$i ")
          ->setPrenom(" prenom de mon admin N°$i ")
->setLogin(" login de mon admin N°$i ")
          ->setPassword(" mot de passe de mon admin N°$i ");
          
          $manager->persist($admins);
      $manager->flush();
    }       
}
}
