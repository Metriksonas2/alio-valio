<?php

namespace App\Repository;

use App\Entity\SystemNotification;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SystemNotification|null find($id, $lockMode = null, $lockVersion = null)
 * @method SystemNotification|null findOneBy(array $criteria, array $orderBy = null)
 * @method SystemNotification[]    findAll()
 * @method SystemNotification[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SystemNotificationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SystemNotification::class);
    }

    // /**
    //  * @return SystemNotification[] Returns an array of SystemNotification objects
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
    public function findOneBySomeField($value): ?SystemNotification
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
