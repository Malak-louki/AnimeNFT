<?php

namespace App\DataFixtures;

use App\Entity\Adress;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AdressFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $adresses = [
            (new Adress())
                ->setStreetNum('34')
                ->setStreetName('Rue Alsace Lorraine')
                ->setCity('Grenoble')
                ->setCode(38000),
            (new Adress())
                ->setStreetNum('74')
                ->setStreetName('Rue Nicolas Garnier')
                ->setCity('Lyon')
                ->setCode(69000),
            (new Adress())
                ->setStreetNum('23')
                ->setStreetName('Rue de la République')
                ->setCity('Lyon')
                ->setCode(69000),
            (new Adress())
                ->setStreetNum('59')
                ->setStreetName('Rue du lac')
                ->setCity('Annecy')
                ->setCode(74000),
            (new Adress())
                ->setStreetNum('59')
                ->setStreetName('Rue du lac')
                ->setCity('Annecy')
                ->setCode(74000),
        ];

        foreach ($adresses as $adress) {

            $manager->persist($adress);
        }
        $manager->flush();
    }
}