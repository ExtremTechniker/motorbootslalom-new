<?php

namespace App\Entity;

use App\Entity\Institutionen\Institution;
use App\Repository\StarterVeranstaltungRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StarterVeranstaltungRepository::class)]
class StarterVeranstaltung
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'startVeranstaltung')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Veranstaltung $veranstaltung = null;

    #[ORM\Column(length: 255)]
    private ?string $klasse = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Institution $verein = null;

    #[ORM\Column]
    private ?int $startnummer = null;

    #[ORM\Column]
    private ?float $gewicht = null;

    #[ORM\Column]
    private ?float $zusatzGewicht = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?StarterKnoten $knoten = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 7, scale: 3)]
    private ?string $wertungspunkte = null;

    #[ORM\Column]
    private ?bool $gaststarter = null;

    #[ORM\Column]
    private ?int $platz = null;

    #[ORM\Column]
    private ?int $uimPunkte = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVeranstaltung(): ?Veranstaltung
    {
        return $this->veranstaltung;
    }

    public function setVeranstaltung(?Veranstaltung $veranstaltung): self
    {
        $this->veranstaltung = $veranstaltung;

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

    public function getStartnummer(): ?int
    {
        return $this->startnummer;
    }

    public function setStartnummer(int $startnummer): self
    {
        $this->startnummer = $startnummer;

        return $this;
    }

    public function getGewicht(): ?float
    {
        return $this->gewicht;
    }

    public function setGewicht(float $gewicht): self
    {
        $this->gewicht = $gewicht;

        return $this;
    }

    public function getZusatzGewicht(): ?float
    {
        return $this->zusatzGewicht;
    }

    public function setZusatzGewicht(float $zusatzGewicht): self
    {
        $this->zusatzGewicht = $zusatzGewicht;

        return $this;
    }

    public function getKnoten(): ?StarterKnoten
    {
        return $this->knoten;
    }

    public function setKnoten(StarterKnoten $knoten): self
    {
        $this->knoten = $knoten;

        return $this;
    }

    public function getWertungspunkte(): ?string
    {
        return $this->wertungspunkte;
    }

    public function setWertungspunkte(string $wertungspunkte): self
    {
        $this->wertungspunkte = $wertungspunkte;

        return $this;
    }

    public function isGaststarter(): ?bool
    {
        return $this->gaststarter;
    }

    public function setGaststarter(bool $gaststarter): self
    {
        $this->gaststarter = $gaststarter;

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

    public function getUimPunkte(): ?int
    {
        return $this->uimPunkte;
    }

    public function setUimPunkte(int $uimPunkte): self
    {
        $this->uimPunkte = $uimPunkte;

        return $this;
    }
}
