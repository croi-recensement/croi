<?php

namespace App\Repository;

use App\Entity\Logement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Logement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Logement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Logement[]    findAll()
 * @method Logement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LogementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Logement::class);
    }

    /*public function findByOwner(){
        return $this->createQueryBuilder('l')
                    ->where('l.proprietaireounon = 1'
                    ->getQuery()
                    ->getResult();
    }

    public function findByProvince($value){
        return $this->createQueryBuilder('l')
                    ->where('l.province = :val')
                    ->setParameter('val', $value)
                    ->getQuery()
                    ->getResult();
    }*/

    public function findByProvinces($value)
    {
        return $this->createQueryBuilder('l')
                    ->select('COUNT(l.sexe)')
                    ->andWhere('l.lieuNaissance =:val')
                    ->setParameter('val', $value)
                    ->getQuery()
                    ->getResult();
    }

    // /**
    //  * @return Logement[] Returns an array of Logement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Logement
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
