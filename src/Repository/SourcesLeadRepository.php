<?php

namespace App\Repository;

use App\Entity\SourcesLead;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SourcesLead|null find($id, $lockMode = null, $lockVersion = null)
 * @method SourcesLead|null findOneBy(array $criteria, array $orderBy = null)
 * @method SourcesLead[]    findAll()
 * @method SourcesLead[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SourcesLeadRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SourcesLead::class);
    }

    // /**
    //  * @return SourcesLead[] Returns an array of SourcesLead objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SourcesLead
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
