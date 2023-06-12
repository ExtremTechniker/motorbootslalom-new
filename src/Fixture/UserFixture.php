<?php

namespace App\Fixture;

use App\Entity\Institutionen\InstitutionClub;
use App\Entity\Institutionen\InstitutionLand;
use App\Entity\Institutionen\InstitutionStaat;
use App\Entity\Person;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixture extends Fixture implements DependentFixtureInterface
{

    const USER_REF_1 = "USER_REF_1";
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager)
    {

        $user = new User();
        $user->setVorname("Robert");
        $user->setNachname("Hesselmann");
        $user->setGeschlecht("m");
        $user->setPilot(true);
        $user->setEmail("root@extremtechniker.io");
        /** @var InstitutionStaat $ger  */
        $ger = $this->getReference(InstitutionStaatFixture::INSTITUTION_REF_GER, InstitutionStaat::class);
        /** @var InstitutionClub $nw */
        $nw = $this->getReference(InstitutionLandFixture::INSTITUTION_REF_NW, InstitutionLand::class);
        /** @var InstitutionClub $cyc */
        $cyc = $this->getReference(InstitutionClubFixture::INSTITUTION_REF_CYC, InstitutionClub::class);
        $user->addInstitutionen($ger)->addInstitutionen($nw)->addInstitutionen($cyc);

        $user->setUsername("root");
        $password = $this->hasher->hashPassword($user, 'pass_1234');
        $user->setPassword($password);
        $user->setVerified(true);
        $user->setRoles(['ROLE_SUPER_ADMIN', 'ROLE_ADMIN']);

        $manager->persist($user);
        $this->setReference(self::USER_REF_1, $user);
        $manager->flush();
    }


    public function getDependencies(): array
    {
        return [
            InstitutionStaatFixture::class,
            InstitutionLandFixture::class,
            InstitutionClubFixture::class,
        ];
    }
}