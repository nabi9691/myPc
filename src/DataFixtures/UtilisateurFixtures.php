<?php

namespace App\DataFixtures;

use Faker; 
use App\Entity\Utilisateur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\DBAL\Driver\IBMDB2\Exception\Factory;

class UtilisateurFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

         // Creer occurence de 9 utilisateurs :
        
         for ($i=0; $i<9 ; $i++ ) 
        { 
        
        $utilisateur = new Utilisateur();
        $civilite = ['homme', 'femme'];
        shuffle($civilite);

        
        $utilisateur->setNom($faker->sentence())
        ->setPrenom($faker->sentence())
        ->setDatedenaissance($faker->sentence())
        ->setAdresse($faker->sentence())
        ->setEmail($faker->sentence())
        ->setCivilite($civilite[0]);
        

$manager->persist($utilisateur);

        $manager->flush();
    }
    }
}
