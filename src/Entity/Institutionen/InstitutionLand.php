<?php

namespace App\Entity\Institutionen;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class InstitutionLand extends Institution
{
    #[ORM\ManyToOne(targetEntity: InstitutionStaat::class)]
    protected ?InstitutionStaat $staat;

    public function getStaat(): ?InstitutionStaat
    {
        return $this->staat;
    }

    public function setStaat(?InstitutionStaat $staat): void
    {
        $this->staat = $staat;
    }
}