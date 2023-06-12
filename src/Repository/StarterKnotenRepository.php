<?php

namespace App\Repository;

use App\Entity\StarterKnoten;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<StarterKnoten>
 *
 * @method StarterKnoten|null find($id, $lockMode = null, $lockVersion = null)
 * @method StarterKnoten|null findOneBy(array $criteria, array $orderBy = null)
 * @method StarterKnoten[]    findAll()
 * @method StarterKnoten[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StarterKnotenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StarterKnoten::class);
    }

    public function save(StarterKnoten $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(StarterKnoten $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return StarterKnoten[] Returns an array of StarterKnoten objects
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

//    public function findOneBySomeField($value): ?StarterKnoten
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
