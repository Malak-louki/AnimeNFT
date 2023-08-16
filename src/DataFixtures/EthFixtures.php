<?php

namespace App\DataFixtures;

use App\Entity\Eth;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Repository\NftRepository;
use Symfony\Component\Validator\Constraints\Date;

class AppFixtures extends Fixture
{
    protected NftRepository $nftRepository;
    public function __construct(NftRepository $nftRepository)
    {

        $this->nftRepository = $nftRepository;
    }
    public function load(ObjectManager $manager): void
    {
        $newDate = new \DateTimeImmutable();
        $nfts = $this->nftRepository->findAll();
        $eths = [
            (new Eth())
                ->setDay($newDate)
                ->setEthPrice(1000)
                ->setNft($nfts[0]),
            (new Eth())
                ->setDay($newDate)
                ->setEthPrice(2000)
                ->setNft($nfts[1]),
            (new Eth())
                ->setDay($newDate)
                ->setEthPrice(3000)
                ->setNft($nfts[2]),
            (new Eth())
                ->setDay($newDate)
                ->setEthPrice(4000)
                ->setNft($nfts[3]),
            (new Eth())
                ->setDay($newDate)
                ->setEthPrice(5000)
                ->setNft($nfts[4]),
        ];

        foreach ($eths as $eth) {
            $manager->persist($eth);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            NftFixtures::class,
        ];
    }
}