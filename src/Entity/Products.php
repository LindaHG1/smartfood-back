<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductsRepository::class)]
class Products
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $price = null;

    #[ORM\Column]
    private ?bool $state = null;

    #[ORM\Column(length: 255)]
    private ?string $photo = null;

    #[ORM\ManyToMany(targetEntity: Orders::class, mappedBy: 'detail')]
    private Collection $orders;

    #[ORM\ManyToMany(targetEntity: Categories::class, inversedBy: 'products')]
    private Collection $category;

    #[ORM\ManyToMany(targetEntity: Presentation::class, inversedBy: 'products')]
    private Collection $presentation;

    #[ORM\Column(type: 'integer', options: ['default' => 1])]
    private ?int $quantity = null;
    

    public function __construct()
    {
        $this->orders = new ArrayCollection();
        $this->category = new ArrayCollection();
        $this->presentation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
        return $this->getCategory();
        return $this->getPresentation();
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function isState(): ?bool
    {
        return $this->state;
    }

    public function setState(bool $state): self
    {
        $this->state = $state;

        return $this;
    }
    
    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * @return Collection<int, Categories>
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Categories $category): self
    {
        if (!$this->category->contains($category)) {
            $this->category[]= $category;
        }

        return $this;
    }

    public function removeCategory(Categories $category): self
    {
        $this->category->removeElement($category);

        return $this;
    }

    /**
     * @return Collection<int, Presentation>
     */
    public function getPresentation(): Collection
    {
        return $this->presentation;
    }

    public function addPresentation(Presentation $presentation): self
    {
        if (!$this->presentation->contains($presentation)) {
            $this->presentation->add($presentation);
        }

        return $this;
    }

    public function removePresentation(Presentation $presentation): self
    {
        $this->presentation->removeElement($presentation);

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }
}
