<?php

namespace App\Entity\Disqualtifikationen;

use App\Repository\DisqualifikationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DisqualifikationRepository::class)]
class Disqualifikation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'disqualifikationsGrund', targetEntity: DisqualifikationsAnforderung::class)]
    private Collection $disqualifikationsAnforderungen;

    #[ORM\Column(length: 5)]
    private ?string $kurz = null;

    public function __construct()
    {
        $this->disqualifikationsAnforderungen = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, DisqualifikationsAnforderung>
     */
    public function getDisqualifikationsAnforderungen(): Collection
    {
        return $this->disqualifikationsAnforderungen;
    }

    public function addDisqualifikationsAnforderungen(DisqualifikationsAnforderung $disqualifikationsAnforderungen): self
    {
        if (!$this->disqualifikationsAnforderungen->contains($disqualifikationsAnforderungen)) {
            $this->disqualifikationsAnforderungen->add($disqualifikationsAnforderungen);
            $disqualifikationsAnforderungen->setDisqualifikationsGrund($this);
        }

        return $this;
    }

    public function removeDisqualifikationsAnforderungen(DisqualifikationsAnforderung $disqualifikationsAnforderungen): self
    {
        if ($this->disqualifikationsAnforderungen->removeElement($disqualifikationsAnforderungen)) {
            // set the owning side to null (unless already changed)
            if ($disqualifikationsAnforderungen->getDisqualifikationsGrund() === $this) {
                $disqualifikationsAnforderungen->setDisqualifikationsGrund(null);
            }
        }

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
