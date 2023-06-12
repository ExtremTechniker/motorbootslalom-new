<?php

namespace App\Repository;

use App\Entity\PenaltyPoints;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PenaltyPoints>
 *
 * @method PenaltyPoints|null find($id, $lockMode = null, $lockVersion = null)
 * @method PenaltyPoints|null findOneBy(array $criteria, array $orderBy = null)
 * @method PenaltyPoints[]    findAll()
 * @method PenaltyPoints[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PenaltyPointsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PenaltyPoints::class);
    }

    public function save(PenaltyPoints $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PenaltyPoints $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return BojenStatus[] Returns an array of BojenStatus objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?BojenStatus
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
