<?php

namespace App\DataFixtures;

use Faker; 
use App\Entity\Auteur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\DBAL\Driver\IBMDB2\Exception\Factory;

class AuteurFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

         // Creer occurence de 150 auteurs :
        
         for ($i=0; $i<150 ; $i++ ) 
        { 
        
        $auteur = new Auteur();
        
        $civilite = ['homme', 'femme'];
        shuffle($civilite);

        
        $auteur->setNom($faker->sentence())
        ->setPrenom($faker->sentence())
        ->setCivilite($civilite[0])
->setEmail($faker->sentence());
        
$manager->persist($auteur);

        $manager->flush();
    }
    }
}
