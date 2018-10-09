<?php

namespace App\Repository;

use App\Entity\Devolucion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Devolucion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Devolucion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Devolucion[]    findAll()
 * @method Devolucion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DevolucionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Devolucion::class);
    }

//    /**
//     * @return Devolucion[] Returns an array of Devolucion objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Devolucion
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
