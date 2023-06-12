<?php

namespace App\Entity\Institutionen;

use App\Repository\InstitutionRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping\InheritanceType;

#[ORM\Entity(repositoryClass: InstitutionRepository::class)]
#[InheritanceType('SINGLE_TABLE')]
#[DiscriminatorColumn(name: 'ebene', type: 'integer')]
#[DiscriminatorMap([3 => InstitutionClub::class, 2 => InstitutionLand::class, 1 => InstitutionStaat::class])]
abstract class Institution
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 10)]
    private ?string $kurzform = null;

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

    public function getFullName(): string {

    }

}
