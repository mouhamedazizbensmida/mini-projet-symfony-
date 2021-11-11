<?php

namespace App\Repository;

use App\Entity\Prodact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Prodact|null find($id, $lockMode = null, $lockVersion = null)
 * @method Prodact|null findOneBy(array $criteria, array $orderBy = null)
 * @method Prodact[]    findAll()
 * @method Prodact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProdactRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Prodact::class);
    }

    // /**
    //  * @return Prodact[] Returns an array of Prodact objects
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
    public function findOneBySomeField($value): ?Prodact
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
