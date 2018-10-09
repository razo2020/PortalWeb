<?php

namespace App\Repository;

use App\Entity\Solped;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Solped|null find($id, $lockMode = null, $lockVersion = null)
 * @method Solped|null findOneBy(array $criteria, array $orderBy = null)
 * @method Solped[]    findAll()
 * @method Solped[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SolpedRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Solped::class);
    }

//    /**
//     * @return Solped[] Returns an array of Solped objects
//     */
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
    public function findOneBySomeField($value): ?Solped
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
