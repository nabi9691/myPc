<?php

namespace App\DataFixtures;

use Faker; 
use App\Entity\Categorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\DBAL\Driver\IBMDB2\Exception\Factory;

class CategorieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

         // Creer occurence de 150 categories :
        
         for ($i=0; $i<150 ; $i++ ) 
        { 
        
        $categorie = new Categorie();
        $status = ['archiver', 'publier', 'depublier'];
                    shuffle($status);
            
                    
                    $categorie->setTitre($faker->sentence($nb = 5, $asText = false))
                            ->setResume($faker->sentence());
                                
$manager->persist($categorie);

        $manager->flush();
    }
    }
}
