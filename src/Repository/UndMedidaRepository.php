<?php

namespace App\Repository;

use App\Entity\UndMedida;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UndMedida|null find($id, $lockMode = null, $lockVersion = null)
 * @method UndMedida|null findOneBy(array $criteria, array $orderBy = null)
 * @method UndMedida[]    findAll()
 * @method UndMedida[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UndMedidaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UndMedida::class);
    }

//    /**
//     * @return UndMedida[] Returns an array of UndMedida objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UndMedida
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
