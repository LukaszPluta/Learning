<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AutorRepository")
 */
class Autor
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
    private $imie;

    /**
     * @ORM\Column(type="text")
     */
    private $nazwisko;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $krajPochodzenia;

    /**
     * @ORM\Column(type="integer")
     */
    private $rokUrodzenia;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $rokSmierci;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ksiazka", mappedBy="autor")
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

    public function getImie(): ?string
    {
        return $this->imie;
    }

    public function setImie(string $imie): self
    {
        $this->imie = $imie;

        return $this;
    }

    public function getNazwisko(): ?string
    {
        return $this->nazwisko;
    }

    public function setNazwisko(string $nazwisko): self
    {
        $this->nazwisko = $nazwisko;

        return $this;
    }

    public function getKrajPochodzenia(): ?string
    {
        return $this->krajPochodzenia;
    }

    public function setKrajPochodzenia(string $krajPochodzenia): self
    {
        $this->krajPochodzenia = $krajPochodzenia;

        return $this;
    }

    public function getRokUrodzenia(): ?int
    {
        return $this->rokUrodzenia;
    }

    public function setRokUrodzenia(int $rokUrodzenia): self
    {
        $this->rokUrodzenia = $rokUrodzenia;

        return $this;
    }

    public function getRokSmierci(): ?int
    {
        return $this->rokSmierci;
    }

    public function setRokSmierci(?int $rokSmierci): self
    {
        $this->rokSmierci = $rokSmierci;

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
            $ksiazka->setAutor($this);
        }

        return $this;
    }

    public function removeKsiazka(Ksiazka $ksiazka): self
    {
        if ($this->ksiazkas->contains($ksiazka)) {
            $this->ksiazkas->removeElement($ksiazka);
            // set the owning side to null (unless already changed)
            if ($ksiazka->getAutor() === $this) {
                $ksiazka->setAutor(null);
            }
        }

        return $this;
    }
}
