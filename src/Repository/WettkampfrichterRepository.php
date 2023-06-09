<?php

namespace App\Repository;

use App\Entity\Wettkampfrichter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Wettkampfrichter|null find($id, $lockMode = null, $lockVersion = null)
 * @method Wettkampfrichter|null findOneBy(array $criteria, array $orderBy = null)
 * @method Wettkampfrichter[]    findAll()
 * @method Wettkampfrichter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WettkampfrichterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Wettkampfrichter::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Wettkampfrichter $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Wettkampfrichter $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return Wettkampfrichter[] Returns an array of Wettkampfrichter objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Wettkampfrichter
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
