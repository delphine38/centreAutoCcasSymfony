<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=AnnonceRepository::class)
 */
class Annonce
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"annonce"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"annonce"})
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"annonce"})
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"annonce"})
     */
    private $year;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"annonce"})
     */
    private $kilometer;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"annonce"})
     */
    private $brand;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"annonce"})
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"annonce"})
     */
    private $fuel;

    /**
     * @ORM\ManyToOne(targetEntity=Garage::class, inversedBy="annonces")
     * @Groups({"annonce"})
     */
    private $garage;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"annonce"})
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="annonces")
     * @Groups({"annonce"})
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(string $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getKilometer(): ?string
    {
        return $this->kilometer;
    }

    public function setKilometer(string $kilometer): self
    {
        $this->kilometer = $kilometer;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getFuel(): ?string
    {
        return $this->fuel;
    }

    public function setFuel(string $fuel): self
    {
        $this->fuel = $fuel;

        return $this;
    }

    public function getGarage(): ?Garage
    {
        return $this->garage;
    }

    public function setGarage(?Garage $garage): self
    {
        $this->garage = $garage;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
