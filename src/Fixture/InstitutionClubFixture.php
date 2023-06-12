<?php

namespace App\Fixture;

use App\Entity\Institutionen\Institution;
use App\Entity\Institutionen\InstitutionClub;
use App\Entity\Institutionen\InstitutionLand;
use App\Entity\Institutionen\InstitutionStaat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class InstitutionClubFixture extends Fixture implements DependentFixtureInterface
{

    const INSTITUTION_REF_AMC = "INSTITUTION_REF_AMC";
    const INSTITUTION_REF_CYC = "INSTITUTION_REF_CYC";
    const INSTITUTION_REF_YCC = "INSTITUTION_REF_YCC";
    const INSTITUTION_REF_YCHAMM = "INSTITUTION_REF_YCHAMM";


    public function load(ObjectManager $manager)
    {
        /** @var InstitutionStaat $ger */
        $ger = $this->getReference(InstitutionStaatFixture::INSTITUTION_REF_GER, InstitutionStaat::class);

        /** @var InstitutionLand $nw */
        $nw = $this->getReference(InstitutionLandFixture::INSTITUTION_REF_NW, InstitutionLand::class);

        /** @var InstitutionLand $ns */
        $ns = $this->getReference(InstitutionLandFixture::INSTITUTION_REF_NS, InstitutionLand::class);


        $amc = new InstitutionClub();
        $amc->setName('Automobil- und Motorbootclub Castrop-Rauxel e.V.');
        $amc->setKurzform('AMC');
        $amc->setOrt("Castrop-Rauxel");
        $amc->setStaat($ger);
        $amc->setLand($nw);

        $cyc = new InstitutionClub();
        $cyc->setName('CYC Crefelder Yachtclub e.V.');
        $cyc->setKurzform('CYC');
        $cyc->setOrt("Krefeld");
        $cyc->setStaat($ger);
        $cyc->setLand($nw);

        $ycc = new InstitutionClub();
        $ycc->setName('Yacht-Club Celle e.V.');
        $ycc->setKurzform('YCC');
        $ycc->setOrt('Celle');
        $ycc->setStaat($ger);
        $ycc->setLand($ns);

        $ychamm = new InstitutionClub();
        $ychamm->setName('Yachtclub Hamm e.V.');
        $ychamm->setKurzform('YC Hamm');
        $ychamm->setOrt('Hamm');
        $ychamm->setStaat($ger);
        $ychamm->setLand($nw);


        $manager->persist($amc);
        $this->setReference(self::INSTITUTION_REF_AMC, $amc);
        $manager->persist($cyc);
        $this->setReference(self::INSTITUTION_REF_CYC, $cyc);
        $manager->persist($ycc);
        $this->setReference(self::INSTITUTION_REF_YCC, $ycc);
        $manager->persist($ychamm);
        $this->setReference(self::INSTITUTION_REF_YCHAMM, $ychamm);

        $manager->flush();

    }

    public function getDependencies(): array
    {
        return [
            InstitutionStaatFixture::class,
            InstitutionLandFixture::class,
        ];
    }

}