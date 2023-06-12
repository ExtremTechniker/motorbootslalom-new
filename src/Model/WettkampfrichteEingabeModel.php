<?php

namespace App\Model;

use App\Entity\Disqualtifikationen\DisqualifikationsAnforderung;
use App\Entity\Lauf;
use App\Entity\PenaltyPoints;
use App\Entity\Wettkampfrichter;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class WettkampfrichteEingabeModel
{

    protected ?Wettkampfrichter $wettkampfrichter = null;
    protected ?Lauf $lauf = null;
    /** @var Collection<PenaltyPoints> $penalties */
    protected Collection $penalties;
    /** @var Collection<DisqualifikationsAnforderung> $disqualifikationAnfoderung */
    protected Collection $disqualifikationAnfoderung;


    public function __construct()
    {
        $this->penalties = new ArrayCollection();
        $this->disqualifikationAnfoderung = new ArrayCollection();
    }

    /**
     * @return Wettkampfrichter|null
     */
    public function getWettkampfrichter(): ?Wettkampfrichter
    {
        return $this->wettkampfrichter;
    }

    /**
     * @param Wettkampfrichter|null $wettkampfrichter
     */
    public function setWettkampfrichter(?Wettkampfrichter $wettkampfrichter): void
    {
        $this->wettkampfrichter = $wettkampfrichter;
    }

    /**
     * @return Lauf|null
     */
    public function getLauf(): ?Lauf
    {
        return $this->lauf;
    }

    /**
     * @param Lauf|null $lauf
     */
    public function setLauf(?Lauf $lauf): void
    {
        $this->lauf = $lauf;
    }

    /**
     * @return Collection
     */
    public function getPenalties(): Collection
    {
        return $this->penalties;
    }

    /**
     * @param Collection $penalties
     */
    public function setPenalties(Collection $penalties): void
    {
        $this->penalties = $penalties;
    }

    /**
     * @return Collection
     */
    public function getDisqualifikationAnfoderung(): Collection
    {
        return $this->disqualifikationAnfoderung;
    }

    /**
     * @param Collection $disqualifikationAnfoderung
     */
    public function setDisqualifikationAnfoderung(Collection $disqualifikationAnfoderung): void
    {
        $this->disqualifikationAnfoderung = $disqualifikationAnfoderung;
    }



}