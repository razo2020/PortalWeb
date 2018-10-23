<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 04/10/2018
 * Time: 12:18 PM
 */

namespace App\Repository;

use App\Entity\Almacen;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Almacen|null find($id, $lockMode = null, $lockVersion = null)
 * @method Almacen|null findOneBy(array $criteria, array $orderBy = null)
 * @method Almacen[]    findAll()
 * @method Almacen[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlmacenRepository extends ServiceEntityRepository
{
    /**
     * AlmacenRepository constructor.
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Almacen::class);
    }
}