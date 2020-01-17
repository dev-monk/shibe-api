<?php

namespace App\Repository;

use App\Entity\Shibe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Shibe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Shibe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Shibe[]    findAll()
 * @method Shibe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShibeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Shibe::class);
    }

    // /**
    //  * @return Shibe[] Returns an array of Shibe objects
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
    public function findOneBySomeField($value): ?Shibe
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
