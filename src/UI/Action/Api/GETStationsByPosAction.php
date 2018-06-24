<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 24/06/2018
 * Time: 15:37
 */

namespace App\UI\Action\Api;

use App\Infra\Doctrine\Repository\StationRepository;
use App\Services\Interfaces\AmplitudeCalculServiceInterface;
use App\UI\Action\Api\Interfaces\GETStationsByPosActionInterface;
use App\UI\Responder\Api\Interfaces\GETStationsByPosResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class GETStationsByPosAction
 * @package App\UI\Action\Api
 * @Route(path="/Api/stations/near/lat:{lat}-long:{long}",
 *     name="api_stations_by_pos",
 *     methods={"GET"}
 *     )
 */
class GETStationsByPosAction implements GETStationsByPosActionInterface
{
    /**
     * @var StationRepository
     */
    private $stationRepository;

    /**
     * @var GETStationsByPosResponderInterface
     */
    private $responderStationByPos;

    /**
     * @var AmplitudeCalculServiceInterface
     */
    private $amplitudeCalculService;

    /**
     * @var SerializerInterface
     */
    private $serilizer;

    /**
     * @var
     */
    private $radius;

    /**
     * GETStationsByPosAction constructor.
     * @param StationRepository                  $stationRepository
     * @param GETStationsByPosResponderInterface $responderStationByPos
     * @param AmplitudeCalculServiceInterface    $amplitudeCalculService
     * @param SerializerInterface                $serializer
     * @param                                    $radius
     */
    public function __construct(
        StationRepository                  $stationRepository,
        GETStationsByPosResponderInterface $responderStationByPos,
        AmplitudeCalculServiceInterface    $amplitudeCalculService,
        SerializerInterface                $serializer,
                                           $radius
    ) {
        $this->stationRepository      = $stationRepository;
        $this->responderStationByPos  = $responderStationByPos;
        $this->amplitudeCalculService = $amplitudeCalculService;
        $this->serilizer              = $serializer;
        $this->radius                 = $radius;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $long = $request->attributes->get('long');
        $lat  = $request->attributes->get('lat');

        $result = $this->amplitudeCalculService->CalculateAmplitude(
            (float)$lat,
            (float)$long,
            (int)$this->radius
        );

        $data = $this->stationRepository->getStationsByPos($result);

        $dataSerialize = $this->serilizer->serialize($data, 'json');

        $responder = $this->responderStationByPos;
        return $responder($dataSerialize);
    }
}
