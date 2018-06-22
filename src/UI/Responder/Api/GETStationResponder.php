<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 22/06/2018
 * Time: 17:59
 */

namespace App\UI\Responder\Api;

use App\UI\Responder\Api\Interfaces\GETStationResponderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class GETStationResponder
 * @package App\UI\Responder\Api
 */
class GETStationResponder implements GETStationResponderInterface
{
    public function __invoke($dataSerialize)
    {
        $response = new JsonResponse($dataSerialize,302);
        return $response;
    }
}
