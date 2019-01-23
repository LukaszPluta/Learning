<?php

namespace App\Repository;

use App\Entity\Ksiazka;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Ksiazka|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ksiazka|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ksiazka[]    findAll()
 * @method Ksiazka[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KsiazkaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Ksiazka::class);
    }

    // /**
    //  * @return Ksiazka[] Returns an array of Ksiazka objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ksiazka
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
