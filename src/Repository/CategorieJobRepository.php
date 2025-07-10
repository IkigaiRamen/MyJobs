<?php

namespace App\Repository;

use App\Entity\CategorieJob;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategorieJob|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorieJob|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorieJob[]    findAll()
 * @method CategorieJob[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieJobRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorieJob::class);
    }

    // /**
    //  * @return CategorieJob[] Returns an array of CategorieJob objects
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
    public function findOneBySomeField($value): ?CategorieJob
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
