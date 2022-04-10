<?php

namespace App\Repository;

use App\Entity\FilesLead;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FilesLead|null find($id, $lockMode = null, $lockVersion = null)
 * @method FilesLead|null findOneBy(array $criteria, array $orderBy = null)
 * @method FilesLead[]    findAll()
 * @method FilesLead[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FilesLeadRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FilesLead::class);
    }

    // /**
    //  * @return FilesLead[] Returns an array of FilesLead objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FilesLead
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */


    
    public function findNotesByLead($value){

        return $this->createQueryBuilder('file')
        ->addSelect('file')   
        ->innerjoin('file.lead', 'l')  
       ->where('l.id = :val')
       ->setParameter('val', $value)
        ->getQuery()
        ->getResult()
        ;
    }
}
