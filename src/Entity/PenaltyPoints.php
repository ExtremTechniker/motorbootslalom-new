<?php

namespace App\Entity;

use App\Repository\PenaltyPointsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PenaltyPointsRepository::class)]
class PenaltyPoints
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(Boje::class)]
    private ?Boje $boje = null;

    #[ORM\Column]
    private ?int $points = null;

    #[ORM\ManyToOne(targetEntity: Lauf::class, inversedBy: 'penaltyPoints')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Lauf $lauf = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBoje(): ?Boje
    {
        return $this->boje;
    }

    public function setBoje(?Boje $boje): void
    {
        $this->boje = $boje;
    }


    public function getLauf(): ?Lauf
    {
        return $this->lauf;
    }

    public function setLauf(?Lauf $lauf): self
    {
        $this->lauf = $lauf;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(?int $points): self
    {
        $this->points = $points;

        return $this;
    }
}
