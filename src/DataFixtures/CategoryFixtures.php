<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Repository\NftRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function __construct(protected NftRepository $nftRepository){}
    public function load(ObjectManager $manager): void
    {
        $nfts = $this->nftRepository->findAll();

        $categories = [
            (new Category())
            ->setName('Male')
            ->setNft($nfts[0]),
            (new Category())
            // ->setParent('Anime')
            ->setName('Female')
            ->setNft($nfts[1]),
            (new Category())
            ->setName('Other')
            ->setNft($nfts[2]),
            (new Category())
            ->setName('Anime')
            ->setNft($nfts[3]),
            (new Category())
            ->setName('Manga')
            ->setNft($nfts[1]),
            (new Category())
            ->setName('Cartoon')
            ->setNft($nfts[4]),
            (new Category())
            ->setName('Other')
            ->setNft($nfts[2]),
            (new Category())
            ->setName('Anime')
            ->setNft($nfts[3]),
        ];

        foreach($categories as $category){
            if(!$manager->getRepository(Category::class)->findOneBy(['name' => $category]))
            $manager->persist($category);
        }

        $manager->flush();
    }
}
