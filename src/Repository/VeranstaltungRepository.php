<?php

namespace App\Repository;

use App\Entity\Veranstaltung;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Veranstaltung>
 *
 * @method Veranstaltung|null find($id, $lockMode = null, $lockVersion = null)
 * @method Veranstaltung|null findOneBy(array $criteria, array $orderBy = null)
 * @method Veranstaltung[]    findAll()
 * @method Veranstaltung[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VeranstaltungRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Veranstaltung::class);
    }

    public function save(Veranstaltung $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Veranstaltung $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Veranstaltungen[] Returns an array of Veranstaltungen objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Veranstaltungen
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
