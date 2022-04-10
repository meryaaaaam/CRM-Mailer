<?php

namespace App\Repository;

use App\Entity\Administrateur;

use App\Entity\Agent;
use App\Entity\Utilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @method Utilisateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Utilisateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Utilisateur[]    findAll()
 * @method Utilisateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UtilisateurRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry,ObjectManager $om)
    {
        $this->om = $om;
       parent::__construct($registry, Utilisateur::class);
    }

  
   

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof Utilisateur) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
        }

        $user->setPassword($newHashedPassword);
        $this->_em->persist($user);
        $this->_em->flush();
    }

 
     


    public function fillCompanies(){

        $qb = $this->om->createQueryBuilder();
        $qb2 = $this->om->createQueryBuilder();
       
        

        $sub = $qb2->select('DISTINCT (agent.utilisateur)')
        ->from(Agent::class,'agent')
        ->innerjoin('agent.typeagent', 'typeagent')
        ->where('typeagent.id = 15');
       
         
        $query = $qb->select('utilisateur')
        ->from($this->_entityName,'utilisateur')
        ->where($qb->expr()->notIn('utilisateur.id',$sub->getDQL()));

        return $query;
     ;
        
       

    }


    // public function findOneByIdJoinedToUser(int $UserID): ?Utilisateur
    // {
    //     $entityManager = $this->getEntityManager();

    //     $query = $entityManager->createQuery(
    //         'SELECT a, u
    //         FROM App\Entity\Administrateur a
    //         INNER JOIN a.utilisateur u
    //         WHERE a.id = :id'
    //     )->setParameter('id', $UserID);

    //     return $query->getOneOrNullResult();
    // }



    public function findNameByID($value): ?Utilisateur
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.id = :val')
            ->setParameter('val', $value)
            ->getQuery('nomutilisateur')
            ->getOneOrNullResult()
        ;
    }
   
    
}