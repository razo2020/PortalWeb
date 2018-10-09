<?php

namespace App\Repository;

use App\Entity\DetalleGuia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DetalleGuia|null find($id, $lockMode = null, $lockVersion = null)
 * @method DetalleGuia|null findOneBy(array $criteria, array $orderBy = null)
 * @method DetalleGuia[]    findAll()
 * @method DetalleGuia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DetalleGuiaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DetalleGuia::class);
    }

//    /**
//     * @return DetalleGuia[] Returns an array of DetalleGuia objects
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
    public function findOneBySomeField($value): ?DetalleGuia
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
