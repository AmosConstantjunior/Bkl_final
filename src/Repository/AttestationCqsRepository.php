<?php

namespace App\Repository;

use App\Entity\AttestationCqs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AttestationCqs|null find($id, $lockMode = null, $lockVersion = null)
 * @method AttestationCqs|null findOneBy(array $criteria, array $orderBy = null)
 * @method AttestationCqs[]    findAll()
 * @method AttestationCqs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AttestationCqsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AttestationCqs::class);
    }

    // /**
    //  * @return AttestationCqs[] Returns an array of AttestationCqs objects
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
    public function findOneBySomeField($value): ?AttestationCqs
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
