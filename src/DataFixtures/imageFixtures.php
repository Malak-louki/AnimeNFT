<?php

namespace App\DataFixtures;

use App\Entity\Image;
use App\Repository\NftRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function __construct(protected NftRepository $nftRepository){}
    
    public function load(ObjectManager $manager): void
    {
        $nfts = $this->nftRepository->findAll();

        $images = [
            (new Image())
            ->setName('ichigo')
            ->setPath('ichigo_car.png')
            ->setNft($nfts[0]),
            (new Image())
            ->setName('gojo')
            ->setPath('gojo_car.png')
            ->setNft($nfts[2]),
            (new Image())
            ->setName('luffy')
            ->setPath('luffy_car.png')
            ->setNft($nfts[3]),
            (new Image())
            ->setName('naruto')
            ->setPath('naruto_car.png')
            ->setNft($nfts[4]),
            (new Image())
            ->setName('zenitsu')
            ->setPath('zenitsu_car.png')
            ->setNft($nfts[1]),
        ];
        foreach($images as $image){
            $manager->persist($image);
        }

        $manager->flush();
    }
    public function getDependencies(){
        return [
            NftFixtures::class,
        ];
    }
}
