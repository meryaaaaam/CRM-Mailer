<?php

namespace App\Repository;

use App\Entity\Vehicule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\Query\ResultSetMappingBuilder;

/**
 * @method Vehicule|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vehicule|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vehicule[]    findAll()
 * @method Vehicule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehiculeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vehicule::class);
    }

    // /**
    //  * @return Vehicule[] Returns an array of Vehicule objects
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
    public function findOneBySomeField($value): ?Vehicule
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }*/

//  public function findAllByAll ()
//  {             
//     return $this->createQueryBuilder('v')
//             ->addSelect('v,m')
//             ->innerjoin('v.modele', 'm')
//             ->where('m.id = v.modele')
//             ->getQuery()
//             ->getResult()
//             ;

//  }


 public function findOneById($value): ?Vehicule
    {
        return $this->createQueryBuilder('vehicule')
            ->andWhere('vehicule.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

 
    

    // public function findByYears($value): ?Vehicule
    // {
    //     return $this->createQueryBuilder('vehicule')
    //         ->andWhere('vehicule.annee = :val')
    //         ->setParameter('val', $value)
    //         ->getQuery()
    //         ->getResult()
          
    //     ;
    // } 
    
     
   

    

}
