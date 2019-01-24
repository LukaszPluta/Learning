<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GatunekRepository")
 */
class Gatunek
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $nazwa;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $opis;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ksiazka", mappedBy="gatunek")
     */
    private $ksiazkas;

    public function __construct()
    {
        $this->ksiazkas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNazwa(): ?string
    {
        return $this->nazwa;
    }

    public function setNazwa(string $nazwa): self
    {
        $this->nazwa = $nazwa;

        return $this;
    }

    public function getOpis(): ?string
    {
        return $this->opis;
    }

    public function setOpis(string $opis): self
    {
        $this->opis = $opis;

        return $this;
    }

    /**
     * @return Collection|Ksiazka[]
     */
    public function getKsiazkas(): Collection
    {
        return $this->ksiazkas;
    }

    public function addKsiazka(Ksiazka $ksiazka): self
    {
        if (!$this->ksiazkas->contains($ksiazka)) {
            $this->ksiazkas[] = $ksiazka;
            $ksiazka->setGatunek($this);
        }

        return $this;
    }

    public function removeKsiazka(Ksiazka $ksiazka): self
    {
        if ($this->ksiazkas->contains($ksiazka)) {
            $this->ksiazkas->removeElement($ksiazka);
            // set the owning side to null (unless already changed)
            if ($ksiazka->getGatunek() === $this) {
                $ksiazka->setGatunek(null);
            }
        }

        return $this;
    }
}
