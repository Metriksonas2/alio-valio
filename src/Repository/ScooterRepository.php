<?php

namespace App\Repository;

use App\Entity\Scooter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Scooter|null find($id, $lockMode = null, $lockVersion = null)
 * @method Scooter|null findOneBy(array $criteria, array $orderBy = null)
 * @method Scooter[]    findAll()
 * @method Scooter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScooterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Scooter::class);
    }

    // /**
    //  * @return Scooter[] Returns an array of Scooter objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Scooter
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
