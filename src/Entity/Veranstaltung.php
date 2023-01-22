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

    #[ORM\ManyToMany(targetEntity: Meisterschaft::class, inversedBy: 'veranstaltungs')]
    private Collection $meisterschaften;

    public function __construct()
    {
        $this->meisterschaften = new ArrayCollection();
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
}
