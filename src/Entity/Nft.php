<?php

namespace App\Entity;

use App\Repository\NftRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NftRepository::class)]
class Nft
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateDrop = null;

    #[ORM\Column]
    private ?float $initialPrice = null;

    #[ORM\Column]
    private ?bool $isForSale = null;

    #[ORM\Column]
    private ?float $actualPrice = null;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'nft')]
    private Collection $users;

    #[ORM\OneToMany(mappedBy: 'nft', targetEntity: Image::class)]
    private Collection $image;

    #[ORM\OneToMany(mappedBy: 'nft', targetEntity: Eth::class)]
    private Collection $eth;

    #[ORM\OneToMany(mappedBy: 'nft', targetEntity: Category::class)]
    private Collection $category;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->image = new ArrayCollection();
        $this->eth = new ArrayCollection();
        $this->category = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getDateDrop(): ?\DateTimeInterface
    {
        return $this->dateDrop;
    }

    public function setDateDrop(\DateTimeInterface $dateDrop): static
    {
        $this->dateDrop = $dateDrop;

        return $this;
    }

    public function getInitialPrice(): ?float
    {
        return $this->initialPrice;
    }

    public function setInitialPrice(float $initialPrice): static
    {
        $this->initialPrice = $initialPrice;

        return $this;
    }

    public function isIsForSale(): ?bool
    {
        return $this->isForSale;
    }

    public function setIsForSale(bool $isForSale): static
    {
        $this->isForSale = $isForSale;

        return $this;
    }

    public function getActualPrice(): ?float
    {
        return $this->actualPrice;
    }

    public function setActualPrice(float $actualPrice): static
    {
        $this->actualPrice = $actualPrice;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->addNft($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            $user->removeNft($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Image>
     */
    public function getImage(): Collection
    {
        return $this->image;
    }

    public function addImage(Image $image): static
    {
        if (!$this->image->contains($image)) {
            $this->image->add($image);
            $image->setNft($this);
        }

        return $this;
    }

    public function removeImage(Image $image): static
    {
        if ($this->image->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getNft() === $this) {
                $image->setNft(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Eth>
     */
    public function getEth(): Collection
    {
        return $this->eth;
    }

    public function addEth(Eth $eth): static
    {
        if (!$this->eth->contains($eth)) {
            $this->eth->add($eth);
            $eth->setNft($this);
        }

        return $this;
    }

    public function removeEth(Eth $eth): static
    {
        if ($this->eth->removeElement($eth)) {
            // set the owning side to null (unless already changed)
            if ($eth->getNft() === $this) {
                $eth->setNft(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Category $category): static
    {
        if (!$this->category->contains($category)) {
            $this->category->add($category);
            $category->setNft($this);
        }

        return $this;
    }

    public function removeCategory(Category $category): static
    {
        if ($this->category->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getNft() === $this) {
                $category->setNft(null);
            }
        }

        return $this;
    }
}
