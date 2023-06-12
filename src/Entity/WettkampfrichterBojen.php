<?php

namespace App\Entity;

use App\Repository\WettkampfrichterBojenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WettkampfrichterBojenRepository::class)]
class WettkampfrichterBojen
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $boje = null;

    #[ORM\Column()]
    private ?bool $allowed = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBoje(): ?string
    {
        return $this->boje;
    }

    public function setBoje(string $boje): self
    {
        $this->boje = $boje;

        return $this;
    }

    public function isAllowed(): ?bool
    {
        return $this->allowed;
    }

    public function setAllowed(bool $allowed): self
    {
        $this->allowed = $allowed;

        return $this;
    }
}
