<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AutorRepository")
 * @ORM\HasLifecycleCallbacks()
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
     * @ORM\Column(type="string", length=255)
     */
    private $imie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nazwisko;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $kraj;

    /**
     * @ORM\Column(type="integer")
     */
    private $rokUrodzenia;

    /**
     * @ORM\Column(type="integer")
     */
    private $rokSmierci;

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

    public function getKraj(): ?string
    {
        return $this->kraj;
    }

    public function setKraj(string $kraj): self
    {
        $this->kraj = $kraj;

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

    public function setRokSmierci(int $rokSmierci): self
    {
        $this->rokSmierci = $rokSmierci;

        return $this;
    }
}
