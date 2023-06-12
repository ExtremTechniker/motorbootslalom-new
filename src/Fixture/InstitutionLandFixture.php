<?php

namespace App\Fixture;

use App\Entity\Institutionen\Institution;
use App\Entity\Institutionen\InstitutionClub;
use App\Entity\Institutionen\InstitutionLand;
use App\Entity\Institutionen\InstitutionStaat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class InstitutionLandFixture extends Fixture implements DependentFixtureInterface
{

    const INSTITUTION_REF_NW = "INSTITUTION_REF_NW";
    const INSTITUTION_REF_NS = "INSTITUTION_REF_NS";


    public function load(ObjectManager $manager)
    {

        /** @var InstitutionStaat $ger */
        $ger = $this->getReference(InstitutionStaatFixture::INSTITUTION_REF_GER, InstitutionStaat::class);

        $nw = new InstitutionLand();
        $nw->setName('Nordrhein-Westfalen');
        $nw->setKurzform('NW');
        $nw->setStaat($ger);

        $ns = new InstitutionLand();
        $ns->setName('Niedersachsen');
        $ns->setKurzform('NS');
        $ns->setStaat($ger);


        $manager->persist($nw);
        $this->setReference(self::INSTITUTION_REF_NW, $nw);
        $manager->persist($ns);
        $this->setReference(self::INSTITUTION_REF_NS, $ns);


        $manager->flush();

    }

    public function getDependencies(): array
    {
        return [
          InstitutionStaatFixture::class,
        ];
    }

}