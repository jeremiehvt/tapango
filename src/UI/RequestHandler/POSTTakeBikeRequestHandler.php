<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 24/06/2018
 * Time: 21:59
 */

namespace App\UI\RequestHandler;

use App\Infra\Doctrine\Repository\BikeRepository;
use App\UI\RequestHandler\Interfaces\POSTTakeBikeRequestHandlerInterface;

class POSTTakeBikeRequestHandler implements POSTTakeBikeRequestHandlerInterface
{

    /**
     * @var BikeRepository
     */
    private $bikeRepository;

    /**
     * POSTTakeBikeRequestHandler constructor.
     * @param BikeRepository $bikeRepository
     */
    public function __construct(BikeRepository $bikeRepository)
    {
        $this->bikeRepository = $bikeRepository;
    }

    /**
     * @param $data
     * @return bool
     */
    public function handle($data): bool
    {

        $bike = $this->bikeRepository->findOneBy(['id'=>$data]);

        $bike->setTakeAt()
             ->setAvailable(false)
        ;

        $bike->getStation()->setBikesAvailable(-1);

        $this->bikeRepository->update();

        return true;
    }
}
