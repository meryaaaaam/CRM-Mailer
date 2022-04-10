<?php

namespace App\Repository;

use App\Entity\Concessionnairemarchand;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Concessionnairemarchand|null find($id, $lockMode = null, $lockVersion = null)
 * @method Concessionnairemarchand|null findOneBy(array $criteria, array $orderBy = null)
 * @method Concessionnairemarchand[]    findAll()
 * @method Concessionnairemarchand[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConcessionnairemarchandRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Concessionnairemarchand::class);
    }

    // /**
    //  * @return Concessionnairemarchand[] Returns an array of Concessionnairemarchand objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Concessionnairemarchand
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function fillConcessionnairesmarchands(){

        return $this->createQueryBuilder('c')
        ->addSelect('c') // to make Doctrine actually use the join
        
        
        ;
    }

    public function findConcessionnairemarchandbymarchand($value){
        return $this->createQueryBuilder('c')
            ->addSelect('c')
            ->innerjoin('c.marchand', 'm')
            ->where('m.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }
}
