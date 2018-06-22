<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 22/06/2018
 * Time: 17:58
 */

namespace App\UI\Action\Api;

use App\Infra\Doctrine\Repository\StationRepository;
use App\UI\Action\Api\Interfaces\GETStationActionInterface;
use App\UI\Responder\Api\Interfaces\GETStationResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class GETStationAction
 * @package App\UI\Action\Api
 * @Route(
 *     path="/Api/stations/{id}/page-{number}",
 *     name="api_stations",
 *     requirements={"number": "\d+"},
 *     methods={"GET"}
 * )
 */
class GETStationAction implements GETStationActionInterface
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var StationRepository
     */
    private $stationRepository;

    /**
     * @var GETStationResponderInterface
     */
    private $stationResponder;

    /**
     * @var integer
     */
    private $lmt;

    /**
     * GETStationAction constructor.
     * @param SerializerInterface          $serializer
     * @param StationRepository            $stationRepository
     * @param GETStationResponderInterface $stationResponder
     * @param                              $lmt
     */
    public function __construct(
        SerializerInterface          $serializer,
        StationRepository            $stationRepository,
        GETStationResponderInterface $stationResponder,
                                     $lmt
    ) {
        $this->serializer        = $serializer;
        $this->stationRepository = $stationRepository;
        $this->stationResponder  = $stationResponder;
        $this->lmt               = $lmt;
    }

    /**
     * @param Request $request
     */
    public function __invoke(Request $request)
    {
        $page = $request->attributes->getInt('number');

        $id = $request->attributes->get('id');

        $data = $this->stationRepository->getStation($id , $page,  $this->lmt);

        $nbPages = ceil(count($data)/$this->lmt);

        $arrayToSerialize = [$data->getQuery()->getArrayResult() , $nbPages];

        $dataSerialize = $this->serializer->serialize($arrayToSerialize, 'json');

        $responder = $this->stationResponder;

        return $responder($dataSerialize);
    }
}
