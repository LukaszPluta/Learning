<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TelefonRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripton;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateOfCreation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateLastMod;

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

    public function getDescripton(): ?string
    {
        return $this->descripton;
    }

    public function setDescripton(string $descripton): self
    {
        $this->descripton = $descripton;

        return $this;
    }

    public function getDateOfCreation(): ?\DateTimeInterface
    {
        return $this->dateOfCreation;
    }

    public function setDateOfCreation(\DateTimeInterface $dateOfCreation): self
    {
        $this->dateOfCreation = $dateOfCreation;

        return $this;
    }

    public function getDateLastMod(): ?\DateTimeInterface
    {
        return $this->dateLastMod;
    }

    public function setDateLastMod(\DateTimeInterface $dateLastMod): self
    {
        $this->dateLastMod = $dateLastMod;

        return $this;
    }
}
