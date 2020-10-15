<?php

namespace App\Repository;

use App\Entity\FicheMaintenance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FicheMaintenance|null find($id, $lockMode = null, $lockVersion = null)
 * @method FicheMaintenance|null findOneBy(array $criteria, array $orderBy = null)
 * @method FicheMaintenance[]    findAll()
 * @method FicheMaintenance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FicheMaintenanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FicheMaintenance::class);
    }

    // /**
    //  * @return FicheMaintenance[] Returns an array of FicheMaintenance objects
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
    public function findOneBySomeField($value): ?FicheMaintenance
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
