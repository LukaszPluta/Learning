<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


/**
 * @ORM\Entity(repositoryClass="App\Repository\KsiazkaRepository")
 */
class Ksiazka
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
    private $tytul;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $opis;

    /**
     * @ORM\Column(type="integer")
     */
    private $rokWydania;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $krajWydania;

    /**
     * @ORM\Column(type="boolean")
     */
    private $dostepnosc;

    /**
     * @ORM\Column(type="date")
     */
    private $dataDodania;

    /**
     * @ORM\Column(type="date")
     */
    private $dataEdycji;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Gatunek", inversedBy="ksiazkas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $gatunek;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Autor", inversedBy="ksiazkas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $autor;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTytul(): ?string
    {
        return $this->tytul;
    }

    public function setTytul(string $tytul): self
    {
        $this->tytul = $tytul;

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

    public function getRokWydania(): ?int
    {
        return $this->rokWydania;
    }

    public function setRokWydania(int $rokWydania): self
    {
        $this->rokWydania = $rokWydania;

        return $this;
    }

    public function getKrajWydania(): ?string
    {
        return $this->krajWydania;
    }

    public function setKrajWydania(string $krajWydania): self
    {
        $this->krajWydania = $krajWydania;

        return $this;
    }

    public function getDostepnosc(): ?bool
    {
        return $this->dostepnosc;
    }

    public function setDostepnosc(bool $dostepnosc): self
    {
        $this->dostepnosc = $dostepnosc;

        return $this;
    }

    public function getDataDodania(): ?\DateTimeInterface
    {
        return $this->dataDodania;
    }

    public function setDataDodania(\DateTimeInterface $dataDodania): self
    {
        $this->dataDodania = $dataDodania;

        return $this;
    }

    public function getDataEdycji(): ?\DateTimeInterface
    {
        return $this->dataEdycji;
    }

    public function setDataEdycji(\DateTimeInterface $dataEdycji): self
    {
        $this->dataEdycji = $dataEdycji;

        return $this;
    }

    public function getGatunek(): ?Gatunek
    {
        return $this->gatunek;
    }

    public function setGatunek(?Gatunek $gatunek): self
    {
        $this->gatunek = $gatunek;

        return $this;
    }

    public function getAutor(): ?Autor
    {
        return $this->autor;
    }

    public function setAutor(?Autor $autor): self
    {
        $this->autor = $autor;

        return $this;
    }
}
