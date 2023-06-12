<?php

namespace App\Entity;

use App\Repository\WettkampfrichterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WettkampfrichterRepository::class)]
class Wettkampfrichter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column]
    #[ORM\ManyToOne(targetEntity: User::class)]
    private ?User $user;

    #[ORM\Column]
    #[ORM\ManyToOne(targetEntity: Veranstaltung::class)]
    private ?Veranstaltung $veranstaltung;

    #[ORM\Column(type: 'json')]
    private array $positionen = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): void
    {
        $this->user = $user;
    }

    public function getVeranstaltung(): ?Veranstaltung
    {
        return $this->veranstaltung;
    }

    public function setVeranstaltung(?Veranstaltung $veranstaltung): void
    {
        $this->veranstaltung = $veranstaltung;
    }
    public function getPositionen(): ?array
    {
        return $this->positionen;
    }

    public function setPositionen(array $positionen): self
    {
        $this->positionen = $positionen;

        return $this;
    }
}
