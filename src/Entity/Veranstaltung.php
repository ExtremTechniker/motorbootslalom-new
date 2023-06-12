<?php

namespace App\Entity;

use App\Repository\VeranstaltungRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VeranstaltungRepository::class)]
class Veranstaltung
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\ManyToMany(targetEntity: Meisterschaft::class, mappedBy: 'veranstaltungen')]
    private Collection $meisterschaften;

    #[ORM\OneToMany(mappedBy: 'veranstaltung', targetEntity: StarterVeranstaltung::class, orphanRemoval: true)]
    private Collection $startVeranstaltung;

    public function __construct()
    {
        $this->meisterschaften = new ArrayCollection();
        $this->startVeranstaltung = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Meisterschaft>
     */
    public function getMeisterschaften(): Collection
    {
        return $this->meisterschaften;
    }

    public function addMeisterschaften(Meisterschaft $meisterschaften): self
    {
        if (!$this->meisterschaften->contains($meisterschaften)) {
            $this->meisterschaften->add($meisterschaften);
        }

        return $this;
    }

    public function removeMeisterschaften(Meisterschaft $meisterschaften): self
    {
        $this->meisterschaften->removeElement($meisterschaften);

        return $this;
    }

    /**
     * @return Collection<int, StarterVeranstaltung>
     */
    public function getStartVeranstaltung(): Collection
    {
        return $this->startVeranstaltung;
    }

    public function addStartVeranstaltung(StarterVeranstaltung $startVeranstaltung): self
    {
        if (!$this->startVeranstaltung->contains($startVeranstaltung)) {
            $this->startVeranstaltung->add($startVeranstaltung);
            $startVeranstaltung->setVeranstaltung($this);
        }

        return $this;
    }

    public function removeStartVeranstaltung(StarterVeranstaltung $startVeranstaltung): self
    {
        if ($this->startVeranstaltung->removeElement($startVeranstaltung)) {
            // set the owning side to null (unless already changed)
            if ($startVeranstaltung->getVeranstaltung() === $this) {
                $startVeranstaltung->setVeranstaltung(null);
            }
        }

        return $this;
    }
}
