<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 24/06/2018
 * Time: 22:54
 */

namespace App\UI\Responder\Api;

use App\UI\Responder\Api\Interfaces\POSTDropBikeResponderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class POSTDropBikeResponder
 * @package App\UI\Responder\Api
 */
class POSTDropBikeResponder implements POSTDropBikeResponderInterface
{
    /**
     * @param bool $redirect
     * @return mixed|JsonResponse
     */
    public function __invoke(bool $redirect)
    {
        $dataSuccess = ['success' => true];
        $dataError = ['error' => false];

        $redirect
            ? $response = new JsonResponse($dataSuccess, 200)
            : $response = new JsonResponse($dataError, 400)
        ;

        return $response;
    }
}
