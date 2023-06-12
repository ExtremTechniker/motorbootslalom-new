<?php

namespace App\Entity;

use App\Entity\Disqualtifikationen\DisqualifikationsAnforderung;
use App\Repository\LaufRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LaufRepository::class)]
class Lauf
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'lauf', targetEntity: PenaltyPoints::class, orphanRemoval: true)]
    private Collection $penaltyPoints;

    #[ORM\OneToMany(mappedBy: 'lauf', targetEntity: DisqualifikationsAnforderung::class, orphanRemoval: true)]
    private Collection $disqualifikationsAnforderungen;

    public function __construct()
    {
        $this->penaltyPoints = new ArrayCollection();
        $this->disqualifikationsAnforderungen = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, PenaltyPoints>
     */
    public function getPenaltyPoints(): Collection
    {
        return $this->penaltyPoints;
    }

    public function addBojen(PenaltyPoints $bojen): self
    {
        if (!$this->penaltyPoints->contains($bojen)) {
            $this->penaltyPoints->add($bojen);
            $bojen->setLauf($this);
        }

        return $this;
    }

    public function removeBojen(PenaltyPoints $bojen): self
    {
        if ($this->penaltyPoints->removeElement($bojen)) {
            // set the owning side to null (unless already changed)
            if ($bojen->getLauf() === $this) {
                $bojen->setLauf(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, DisqualifikationsAnforderung>
     */
    public function getDisqualifikationsAnforderungen(): Collection
    {
        return $this->disqualifikationsAnforderungen;
    }

    public function addDisqualificationsAnforderungen(DisqualifikationsAnforderung $disqualificationsAnforderungen): self
    {
        if (!$this->disqualifikationsAnforderungen->contains($disqualificationsAnforderungen)) {
            $this->disqualifikationsAnforderungen->add($disqualificationsAnforderungen);
            $disqualificationsAnforderungen->setLauf($this);
        }

        return $this;
    }

    public function removeDisqualificationsAnforderungen(DisqualifikationsAnforderung $disqualificationsAnforderungen): self
    {
        if ($this->disqualifikationsAnforderungen->removeElement($disqualificationsAnforderungen)) {
            // set the owning side to null (unless already changed)
            if ($disqualificationsAnforderungen->getLauf() === $this) {
                $disqualificationsAnforderungen->setLauf(null);
            }
        }

        return $this;
    }
}
