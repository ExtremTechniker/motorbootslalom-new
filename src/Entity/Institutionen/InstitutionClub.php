<?php

namespace App\Entity\Institutionen;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class InstitutionClub extends Institution
{
    #[ORM\Column(length: 255)]
    protected ?string $ort;
    #[ORM\ManyToOne(targetEntity: InstitutionLand::class)]
    protected ?InstitutionLand $land;
    #[ORM\ManyToOne(targetEntity: InstitutionStaat::class)]
    protected ?InstitutionStaat $staat;

    public function getOrt(): ?string
    {
        return $this->ort;
    }

    public function setOrt(?string $ort): void
    {
        $this->ort = $ort;
    }

    public function getLand(): ?InstitutionLand
    {
        return $this->land;
    }

    public function setLand(?InstitutionLand $land): void
    {
        $this->land = $land;
    }


    public function getStaat(): ?InstitutionStaat
    {
        return $this->staat;
    }


    public function setStaat(?InstitutionStaat $staat): void
    {
        $this->staat = $staat;
    }

}