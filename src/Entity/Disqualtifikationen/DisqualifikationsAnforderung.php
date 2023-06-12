<?php

namespace App\Entity\Disqualtifikationen;

use App\Entity\Lauf;
use App\Entity\Wettkampfrichter;
use App\Repository\DisqualifikationsAnforderungRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DisqualifikationsAnforderungRepository::class)]
class DisqualifikationsAnforderung
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'disqualificationsAnforderungen')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Lauf $lauf = null;

    #[ORM\ManyToOne(inversedBy: 'disqualifikationsAnforderungen')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Disqualifikation $disqualifikationsGrund = null;

    #[ORM\Column(length: 512, nullable: true)]
    private ?string $bemerkung = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Wettkampfrichter $wettkampfrichter = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDisqualifikationsGrund(): ?Disqualifikation
    {
        return $this->disqualifikationsGrund;
    }

    public function setDisqualifikationsGrund(?Disqualifikation $disqualifikationsGrund): self
    {
        $this->disqualifikationsGrund = $disqualifikationsGrund;

        return $this;
    }

    public function getBemerkung(): ?string
    {
        return $this->bemerkung;
    }

    public function setBemerkung(?string $bemerkung): self
    {
        $this->bemerkung = $bemerkung;

        return $this;
    }

    public function getWettkampfrichter(): ?Wettkampfrichter
    {
        return $this->wettkampfrichter;
    }

    public function setWettkampfrichter(?Wettkampfrichter $wettkampfrichter): self
    {
        $this->wettkampfrichter = $wettkampfrichter;

        return $this;
    }
}
