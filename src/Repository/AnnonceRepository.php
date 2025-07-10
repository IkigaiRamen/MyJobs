<?php

namespace App\Repository;

use App\Entity\Annonce;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Annonce|null find($id, $lockMode = null, $lockVersion = null)
 * @method Annonce|null findOneBy(array $criteria, array $orderBy = null)
 * @method Annonce[]    findAll()
 * @method Annonce[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnonceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Annonce::class);
    }

    public function findOneByCityandExp($city,$exp,$type,$sex,$qualification,$categorie): array
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.city = :cit')
            ->setParameter('cit', $city)
            ->andWhere('a.exp = :ex')
            ->setParameter('ex', $exp)
            ->andWhere('a.type = :t')
            ->setParameter('t', $type)
            ->andWhere('a.sex = :s')
            ->setParameter('s', $sex)
            ->andWhere('a.qualification = :q')
            ->setParameter('q', $qualification)
            ->andWhere('a.categorie = :c')
            ->setParameter('c', $categorie)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findbyTitre($titre): array
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.titre = :tit')
            ->setParameter('tit', $titre)
            ->getQuery()
            ->getResult()
        ;
    }

   
    

    public function findOneByDate($date): array
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.expire > :cit')
            ->setParameter('cit', $date)
            ->getQuery()
            ->getResult()
        ;
    }


    public function findExactDemandeDemploi($sex,$exp,$categorie): array
    {
        //$r = '["ROLE_TRAVAILLEUR"]';
        return $this->createQueryBuilder('a')
        ->andWhere('a.sex = :s')
        ->setParameter('s', $sex)
        ->andWhere('a.exp = :ex')
        ->setParameter('ex', $exp)
        ->andWhere('a.categorie = :a')
        ->setParameter('a', $categorie)
        ->getQuery()
        ->getResult()
    ;
        
    }

    // /**
    //  * @return Annonce[] Returns an array of Annonce objects
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
    public function findOneBySomeField($value): ?Annonce
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
