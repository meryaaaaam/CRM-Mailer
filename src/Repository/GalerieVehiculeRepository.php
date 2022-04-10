<?php

namespace App\Repository;

use App\Entity\GalerieVehicule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GalerieVehicule|null find($id, $lockMode = null, $lockVersion = null)
 * @method GalerieVehicule|null findOneBy(array $criteria, array $orderBy = null)
 * @method GalerieVehicule[]    findAll()
 * @method GalerieVehicule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GalerieVehiculeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GalerieVehicule::class);
    }

    // /**
    //  * @return GalerieVehicule[] Returns an array of GalerieVehicule objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GalerieVehicule
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
