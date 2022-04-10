<?php

namespace App\Repository;

use App\Entity\Typemedia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Typemedia|null find($id, $lockMode = null, $lockVersion = null)
 * @method Typemedia|null findOneBy(array $criteria, array $orderBy = null)
 * @method Typemedia[]    findAll()
 * @method Typemedia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypemediaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Typemedia::class);
    }

    // /**
    //  * @return Typemedia[] Returns an array of Typemedia objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Typemedia
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */


    public function gettype($valeur): ?Typemedia{
        return $this->createQueryBuilder('a')
        ->andWhere('a.Type = :val')
        ->setParameter('val', $valeur)
        ->getQuery()
        ->getOneOrNullResult()
    ;
    }
}
