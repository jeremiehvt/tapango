<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 20/06/2018
 * Time: 22:14
 */

namespace App\Infra\Doctrine\Repository;

use App\Domain\Models\City;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * Class CityRepository
 * @package App\Infra\Doctrine\Repository
 * @method City|null find($id, $lockMode = null, $lockVersion = null)
 * @method City|null findOneBy(array $criteria, array $orderBy = null)
 * @method City[]    findAll()
 * @method City[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CityRepository extends ServiceEntityRepository
{
    /**
     * CityRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, City::class);
    }

    /**
     * @param $page
     * @return Paginator
     */
    public function getCityByPage($page, $lmt)
    {

        $qy = $this->createQueryBuilder('c')
            ->leftJoin('c.posGps', 'p')
            ->addSelect('p')
            ->setFirstResult(($page-1)* $lmt)
            ->setMaxResults(10)
        ;

        $qy->getQuery()
            ->getArrayResult()
        ;

        return new Paginator($qy, true);
    }
}
