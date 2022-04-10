<?php

namespace App\Repository;

use App\Entity\Typeagent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Typeagent|null find($id, $lockMode = null, $lockVersion = null)
 * @method Typeagent|null findOneBy(array $criteria, array $orderBy = null)
 * @method Typeagent[]    findAll()
 * @method Typeagent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeagentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Typeagent::class);
    }

    // /**
    //  * @return Typeagent[] Returns an array of Typeagent objects
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
    public function findOneBySomeField($value): ?Typeagent
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
