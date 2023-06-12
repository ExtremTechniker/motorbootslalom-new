<?php

namespace App\Repository;

use App\Entity\StarterMeisterschaft;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<StarterMeisterschaft>
 *
 * @method StarterMeisterschaft|null find($id, $lockMode = null, $lockVersion = null)
 * @method StarterMeisterschaft|null findOneBy(array $criteria, array $orderBy = null)
 * @method StarterMeisterschaft[]    findAll()
 * @method StarterMeisterschaft[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StarterMeisterschaftRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StarterMeisterschaft::class);
    }

    public function save(StarterMeisterschaft $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(StarterMeisterschaft $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return StarterMeisterschaft[] Returns an array of StarterMeisterschaft objects
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

//    public function findOneBySomeField($value): ?StarterMeisterschaft
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
