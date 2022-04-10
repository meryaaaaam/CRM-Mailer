<?php

namespace App\Repository;

use App\Entity\OperationVente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OperationVente|null find($id, $lockMode = null, $lockVersion = null)
 * @method OperationVente|null findOneBy(array $criteria, array $orderBy = null)
 * @method OperationVente[]    findAll()
 * @method OperationVente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OperationVenteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OperationVente::class);
    }

    // /**
    //  * @return OperationVente[] Returns an array of OperationVente objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OperationVente
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
