<?php

namespace App\DataFixtures;

use Faker; 
use App\Entity\Article;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\DBAL\Driver\IBMDB2\Exception\Factory;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

         // Creer occurence de 250 articles :
        
         for ($i=0; $i<250 ; $i++ ) 
        { 
        
        $article = new Article();
        $status = ['archiver', 'publier', 'depublier'];
                    shuffle($status);
            
                    
                    $article->setTitre($faker->sentence($nb = 5, $asText = false))
                            ->setResume($faker->sentence())
                            ->setStatus($status[0])
                    ->setContenu($faker->text($maxNbChars = 250)) 
                            ->setDate(new \DateTime())
                            ->setImage($faker->imageUrl($width = 640, $height = 480));
                                
$manager->persist($article);

        $manager->flush();
    }
    }
}
