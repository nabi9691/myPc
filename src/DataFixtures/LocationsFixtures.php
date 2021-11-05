<?php

namespace App\DataFixtures;

use App\Entity\Locations;
  use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
 use Faker;


class LocationsFixtures extends Fixture
{
  public function load(ObjectManager $manager): void
  {

      for ($i=0; $i<150 ; $i++ ) 
      { 
          $locations = new Locations();

          $locations->setDate(new DateTime())
->setTitre(" Titre de ma location N°$i")
        ->setCategories(" Categorie de ma location N° $i  ")
        ->setImage(" L'image de ma location N°$i  ")
        ->setDescription(" Description de ma location N°$i  ")
        ->setValeur(" La valeur de ma location N°$i  ")
        ->setAdresse(" L'adresse de ma location N°$i  ")
        ->setAccessibility(" L'accessibilité de ma location N°$i  ")
        ->setStatuts(" Statuts de ma location N°$i  ")
        ->setAlaune(" à la une de ma location N°$i  ");
          
          $manager->persist($locations);
      $manager->flush();
    }       
}
}
