<?php

namespace App\Repository;

use App\Entity\Artec;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Artec|null find($id, $lockMode = null, $lockVersion = null)
 * @method Artec|null findOneBy(array $criteria, array $orderBy = null)
 * @method Artec[]    findAll()
 * @method Artec[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArtecRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Artec::class);
    }

    // /**
    //  * @return Artec[] Returns an array of Artec objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Artec
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
