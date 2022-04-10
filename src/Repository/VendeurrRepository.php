<?php

namespace App\Repository;

use App\Entity\Vendeurr;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Vendeurr|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vendeurr|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vendeurr[]    findAll()
 * @method Vendeurr[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VendeurrRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vendeurr::class);
    }

    // /**
    //  * @return Vendeurr[] Returns an array of Vendeurr objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Vendeurr
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
