<?php

namespace App\DataFixtures;

use App\Entity\Eth;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Repository\NftRepository;
use Symfony\Component\Validator\Constraints\Date;

class EthFixtures extends Fixture implements DependentFixtureInterface
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
                ->setNft($nfts[1]),
            (new Eth())
                ->setDay($newDate)
                ->setEthPrice(2000)
                ->setNft($nfts[1]),
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