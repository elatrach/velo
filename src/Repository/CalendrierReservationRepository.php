<?php

namespace App\Repository;

use App\Entity\CalendrierReservation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CalendrierReservation|null find($id, $lockMode = null, $lockVersion = null)
 * @method CalendrierReservation|null findOneBy(array $criteria, array $orderBy = null)
 * @method CalendrierReservation[]    findAll()
 * @method CalendrierReservation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CalendrierReservationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CalendrierReservation::class);
    }

    // /**
    //  * @return CalendrierReservation[] Returns an array of CalendrierReservation objects
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
    public function findOneBySomeField($value): ?CalendrierReservation
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
