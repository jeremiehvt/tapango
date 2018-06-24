<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 24/06/2018
 * Time: 22:59
 */

namespace App\UI\RequestHandler;


use App\Infra\Doctrine\Repository\BikeRepository;
use App\UI\RequestHandler\Interfaces\POSTDropBikeRequestHandlerInterface;

class POSTDropBikeResuestHander implements POSTDropBikeRequestHandlerInterface
{
    /**
     * @var BikeRepository
     */
    private $bikeRepository;

    /**
     * POSTDropBikeResuestHander constructor.
     * @param BikeRepository $bikeRepository
     */
    public function __construct(BikeRepository $bikeRepository)
    {
        $this->bikeRepository = $bikeRepository;
    }

    /**
     * @param bool $data
     * @return bool
     */
    public function handle($data): bool
    {
        $bike = $this->bikeRepository->findOneBy(['id' => $data]);

        $bike->setDropAt()
            ->setAvailable(true)
        ;

        $bike->getStation()->setBikesAvailable(1);

        $this->bikeRepository->update();

        return true;
    }
}
