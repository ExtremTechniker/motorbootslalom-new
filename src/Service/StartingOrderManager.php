<?php

namespace App\Service;

use App\Entity\Veranstaltung;
use App\Repository\LaufRepository;
use App\Repository\VeranstaltungRepository;

class StartingOrderManager
{
    public function __construct(
        protected VeranstaltungRepository $veranstaltungRepository,
        protected LaufRepository $laufRepository,
        protected StartingOrderGenerator $startingOrderGenerator
    )
    {
    }

    public function generateAndPersist(string $veranstaltung_id): bool
    {
        $veranstaltung = $this->veranstaltungRepository->find($veranstaltung_id);
        if (!$veranstaltung instanceof Veranstaltung) {
            return false;
        }
        // TODO: $classBoats
        $classBoats = [
            "ME" => "Boot1",
            "M1" => "Boot1",
            "M2" => "Boot1",
            "M3" => "Boot1",
            "M4" => "Boot1",
            "M5" => "Boot2",
            "M6" => "Boot2",
            "M7" => "Boot2"
        ];
        $driverList = $this->startingOrderGenerator->generateStartingOrder($classBoats, $veranstaltung->getStartVeranstaltung());




    }
}