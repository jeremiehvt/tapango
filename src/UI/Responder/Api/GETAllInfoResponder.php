<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 24/06/2018
 * Time: 11:41
 */

namespace App\UI\Responder\Api;

use App\UI\Responder\Api\Interfaces\GETAllInfoResponderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class GETAllInfoResponder
 * @package App\UI\Responder\Api
 */
class GETAllInfoResponder implements GETAllInfoResponderInterface
{
    /**
     * @param $dataSerialized
     * @return JsonResponse
     */
    public function __invoke($dataSerialized)
    {

        $response = new JsonResponse($dataSerialized , 302);
        return $response;
    }
}
