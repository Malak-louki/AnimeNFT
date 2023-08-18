<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Nft;
use App\Repository\CategoryRepository;
use App\Repository\EthRepository;
use App\Repository\UserRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\Date;
// use Symfony\Component\Validator\Constraints\Date;

class NftFixtures extends Fixture implements DependentFixtureInterface
{
    public CategoryRepository  $categoryRepository;
    public UserRepository $userRepository;
    public EthRepository $ethRepository;
    public function __construct(CategoryRepository  $categoryRepository, UserRepository $userRepository){

        $this->categoryRepository = $categoryRepository;
        $this->userRepository = $userRepository;
    }
    public function load(ObjectManager $manager): void
    {
        $newDate = new \DateTimeImmutable();

        $category = $this->categoryRepository->findAll();
        $user = $this->userRepository->findAll();
        $nfts = [
            (new Nft())
            ->setName('ichigo')
            ->setIsForSale(true)
            ->setInitialPrice(1500)
            ->setQuantity(2)
            ->setActualPrice(1200)
            ->setDateDrop($newDate)
            ->addCategory($category[2])
            ->addUser($user[3]),
            (new Nft())
            ->setName('Luffy')
            ->setIsForSale(true)
            ->setInitialPrice(1500)
            ->setQuantity(2)
            ->setActualPrice(1200)
            ->setDateDrop($newDate)
            ->addCategory($category[2])
            ->addUser($user[4]),
            (new Nft())
            ->setName('Zenitsu')
            ->setIsForSale(true)
            ->setInitialPrice(1500)
            ->setQuantity(2)
            ->setActualPrice(1200)
            ->setDateDrop($newDate)
            ->addCategory($category[3])
            ->addUser($user[4]),
            (new Nft())
            ->setName('Gojo')
            ->setIsForSale(true)
            ->setInitialPrice(1500)
            ->setQuantity(2)
            ->setActualPrice(1200)
            ->setDateDrop($newDate)
            ->addCategory($category[2])
            ->addUser($user[0]),
            (new Nft())
            ->setName('Naruto')
            ->setIsForSale(true)
            ->setInitialPrice(1500)
            ->setQuantity(2)
            ->setActualPrice(1200)
            ->setDateDrop($newDate)
            ->addCategory($category[2])
            ->addUser($user[3]),
        ];

        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
            UserFixtures::class,
        ];
    }
}
