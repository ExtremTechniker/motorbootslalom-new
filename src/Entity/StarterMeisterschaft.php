<?php

namespace App\Entity;

use App\Entity\Institutionen\Institution;
use App\Repository\StarterMeisterschaftRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StarterMeisterschaftRepository::class)]
class StarterMeisterschaft
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'starterMeisterschaft')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Meisterschaft $meisterschaft = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Person $pilot = null;

    #[ORM\Column(length: 255)]
    private ?string $klasse = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Institution $verein = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 7, scale: 3)]
    private ?string $punkteGesamt = null;

    #[ORM\Column]
    private ?int $platz = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMeisterschaft(): ?Meisterschaft
    {
        return $this->meisterschaft;
    }

    public function setMeisterschaft(?Meisterschaft $meisterschaft): self
    {
        $this->meisterschaft = $meisterschaft;

        return $this;
    }

    public function getPilot(): ?Person
    {
        return $this->pilot;
    }

    public function setPilot(?Person $pilot): self
    {
        $this->pilot = $pilot;

        return $this;
    }

    public function getKlasse(): ?string
    {
        return $this->klasse;
    }

    public function setKlasse(string $klasse): self
    {
        $this->klasse = $klasse;

        return $this;
    }

    public function getVerein(): ?Institution
    {
        return $this->verein;
    }

    public function setVerein(?Institution $verein): self
    {
        $this->verein = $verein;

        return $this;
    }

    public function getPunkteGesamt(): ?string
    {
        return $this->punkteGesamt;
    }

    public function setPunkteGesamt(string $punkteGesamt): self
    {
        $this->punkteGesamt = $punkteGesamt;

        return $this;
    }

    public function getPlatz(): ?int
    {
        return $this->platz;
    }

    public function setPlatz(int $platz): self
    {
        $this->platz = $platz;

        return $this;
    }
}
