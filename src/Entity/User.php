<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[ApiResource]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column]
    private ?bool $gender = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column]
    private ?bool $isaSeller = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Adress $adress = null;

    #[ORM\ManyToMany(targetEntity: Nft::class, inversedBy: 'users', cascade: ['persist', 'remove'])]
    private Collection $nft;

    public function __construct()
    {
        $this->nft = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function isGender(): ?bool
    {
        return $this->gender;
    }

    public function setGender(bool $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function isIsaSeller(): ?bool
    {
        return $this->isaSeller;
    }

    public function setIsaSeller(bool $isaSeller): static
    {
        $this->isaSeller = $isaSeller;

        return $this;
    }

    public function getAdress(): ?Adress
    {
        return $this->adress;
    }

    public function setAdress(Adress $adress): static
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * @return Collection<int, Nft>
     */
    public function getNft(): Collection
    {
        return $this->nft;
    }

    public function addNft(Nft $nft): static
    {
        if (!$this->nft->contains($nft)) {
            $this->nft->add($nft);
        }

        return $this;
    }

    public function removeNft(Nft $nft): static
    {
        $this->nft->removeElement($nft);

        return $this;
    }
}