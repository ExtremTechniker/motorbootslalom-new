<?php

namespace App\Repository;

use App\Entity\Disqualtifikationen\Disqualifikation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Disqualifikation>
 *
 * @method Disqualifikation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Disqualifikation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Disqualifikation[]    findAll()
 * @method Disqualifikation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DisqualifikationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Disqualifikation::class);
    }

    public function save(Disqualifikation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Disqualifikation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Disqualifikation[] Returns an array of Disqualifikation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Disqualifikation
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
