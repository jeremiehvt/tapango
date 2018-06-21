<?php
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
}
