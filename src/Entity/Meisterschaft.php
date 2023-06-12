<?php

namespace App\Entity;

use App\Entity\Institutionen\Ebene;
use App\Entity\Institutionen\Institution;
use App\Repository\MeisterschaftRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MeisterschaftRepository::class)]
class Meisterschaft
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $bezeichnung = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $kurzform = null;

    #[ORM\Column]
    private ?int $jahr = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Institution $veranstalter = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Ebene $ebene = null;

    #[ORM\Column]
    private ?int $streichresultate = null;

    #[ORM\Column(nullable: true)]
    private ?bool $qualifikationNoetig = null;

    #[ORM\Column(nullable: true)]
    private ?bool $offen = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $headerTitle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $headerUntertitel = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $headerLogoSrc = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $headerLogo2Src = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $VeranstaltungText = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $OrtDatum = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Unterschreibende = null;

    #[ORM\ManyToMany(targetEntity: Veranstaltung::class, inversedBy: 'meisterschafen')]
    private Collection $veranstaltungen;

    #[ORM\OneToMany(mappedBy: 'meisterschaft', targetEntity: StarterMeisterschaft::class, orphanRemoval: true)]
    private Collection $starterMeisterschaft;

    public function __construct()
    {
        $this->veranstaltungen = new ArrayCollection();
        $this->starterMeisterschaft = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBezeichnung(): ?string
    {
        return $this->bezeichnung;
    }

    public function setBezeichnung(string $bezeichnung): self
    {
        $this->bezeichnung = $bezeichnung;

        return $this;
    }

    public function getKurzform(): ?string
    {
        return $this->kurzform;
    }

    public function setKurzform(?string $kurzform): self
    {
        $this->kurzform = $kurzform;

        return $this;
    }

    public function getJahr(): ?int
    {
        return $this->jahr;
    }

    public function setJahr(int $jahr): self
    {
        $this->jahr = $jahr;

        return $this;
    }

    public function getVeranstalter(): ?Institution
    {
        return $this->veranstalter;
    }

    public function setVeranstalter(?Institution $veranstalter): self
    {
        $this->veranstalter = $veranstalter;

        return $this;
    }

    public function getEbene(): ?Ebene
    {
        return $this->ebene;
    }

    public function setEbene(?Ebene $ebene): self
    {
        $this->ebene = $ebene;

        return $this;
    }


    public function getStreichresultate(): ?int
    {
        return $this->streichresultate;
    }

    public function setStreichresultate(int $streichresultate): self
    {
        $this->streichresultate = $streichresultate;

        return $this;
    }

    public function isQualifikationNoetig(): ?bool
    {
        return $this->qualifikationNoetig;
    }

    public function setQualifikationNoetig(?bool $qualifikationNoetig): self
    {
        $this->qualifikationNoetig = $qualifikationNoetig;

        return $this;
    }

    public function isOffen(): ?bool
    {
        return $this->offen;
    }

    public function setOffen(?bool $offen): self
    {
        $this->offen = $offen;

        return $this;
    }

    public function getHeaderTitle(): ?string
    {
        return $this->headerTitle;
    }

    public function setHeaderTitle(?string $headerTitle): self
    {
        $this->headerTitle = $headerTitle;

        return $this;
    }

    public function getHeaderUntertitel(): ?string
    {
        return $this->headerUntertitel;
    }

    public function setHeaderUntertitel(?string $headerUntertitel): self
    {
        $this->headerUntertitel = $headerUntertitel;

        return $this;
    }

    public function getHeaderLogoSrc(): ?string
    {
        return $this->headerLogoSrc;
    }

    public function setHeaderLogoSrc(?string $headerLogoSrc): self
    {
        $this->headerLogoSrc = $headerLogoSrc;

        return $this;
    }

    public function getHeaderLogo2Src(): ?string
    {
        return $this->headerLogo2Src;
    }

    public function setHeaderLogo2Src(?string $headerLogo2Src): self
    {
        $this->headerLogo2Src = $headerLogo2Src;

        return $this;
    }

    public function getVeranstaltungText(): ?string
    {
        return $this->VeranstaltungText;
    }

    public function setVeranstaltungText(?string $VeranstaltungText): self
    {
        $this->VeranstaltungText = $VeranstaltungText;

        return $this;
    }

    public function getOrtDatum(): ?string
    {
        return $this->OrtDatum;
    }

    public function setOrtDatum(?string $OrtDatum): self
    {
        $this->OrtDatum = $OrtDatum;

        return $this;
    }

    public function getUnterschreibende(): ?string
    {
        return $this->Unterschreibende;
    }

    public function setUnterschreibende(?string $Unterschreibende): self
    {
        $this->Unterschreibende = $Unterschreibende;

        return $this;
    }

    /**
     * @return Collection<int, Veranstaltung>
     */
    public function getVeranstaltungen(): Collection
    {
        return $this->veranstaltungen;
    }

    public function addVeranstaltungen(Veranstaltung $veranstaltungen): self
    {
        if (!$this->veranstaltungen->contains($veranstaltungen)) {
            $this->veranstaltungen->add($veranstaltungen);
        }

        return $this;
    }

    public function removeVeranstaltungen(Veranstaltung $veranstaltungen): self
    {
        $this->veranstaltungen->removeElement($veranstaltungen);

        return $this;
    }

    /**
     * @return Collection<int, StarterMeisterschaft>
     */
    public function getStarterMeisterschaft(): Collection
    {
        return $this->starterMeisterschaft;
    }

    public function addStarterMeisterschaft(StarterMeisterschaft $starterMeisterschaft): self
    {
        if (!$this->starterMeisterschaft->contains($starterMeisterschaft)) {
            $this->starterMeisterschaft->add($starterMeisterschaft);
            $starterMeisterschaft->setMeisterschaft($this);
        }

        return $this;
    }

    public function removeStarterMeisterschaft(StarterMeisterschaft $starterMeisterschaft): self
    {
        if ($this->starterMeisterschaft->removeElement($starterMeisterschaft)) {
            // set the owning side to null (unless already changed)
            if ($starterMeisterschaft->getMeisterschaft() === $this) {
                $starterMeisterschaft->setMeisterschaft(null);
            }
        }

        return $this;
    }


}
