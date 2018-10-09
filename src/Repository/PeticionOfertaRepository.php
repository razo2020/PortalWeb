<?php

namespace App\Repository;

use App\Entity\PeticionOferta;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PeticionOferta|null find($id, $lockMode = null, $lockVersion = null)
 * @method PeticionOferta|null findOneBy(array $criteria, array $orderBy = null)
 * @method PeticionOferta[]    findAll()
 * @method PeticionOferta[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PeticionOfertaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PeticionOferta::class);
    }

//    /**
//     * @return PeticionOferta[] Returns an array of PeticionOferta objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PeticionOferta
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
