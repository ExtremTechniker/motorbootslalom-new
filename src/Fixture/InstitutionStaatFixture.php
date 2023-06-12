<?php

namespace App\Fixture;

use App\Entity\Institutionen\Institution;
use App\Entity\Institutionen\InstitutionClub;
use App\Entity\Institutionen\InstitutionLand;
use App\Entity\Institutionen\InstitutionStaat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class InstitutionStaatFixture extends Fixture
{

    const INSTITUTION_REF_GER = "INSTITUTION_REF_GER";

    public function load(ObjectManager $manager)
    {
        $ger = new InstitutionStaat();
        $ger->setName('Deutscher Motoryachtverband e.V.');
        $ger->setKurzform('GER');

        $manager->persist($ger);
        $this->setReference(self::INSTITUTION_REF_GER, $ger);
        $manager->flush();


    }

}