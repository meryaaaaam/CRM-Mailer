<?php

namespace App\Repository;

use App\Entity\Modelesms;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Modelesms|null find($id, $lockMode = null, $lockVersion = null)
 * @method Modelesms|null findOneBy(array $criteria, array $orderBy = null)
 * @method Modelesms[]    findAll()
 * @method Modelesms[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModelesmsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Modelesms::class);
    }

    // /**
    //  * @return Modelesms[] Returns an array of Modelesms objects
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
    public function findOneBySomeField($value): ?Modelesms
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
