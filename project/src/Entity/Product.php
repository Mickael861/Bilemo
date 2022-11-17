<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProductRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 * 
 * @ApiResource(
 *     itemOperations={
 *          "get"
 *     },
 *     normalizationContext={
 *          "groups"={"read:collection"}
 *     },
 *     collectionOperations={
 *          "get"
 *      }
 * )
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @Groups({"read:collection"})
     */
    private $product_id;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"read:collection"})
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     * 
     * @Groups({"read:collection"})
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     * 
     * @Groups({"read:collection"})
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     * 
     * @Groups({"read:collection"})
     */
    private $stock;

    /**
     * @ORM\Column(type="datetime")
     * 
     * @Groups({"read:collection"})
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     * 
     * @Groups({"read:collection"})
     */
    private $updated_at;

    public function __construct()
    {
        date_default_timezone_set('Europe/Paris');
        $this->created_at = new DateTime();
        $this->updated_at = new DateTime();
    }

    public function getProductId(): ?int
    {
        return $this->product_id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
