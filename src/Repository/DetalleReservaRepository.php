<?php

namespace App\Repository;

use App\Entity\DetalleReserva;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DetalleReserva|null find($id, $lockMode = null, $lockVersion = null)
 * @method DetalleReserva|null findOneBy(array $criteria, array $orderBy = null)
 * @method DetalleReserva[]    findAll()
 * @method DetalleReserva[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DetalleReservaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DetalleReserva::class);
    }

//    /**
//     * @return DetalleReserva[] Returns an array of DetalleReserva objects
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
    public function findOneBySomeField($value): ?DetalleReserva
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
