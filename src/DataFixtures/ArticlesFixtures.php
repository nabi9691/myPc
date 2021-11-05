<?php

namespace App\DataFixtures;

use App\Entity\Articles;
  use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
 use Faker;

class ArticlesFixtures extends Fixture
{
  public function load(ObjectManager $manager): void
  {

      for ($i=0; $i<20 ; $i++ ) 
      { 
          $articles = new Articles();
          
          $articles->setTitre(" Titre de l'article N°$i ")
                  ->setContenu(" Contenu de l'article N° $i ")  
                  ->setResume(" Resume de l'article N° $i ")   
                  ->setDate(new DateTime())
                  ->setImage(" Image de l'article N° $i ");
          
          $manager->persist($articles);
      $manager->flush();
    }       
}
}
