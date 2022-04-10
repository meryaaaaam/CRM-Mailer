<?php

namespace App\Repository;
use App\Entity\Typeagent;
use App\Entity\Agent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Agent|null find($id, $lockMode = null, $lockVersion = null)
 * @method Agent|null findOneBy(array $criteria, array $orderBy = null)
 * @method Agent[]    findAll()
 * @method Agent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AgentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Agent::class);
    }

    // /**
    //  * @return Agent[] Returns an array of Agent objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Agent
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function fillVendeurs(){

        return $this->createQueryBuilder('e')
        ->addSelect('e') // to make Doctrine actually use the join
        ->innerjoin('e.typeagent', 'r')
        ->where('r.Type = :vendeur')
        ->setParameter('vendeur', 'Vendeur')
        
        ;

    }

    public function findVendeursforVehicules(){

        return $this->createQueryBuilder('e')
        ->addSelect('e') // to make Doctrine actually use the join
        ->innerjoin('e.typeagent', 'r')
        ->where('r.Type = :vendeur')
        ->setParameter('vendeur', 'Vendeur')
        ->getQuery()
        ->getResult()
        ;

    }



      public function fillAgents(){

        return $this->createQueryBuilder('e')
        ->addSelect('e') // to make Doctrine actually use the join
        ->innerjoin('e.typeagent', 'r')
        ->where('r.Type = :agent')
        ->setParameter('agent', 'Agent')
     
        
        ;

    }


    public function fillAgent(){

        return $this->createQueryBuilder('e')
        ->addSelect('e') // to make Doctrine actually use the join
        ->innerjoin('e.typeagent', 'r')
        ->where('r.Type = :agent')
        ->setParameter('agent', 'Agent')
        ->getQuery()
        ->getResult()
        ;

    }




    public function findAgentbyPartnaire($value){

        return $this->createQueryBuilder('agent')
        ->addSelect('agent') 
        ->innerjoin('agent.typeagent', 'typeagent')  
        ->innerjoin('agent.partenaire', 'p')  
       ->where('typeagent.Type = :agent')
        ->andWhere('p.id = :val')
       ->setParameter('val', $value)
        ->setParameter('agent', 'Agent')
        ->getQuery()
        ->getResult()
        ;

    }

    public function findVendeurbyPartenaire($value){

        return $this->createQueryBuilder('agent')
        ->addSelect('agent') 
        ->innerjoin('agent.typeagent', 'typeagent')  
        ->innerjoin('agent.partenaire', 'p')  
       ->where('typeagent.Type = :agent')
        ->andWhere('p.id = :val')
       ->setParameter('val', $value)
        ->setParameter('agent', 'Vendeur')
        ->getQuery()
        ->getResult()
        ;

    }
    public function fillVendeursbyConcessionnairemarchand($value){
        return $this->createQueryBuilder('agent')
            ->addSelect('agent')
            ->innerjoin('agent.typeagent', 'typeagent')
            ->innerjoin('agent.concessionnairemarchands', 'c')
            ->where('typeagent.Type = :agent')
            ->andWhere('c.id = :val')
            ->setParameter('val', $value)
            ->setParameter('agent', 'Vendeur')
            ->getQuery()
            ->getResult()
            ;
    }

    public function fillAgentsbyConcessionnairemarchand($value){
        return $this->createQueryBuilder('agent')
            ->addSelect('agent')
            ->innerjoin('agent.typeagent', 'typeagent')
            ->innerjoin('agent.concessionnairemarchands', 'c')
            ->where('typeagent.Type = :agent')
            ->andWhere('c.id = :val')
            ->setParameter('val', $value)
            ->setParameter('agent', 'Agent')
            ->getQuery()
            ->getResult()
            ;
    }




    public function findNameByID($value): ?Agent
    {
        return $this->createQueryBuilder('agent')
        ->addSelect('agent')

        ->innerjoin('agent.typeagent', 'typeagent')
        ->innerjoin('agent.utilisateur', 'u')  
        ->where('typeagent.Type = :agent')
            ->andWhere('agent.id = :val')
            ->setParameter('val', $value)
            ->setParameter('agent', 'Agent')
            ->getQuery('u.id')
            ->getOneOrNullResult()
        ;
    }


    public function findOneById($value): ?Agent
    {
        return $this->createQueryBuilder('agent')
            ->andWhere('agent.id = :val')
            ->setParameter('val', $value)
            ->getQuery('agent.id')
            ->getOneOrNullResult()
        ;
    }





}
