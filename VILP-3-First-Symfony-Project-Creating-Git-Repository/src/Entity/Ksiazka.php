<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KsiazkaRepository")
 * @ORM\HasLifecycleCallbacks()
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
     * @ORM\Column(type="string", length=255)
     */
    private $nazwa;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\autor")
     * @ORM\JoinColumn(nullable=false)
     */
    private $autor;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\gatunek")
     * @ORM\JoinColumn(nullable=false)
     */
    private $gatunek;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $opis;

    /**
     * @ORM\Column(type="integer")
     */
    private $rok;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $kraj;

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

    public function getAutor(): ?autor
    {
        return $this->autor;
    }

    public function setAutor(?autor $autor): self
    {
        $this->autor = $autor;

        return $this;
    }

    public function getGatunek(): ?gatunek
    {
        return $this->gatunek;
    }

    public function setGatunek(?gatunek $gatunek): self
    {
        $this->gatunek = $gatunek;

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

    public function getRok(): ?int
    {
        return $this->rok;
    }

    public function setRok(int $rok): self
    {
        $this->rok = $rok;

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
}
