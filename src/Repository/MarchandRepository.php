<?php

namespace App\Repository;

use App\Entity\Marchand;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Marchand|null find($id, $lockMode = null, $lockVersion = null)
 * @method Marchand|null findOneBy(array $criteria, array $orderBy = null)
 * @method Marchand[]    findAll()
 * @method Marchand[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MarchandRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Marchand::class);
    }

    // /**
    //  * @return Marchand[] Returns an array of Marchand objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Marchand
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findOneById($value): ?Marchand
    {
        return $this->createQueryBuilder('marchand')
            ->andWhere('marchand.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findAgentbyMarchand($value)
    {
        return $this->createQueryBuilder('marchand')
            ->addSelect('marchand')
            ->innerjoin('marchand.agent', 'pg')
            ->where('p.id = :val')
            ->setParameter('val', $value)
            ->setParameter('agent', 'Agent')
            ->getQuery()
            ->getResult();
    }
}



