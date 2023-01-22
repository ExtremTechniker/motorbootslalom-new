<?php

namespace App\Entity;

use App\Repository\InstitutionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InstitutionRepository::class)]
class Institution
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 10)]
    private ?string $kurzform = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ort = null;

    #[ORM\ManyToOne(targetEntity: self::class)]
    private ?self $land = null;

    #[ORM\ManyToOne(targetEntity: self::class)]
    private ?self $staat = null;

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

    public function getKurzform(): ?string
    {
        return $this->kurzform;
    }

    public function setKurzform(string $kurzform): self
    {
        $this->kurzform = $kurzform;

        return $this;
    }

    public function getOrt(): ?string
    {
        return $this->ort;
    }

    public function setOrt(?string $ort): self
    {
        $this->ort = $ort;

        return $this;
    }

    public function getLand(): ?self
    {
        return $this->land;
    }

    public function setLand(?self $land): self
    {
        $this->land = $land;

        return $this;
    }

    public function getStaat(): ?self
    {
        return $this->staat;
    }

    public function setStaat(?self $staat): self
    {
        $this->staat = $staat;

        return $this;
    }
}
