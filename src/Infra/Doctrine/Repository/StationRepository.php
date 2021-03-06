<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 20/06/2018
 * Time: 22:19
 */

namespace App\Infra\Doctrine\Repository;

use App\Domain\Models\Station;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * Class StationRepository
 * @package App\Infra\Doctrine\Repository
 * @method Station|null find($id, $lockMode = null, $lockVersion = null)
 * @method Station|null findOneBy(array $criteria, array $orderBy = null)
 * @method Station[]    findAll()
 * @method Station[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Station::class);
    }

    /**
     * @param $id
     * @param $page
     * @param $lmt
     * @return Paginator
     */
    public function getStation($id, $page, $lmt)
    {
        $qy = $this->createQueryBuilder('s')
            ->innerJoin('s.city', 'c')
            ->addSelect('c')
            ->where('c.id = :id')
            ->setParameter('id', $id)
            ->setFirstResult(($page-1) * $lmt)
            ->setMaxResults($lmt)
            ->orderBy('s.creationDate')
            ;

        return new Paginator($qy, true);
    }

    public function getStationsByPos(array $data)
    {
        $qb = $this->createQueryBuilder('s');

        $qy = $qb
                   ->leftJoin('s.posGps', 'p')
                   ->where($qb->expr()->between(
                       'p.lat',
                       ':minLat',
                       ':maxLat')
                   )

                   ->andwhere($qb->expr()->between(
                       'p.long',
                       ':minLong',
                       ':maxLong')
                   )

                   ->setParameters([
                       'maxLat'  => $data[0],
                       'minLat'  => $data[1],
                       'maxLong' => $data[2],
                       'minLong' => $data[3]
                   ])
        ;

        $result = $qy->getQuery()->getArrayResult();

        return $result;
    }
}
