<?php

namespace App\Repository;

use App\Entity\SourcesLeads;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SourcesLeads|null find($id, $lockMode = null, $lockVersion = null)
 * @method SourcesLeads|null findOneBy(array $criteria, array $orderBy = null)
 * @method SourcesLeads[]    findAll()
 * @method SourcesLeads[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SourcesLeadsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SourcesLeads::class);
    }

    // /**
    //  * @return SourcesLeads[] Returns an array of SourcesLeads objects
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
    public function findOneBySomeField($value): ?SourcesLeads
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
