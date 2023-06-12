<?php

namespace App\Service;

use App\Entity\StarterVeranstaltung;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ReadableCollection;

class StartingOrderGenerator
{
    /**
     * @param array $classBoats
     * @param Collection<int, StarterVeranstaltung> $drivers
     * @return array
     */
    public function generateStartingOrder(array $classBoats, Collection $drivers): array
    {
        $boatDriver = $this->groupDriversViaBoat($drivers, $classBoats);
        /** @var StarterVeranstaltung[][] $boats */
        $boats = array_keys($boatDriver);
        $readyBoats = array_fill_keys($boats, false);
        $driverList = [];
        while (true) {
            if (!array_search(false, $readyBoats)) {
                break;
            }
            $boat = current($boats);
            if ($readyBoats[$boat] === false) {
                $driver = current($boats[$boat]);
                // TODO Add Multiple Läufe
                $driverList[] = $driver;
                if (!next($boats[$boat])) {
                    $readyBoats[$boat] = true;
                }
            }

            if (!next($boote_keys)) {
                reset($boote_keys);
            }
        }

        return $driverList;
    }

    /**
     * @param Collection<int, StarterVeranstaltung> $drivers
     * @param array $classBoats
     * @return array
     */
    protected function groupDriversViaBoat(Collection $drivers, array $classBoats): array
    {
        $boats = [];
        foreach ($classBoats as $class => $boat) {
            $boats[$boat] = $this->getDriverFromClass($drivers, $class);
        }
        return $boats;
    }

    /**
     * @param Collection<int, StarterVeranstaltung> $drivers
     * @param string $class
     * @return ReadableCollection
     */
    protected function getDriverFromClass(Collection $drivers, string $class): ReadableCollection
    {
        return $drivers->filter(function (StarterVeranstaltung $driver) use($class) {
            return $driver->getKlasse() === $class;
        });
    }
}