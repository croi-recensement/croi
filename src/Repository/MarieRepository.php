<?php

namespace App\Repository;

use App\Entity\Marie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Marie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Marie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Marie[]    findAll()
 * @method Marie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MarieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Marie::class);
    }

    // /**
    //  * @return Marie[] Returns an array of Marie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Marie
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
