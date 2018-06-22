<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 21/06/2018
 * Time: 12:09
 */

namespace App\UI\Action\Api;

use App\Infra\Doctrine\Repository\CityRepository;
use App\UI\Action\Api\Interfaces\GETCityActionInterface;
use App\UI\Responder\Api\Interfaces\GETCityResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class GETCityAction
 * @package App\UI\Action\Api
 * @Route(
 *         path="/Api/cities-page-{number}",
 *         name="api_city",
 *         requirements={"number": "\d+"},
 *         methods={"GET"}
 *     )
 *
 */
class GETCityAction implements GETCityActionInterface
{
    /**
     * @var GETCityResponderInterface
     */
     private $cityResponder;

    /**
     * @var SerializerInterface
     */
     private $serializer;

    /**
     * @var CityRepository
     */
     private $cityRepository;

    /**
     * @var integer
     */
     private $lmt;

    /**
     * GETCityAction constructor.
     * @param GETCityResponderInterface $cityResponder
     * @param SerializerInterface       $serializer
     * @param CityRepository            $cityRepository
     */
    public function __construct(
        GETCityResponderInterface $cityResponder,
        SerializerInterface       $serializer,
        CityRepository            $cityRepository,
                                  $lmt
    ) {
        $this->cityResponder  = $cityResponder;
        $this->serializer     = $serializer;
        $this->cityRepository = $cityRepository;
        $this->lmt            = $lmt;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request)
     {
        $responder = $this->cityResponder;

         $page = $request->attributes->getInt('number');


        $data = $this->cityRepository->getCityByPage($page, $this->lmt);

        $nbPages = ceil(count($data) / $this->lmt);

        $toSerialize = [$data->getQuery()->getArrayResult(), $nbPages];

        $dataSerialize = $this->serializer->serialize(
            $toSerialize ,
            'json'
        );

        return $responder($dataSerialize);
     }
}
