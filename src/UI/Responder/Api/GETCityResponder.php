<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 22/06/2018
 * Time: 10:56
 */

namespace App\UI\Responder\Api;

use App\UI\Responder\Api\Interfaces\GETCityResponderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class GETCityResponder implements GETCityResponderInterface
{
      public function __invoke($dataSerialize)
      {
          $response = new JsonResponse($dataSerialize, 302);

          return $response;
      }
}
