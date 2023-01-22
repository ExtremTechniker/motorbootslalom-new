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
    private $id;

    #[ORM\Column(type: 'integer')]
    private $person_id;

    #[ORM\Column(type: 'integer')]
    private $veranstaltung_id;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPersonId(): ?int
    {
        return $this->person_id;
    }

    public function setPersonId(int $person_id): self
    {
        $this->person_id = $person_id;

        return $this;
    }

    public function getVeranstaltungId(): ?int
    {
        return $this->veranstaltung_id;
    }

    public function setVeranstaltungId(int $veranstaltung_id): self
    {
        $this->veranstaltung_id = $veranstaltung_id;

        return $this;
    }

    public function getRoles(): ?array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }
}
