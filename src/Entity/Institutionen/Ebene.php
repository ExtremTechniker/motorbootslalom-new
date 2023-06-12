<?php

namespace App\Entity\Institutionen;

use App\Repository\EbeneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EbeneRepository::class)]
class Ebene
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 50)]
    private ?string $kurz = null;

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

    public function getKurz(): ?string
    {
        return $this->kurz;
    }

    public function setKurz(string $kurz): self
    {
        $this->kurz = $kurz;

        return $this;
    }
}
