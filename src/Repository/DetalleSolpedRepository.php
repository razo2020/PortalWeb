<?php

namespace App\Repository;

use App\Entity\DetalleSolped;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DetalleSolped|null find($id, $lockMode = null, $lockVersion = null)
 * @method DetalleSolped|null findOneBy(array $criteria, array $orderBy = null)
 * @method DetalleSolped[]    findAll()
 * @method DetalleSolped[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DetalleSolpedRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DetalleSolped::class);
    }

//    /**
//     * @return DetalleSolped[] Returns an array of DetalleSolped objects
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
    public function findOneBySomeField($value): ?DetalleSolped
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
