<?php

namespace App\Repository;

use App\Entity\CalendrierIndisponibilite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CalendrierIndisponibilite|null find($id, $lockMode = null, $lockVersion = null)
 * @method CalendrierIndisponibilite|null findOneBy(array $criteria, array $orderBy = null)
 * @method CalendrierIndisponibilite[]    findAll()
 * @method CalendrierIndisponibilite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CalendrierIndisponibiliteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CalendrierIndisponibilite::class);
    }

    // /**
    //  * @return CalendrierIndisponibilite[] Returns an array of CalendrierIndisponibilite objects
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
    public function findOneBySomeField($value): ?CalendrierIndisponibilite
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
