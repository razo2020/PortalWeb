<?php

namespace App\Repository;

use App\Entity\Aprobacion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Aprobacion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Aprobacion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Aprobacion[]    findAll()
 * @method Aprobacion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AprobacionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Aprobacion::class);
    }

//    /**
//     * @return Aprobacion[] Returns an array of Aprobacion objects
//     */
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
    public function findOneBySomeField($value): ?Aprobacion
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
