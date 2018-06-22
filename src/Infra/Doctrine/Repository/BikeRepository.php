<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 21/06/2018
 * Time: 20:52
 */

namespace App\Infra\Doctrine\Repository;


use App\Domain\Models\Bike;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * Class CityRepository
 * @package App\Infra\Doctrine\Repository
 * @method Bike|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bike|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bike[]    findAll()
 * @method Bike[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BikeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bike::class);
    }

}