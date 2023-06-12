<?php

namespace App\Repository;

use App\Entity\WettkampfrichterBojen;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WettkampfrichterBojen>
 *
 * @method WettkampfrichterBojen|null find($id, $lockMode = null, $lockVersion = null)
 * @method WettkampfrichterBojen|null findOneBy(array $criteria, array $orderBy = null)
 * @method WettkampfrichterBojen[]    findAll()
 * @method WettkampfrichterBojen[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WettkampfrichterBojenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WettkampfrichterBojen::class);
    }

    public function save(WettkampfrichterBojen $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(WettkampfrichterBojen $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return WettkampfrichterBojen[] Returns an array of WettkampfrichterBojen objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('w.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?WettkampfrichterBojen
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
