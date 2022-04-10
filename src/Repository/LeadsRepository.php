<?php

namespace App\Repository;

use App\Entity\Leads;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Leads|null find($id, $lockMode = null, $lockVersion = null)
 * @method Leads|null findOneBy(array $criteria, array $orderBy = null)
 * @method Leads[]    findAll()
 * @method Leads[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LeadsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Leads::class);
    }

    // /**
    //  * @return Leads[] Returns an array of Leads objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Leads
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    */

      public function findOneById($value): ?Leads
    {
        return $this->createQueryBuilder('lead')
            ->andWhere('lead.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
 


    public function findBytodaysrem()
    { $date = new \DateTime('@'.strtotime('now')) ;
         $time = date('d/m/Y');
        return $this->createQueryBuilder('l')
            ->andWhere('l.rappel = :val')
            ->setParameter('val',$time)
            
         
            ->getQuery()
            ->getResult()
        ;

      
    }

    public function findAllRem1()
    {  

       $qb= $this->select('u.rappel')
        ->from('leads', 'u')
         ->orderBy('u.name', 'ASC');
     
        ;
      return $qb ;
        

      
    }

    /**
     * @return Array[] Returns an array of Leads objects
     */
    
    public function findAllRem()
    {  

        return $this->createQueryBuilder('l')
        ->select('l.rappel'  )
        ->getQuery()
        ->getResult()
    ;
        
        

      
    }



}
