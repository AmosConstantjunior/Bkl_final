<?php

namespace App\Repository;

use App\Entity\NomClient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NomClient|null find($id, $lockMode = null, $lockVersion = null)
 * @method NomClient|null findOneBy(array $criteria, array $orderBy = null)
 * @method NomClient[]    findAll()
 * @method NomClient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NomClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NomClient::class);
    }

    // /**
    //  * @return NomClient[] Returns an array of NomClient objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NomClient
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
