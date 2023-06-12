<?php

namespace App\Entity;

use App\Repository\StarterKnotenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StarterKnotenRepository::class)]
class StarterKnoten
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $kreuzknoten = null;

    #[ORM\Column]
    private ?bool $palstek = null;

    #[ORM\Column]
    private ?bool $Schotstek = null;

    #[ORM\Column]
    private ?bool $Webeleinstek = null;

    #[ORM\Column]
    private ?int $punkteGesamt = null;

    #[ORM\Column]
    private ?bool $erledigt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isKreuzknoten(): ?bool
    {
        return $this->kreuzknoten;
    }

    public function setKreuzknoten(bool $kreuzknoten): self
    {
        $this->kreuzknoten = $kreuzknoten;

        return $this;
    }

    public function isPalstek(): ?bool
    {
        return $this->palstek;
    }

    public function setPalstek(bool $palstek): self
    {
        $this->palstek = $palstek;

        return $this;
    }

    public function isSchotstek(): ?bool
    {
        return $this->Schotstek;
    }

    public function setSchotstek(bool $Schotstek): self
    {
        $this->Schotstek = $Schotstek;

        return $this;
    }

    public function isWebeleinstek(): ?bool
    {
        return $this->Webeleinstek;
    }

    public function setWebeleinstek(bool $Webeleinstek): self
    {
        $this->Webeleinstek = $Webeleinstek;

        return $this;
    }

    public function getPunkteGesamt(): ?int
    {
        return $this->punkteGesamt;
    }

    public function setPunkteGesamt(int $punkteGesamt): self
    {
        $this->punkteGesamt = $punkteGesamt;

        return $this;
    }

    public function isErledigt(): ?bool
    {
        return $this->erledigt;
    }

    public function setErledigt(bool $erledigt): self
    {
        $this->erledigt = $erledigt;

        return $this;
    }
}
