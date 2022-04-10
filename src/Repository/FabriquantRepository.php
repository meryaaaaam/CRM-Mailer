<?php

namespace App\Repository;

use App\Entity\Fabriquant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Fabriquant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fabriquant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fabriquant[]    findAll()
 * @method Fabriquant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FabriquantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fabriquant::class);
    }

    // /**
    //  * @return Fabriquant[] Returns an array of Fabriquant objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Fabriquant
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
