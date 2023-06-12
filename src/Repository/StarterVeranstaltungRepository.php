<?php

namespace App\Repository;

use App\Entity\StarterVeranstaltung;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<StarterVeranstaltung>
 *
 * @method StarterVeranstaltung|null find($id, $lockMode = null, $lockVersion = null)
 * @method StarterVeranstaltung|null findOneBy(array $criteria, array $orderBy = null)
 * @method StarterVeranstaltung[]    findAll()
 * @method StarterVeranstaltung[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StarterVeranstaltungRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StarterVeranstaltung::class);
    }

    public function save(StarterVeranstaltung $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(StarterVeranstaltung $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return StarterVeranstaltung[] Returns an array of StarterVeranstaltung objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?StarterVeranstaltung
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
