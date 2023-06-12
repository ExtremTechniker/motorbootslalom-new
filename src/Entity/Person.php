<?php

namespace App\Entity;

use App\Entity\Institutionen\Institution;
use App\Entity\Institutionen\InstitutionClub;
use App\Entity\Institutionen\InstitutionLand;
use App\Entity\Institutionen\InstitutionStaat;
use App\Repository\PersonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping\InheritanceType;

#[ORM\Entity(repositoryClass: PersonRepository::class)]
#[InheritanceType('SINGLE_TABLE')]
#[DiscriminatorColumn(name: 'type', type: 'string')]
#[DiscriminatorMap(["user" => User::class, "person" => self::class])]
class Person
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: Institution::class)]
    private Collection $institutionen;

    #[ORM\Column(length: 255)]
    private ?string $vorname = null;

    #[ORM\Column(length: 255)]
    private ?string $nachname = null;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private ?string $email;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $geburtstag = null;

    #[ORM\Column(length: 1)]
    private ?string $geschlecht = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $telefon = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $telefonMobil = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $strasse = null;

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    private ?int $hausnummer = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $plz = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ort = null;

    #[ORM\Column(type: Types::BOOLEAN)]
    private bool $pilot = true;

    #[ORM\Column(length: 255)]
    private ?string $mbsLizenz = "";

    #[ORM\Column(length: 255)]
    private ?string $ms11Lizenz = "";

    #[ORM\Column(length: 255)]
    private ?string $rennLizenz = "";

    public function __construct()
    {
        $this->institutionen = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Institution>
     */
    public function getInstitutionen(): Collection
    {
        return $this->institutionen;
    }

    public function addInstitutionen(Institution $institutionen): self
    {
        if (!$this->institutionen->contains($institutionen)) {
            $this->institutionen->add($institutionen);
        }

        return $this;
    }

    public function removeInstitutionen(Institution $institutionen): self
    {
        $this->institutionen->removeElement($institutionen);

        return $this;
    }

    public function getVorname(): ?string
    {
        return $this->vorname;
    }

    public function setVorname(string $vorname): self
    {
        $this->vorname = $vorname;

        return $this;
    }

    public function getNachname(): ?string
    {
        return $this->nachname;
    }

    public function setNachname(string $nachname): self
    {
        $this->nachname = $nachname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getGeburtstag(): ?\DateTimeInterface
    {
        return $this->geburtstag;
    }

    public function setGeburtstag(\DateTimeInterface $geburtstag): self
    {
        $this->geburtstag = $geburtstag;

        return $this;
    }

    public function getGeschlecht(): ?string
    {
        return $this->geschlecht;
    }

    public function setGeschlecht(string $geschlecht): self
    {
        $this->geschlecht = $geschlecht;

        return $this;
    }

    public function getTelefon(): ?string
    {
        return $this->telefon;
    }

    public function setTelefon(string $telefon): self
    {
        $this->telefon = $telefon;

        return $this;
    }

    public function getTelefonMobil(): ?string
    {
        return $this->telefonMobil;
    }

    public function setTelefonMobil(string $telefonMobil): self
    {
        $this->telefonMobil = $telefonMobil;

        return $this;
    }

    public function getStrasse(): ?string
    {
        return $this->strasse;
    }

    public function setStrasse(string $strasse): self
    {
        $this->strasse = $strasse;

        return $this;
    }

    public function getHausnummer(): ?string
    {
        return $this->hausnummer;
    }

    public function setHausnummer(string $hausnummer): self
    {
        $this->hausnummer = $hausnummer;

        return $this;
    }

    public function getPlz(): ?string
    {
        return $this->plz;
    }

    public function setPlz(string $plz): self
    {
        $this->plz = $plz;

        return $this;
    }

    public function getOrt(): ?string
    {
        return $this->ort;
    }

    public function setOrt(string $ort): self
    {
        $this->ort = $ort;

        return $this;
    }

    public function getPilot(): ?bool
    {
        return $this->pilot;
    }

    public function setPilot(bool $pilot): self
    {
        $this->pilot = $pilot;

        return $this;
    }

    public function getMbsLizenz(): ?string
    {
        return $this->mbsLizenz;
    }

    public function setMbsLizenz(string $mbsLizenz): self
    {
        $this->mbsLizenz = $mbsLizenz;

        return $this;
    }

    public function getMs11Lizenz(): ?string
    {
        return $this->ms11Lizenz;
    }

    public function setMs11Lizenz(string $ms11Lizenz): self
    {
        $this->ms11Lizenz = $ms11Lizenz;

        return $this;
    }

    public function getRennLizenz(): ?string
    {
        return $this->rennLizenz;
    }

    public function setRennLizenz(string $rennLizenz): self
    {
        $this->rennLizenz = $rennLizenz;

        return $this;
    }
}
