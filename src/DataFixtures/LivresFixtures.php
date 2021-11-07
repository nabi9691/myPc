<?php

namespace App\DataFixtures;

use App\Entity\Livres;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
 use Faker;

class LivresFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
        for ($i=0; $i<15 ; $i++ ) 
      { 
          $livres = new Livres();
          
          $livres->setDate(new DateTime())
                    ->setTitre(" Le titre de mon livre N°$i  ")
          ->setHauteur("  l'auteur de mon livre N°$i  ")
  ->setResume("  Le résumé de mon livre N°$i  ")
  ->setContenu("  Le contenu de mon livre N°$i  ")
  ->setCommentaires("  Les commentaires de mon livre N°$i  ");


          $manager->persist($livres);
      $manager->flush();
    }       
}
}
