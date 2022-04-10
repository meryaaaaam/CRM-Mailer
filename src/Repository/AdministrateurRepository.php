<?php

namespace App\Repository;

use App\Entity\Administrateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Administrateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Administrateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Administrateur[]    findAll()
 * @method Administrateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdministrateurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Administrateur::class);
    }

    
    
    public function findOneById($value): ?Administrateur
    {
        return $this->createQueryBuilder('administrateur')
            ->andWhere('administrateur.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
 

    public function findOneByUtilisateur_Id($value): ?Administrateur
    {
        return $this->createQueryBuilder('admin')
            ->andWhere('administrateur.utilisateur_id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
 
    

}
