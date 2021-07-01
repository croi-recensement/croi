<?php

namespace App\Repository;

use App\Entity\Pere;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Pere|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pere|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pere[]    findAll()
 * @method Pere[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PereRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pere::class);
    }

    // /**
    //  * @return Pere[] Returns an array of Pere objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Pere
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
