<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProductsRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ProductsRepository::class)
 * 
 * @ApiResource(
 *     itemOperations={
 *          "get"
 *     },
 *     normalizationContext={
 *          "groups"={"read:product"}
 *     },
 *     collectionOperations={
 *          "get"
 *      },
 *      paginationItemsPerPage=3,
 *      maximumItemsPerPage=5,
 *      paginationClientItemsPerPage=true,
 *      security="is_granted('ROLE_ADMIN')"
 * )
 */
class Products
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @Groups({"read:product"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Groups({"read:product"})
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     * 
     * @Groups({"read:product"})
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     * 
     * @Groups({"read:product"})
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     * 
     * @Groups({"read:product"})
     */
    private $stock;

    /**
     * @ORM\Column(type="datetime")
     * 
     * @Groups({"read:product"})
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     * 
     * @Groups({"read:product"})
     */
    private $updated_at;

    public function __construct()
    {
        date_default_timezone_set('Europe/Paris');
        $this->created_at = new \Datetime();
        $this->updated_at = new \DateTime();
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
