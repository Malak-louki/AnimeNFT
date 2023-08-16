<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Repository\AdressRepository;

class UserFixtures extends Fixture
{
    public function __construct(protected AdressRepository $adressRepository)
    {

    }
    public function load(ObjectManager $manager): void
    {
        $adress = $this->adressRepository->findAll();

        $users = [
            (new User())
                ->setEmail('malak@gmail.com')
                ->setPassword('malak123')
                ->setFirstName('Malak')
                ->setLastName('Lou')
                ->setAdress($adress[0])
                ->setIsaSeller(true)
                ->setGender(true),
                (new User())
                ->setEmail('maissa@gmail.com')
                ->setPassword('maissa123')
                ->setFirstName('Maissa')
                ->setLastName('Red')
                ->setAdress($adress[1])
                ->setIsaSeller(true)
                ->setGender(true),
                (new User())
                ->setEmail('lyna@gmail.com')
                ->setPassword('lyna123')
                ->setFirstName('Lyna')
                ->setLastName('Boua')
                ->setAdress($adress[2])
                ->setIsaSeller(true)
                ->setGender(true),
                (new User())
                ->setEmail('amina@gmail.com')
                ->setPassword('amina123')
                ->setFirstName('Amina')
                ->setLastName('Couqui')
                ->setAdress($adress[3])
                ->setIsaSeller(true)
                ->setGender(true),
                (new User())
                ->setEmail('bilal@gmail.com')
                ->setPassword('bilal123')
                ->setFirstName('Bilal')
                ->setLastName('Bou')
                ->setAdress($adress[3])
                ->setIsaSeller(true)
                ->setGender(true),
        ];

        foreach ($users as $user) {

            $manager->persist($user);
        }

        $manager->flush();
    }
    public function getDependencies(): array
    {
        return [AdressFixtures::class];
    }
}