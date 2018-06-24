<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 24/06/2018
 * Time: 11:40
 */

namespace App\UI\Action\Api;


use App\Infra\Doctrine\Repository\CityRepository;
use App\UI\Action\Api\Interfaces\GETAllInfoActionInterface;
use App\UI\Responder\Api\Interfaces\GETAllInfoResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class GETAllInfoAction
 * @package App\UI\Action\Api
 * @Route(
 *     path="/Api/AllInfo",
 *     name="api_allinfo",
 *     methods={"GET"}
 * )
 */
class GETAllInfoAction implements GETAllInfoActionInterface
{
    /**
     * @var GETAllInfoResponderInterface
     */
     private $allInfoResponder;

    /**
     * @var CityRepository
     */
     private $cityRepository;

    /**
     * @var SerializerInterface
     */
     private $serializer;

    /**
     * GETAllInfoAction constructor.
     * @param GETAllInfoResponderInterface $allInfoResponder
     * @param CityRepository               $cityRepository
     * @param SerializerInterface          $serializer
     */
    public function __construct(
        GETAllInfoResponderInterface $allInfoResponder,
        CityRepository               $cityRepository,
        SerializerInterface          $serializer
    ) {
        $this->allInfoResponder = $allInfoResponder;
        $this->cityRepository   = $cityRepository;
        $this->serializer       = $serializer;
    }

    public function __invoke()
    {
        $data = $this->cityRepository->getAllInfo();
        $dataSerialized = $this->serializer->serialize($data, 'json');
        $responder = $this->allInfoResponder;
        return $responder($dataSerialized);
    }
}
