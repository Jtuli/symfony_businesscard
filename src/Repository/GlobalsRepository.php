<?php

namespace App\Repository;

use App\Entity\Globals;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Globals|null find($id, $lockMode = null, $lockVersion = null)
 * @method Globals|null findOneBy(array $criteria, array $orderBy = null)
 * @method Globals[]    findAll()
 * @method Globals[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GlobalsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Globals::class);
    }

    // /**
    //  * @return Globals[] Returns an array of Globals objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Globals
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
