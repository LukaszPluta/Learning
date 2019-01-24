<?php

namespace App\Repository;

use App\Entity\Gatunek;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Gatunek|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gatunek|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gatunek[]    findAll()
 * @method Gatunek[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GatunekRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Gatunek::class);
    }

    // /**
    //  * @return Gatunek[] Returns an array of Gatunek objects
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
    public function findOneBySomeField($value): ?Gatunek
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
