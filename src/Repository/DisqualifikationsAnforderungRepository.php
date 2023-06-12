<?php

namespace App\Repository;

use App\Entity\Disqualtifikationen\DisqualifikationsAnforderung;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DisqualifikationsAnforderung>
 *
 * @method DisqualifikationsAnforderung|null find($id, $lockMode = null, $lockVersion = null)
 * @method DisqualifikationsAnforderung|null findOneBy(array $criteria, array $orderBy = null)
 * @method DisqualifikationsAnforderung[]    findAll()
 * @method DisqualifikationsAnforderung[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DisqualifikationsAnforderungRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DisqualifikationsAnforderung::class);
    }

    public function save(DisqualifikationsAnforderung $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(DisqualifikationsAnforderung $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return DisqualifikationsAnforderung[] Returns an array of DisqualifikationsAnforderung objects
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

//    public function findOneBySomeField($value): ?DisqualifikationsAnforderung
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
