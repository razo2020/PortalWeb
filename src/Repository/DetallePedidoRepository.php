<?php

namespace App\Repository;

use App\Entity\DetallePedido;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DetallePedido|null find($id, $lockMode = null, $lockVersion = null)
 * @method DetallePedido|null findOneBy(array $criteria, array $orderBy = null)
 * @method DetallePedido[]    findAll()
 * @method DetallePedido[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DetallePedidoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DetallePedido::class);
    }

//    /**
//     * @return DetallePedido[] Returns an array of DetallePedido objects
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
    public function findOneBySomeField($value): ?DetallePedido
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
