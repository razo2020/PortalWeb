<?php

namespace App\Repository;

use App\Entity\DetallePeticionOferta;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DetallePeticionOferta|null find($id, $lockMode = null, $lockVersion = null)
 * @method DetallePeticionOferta|null findOneBy(array $criteria, array $orderBy = null)
 * @method DetallePeticionOferta[]    findAll()
 * @method DetallePeticionOferta[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DetallePeticionOfertaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DetallePeticionOferta::class);
    }

//    /**
//     * @return DetallePeticionOferta[] Returns an array of DetallePeticionOferta objects
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
    public function findOneBySomeField($value): ?DetallePeticionOferta
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
