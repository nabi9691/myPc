<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
 use Faker;

class CategoriesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($j=0; $j<50 ; $j++ ) 
      { 
          $categories = new Categories();
          
          $categories->setTitre(" Titre de la categorie N°$j ")
                  ->setResume(" résumé de la categorie N° $j")
                  ->setDate(new DateTime());            
        
                  $manager->persist($categories);
$manager->flush();
    }
}
}
