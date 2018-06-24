<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 24/06/2018
 * Time: 15:41
 */

namespace App\UI\Responder\Api;

use App\UI\Responder\Api\Interfaces\GETStationsByPosResponderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class GETStationsByPosResponder implements GETStationsByPosResponderInterface
{
    public function __invoke($dataSerialize)
    {
        $response = new JsonResponse($dataSerialize, 302);
        return $response;
    }
}
