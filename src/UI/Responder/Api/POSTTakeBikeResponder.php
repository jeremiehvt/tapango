<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 24/06/2018
 * Time: 22:13
 */

namespace App\UI\Responder\Api;

use App\UI\Responder\Api\Interfaces\POSTTakeBikeResponderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class POSTTakeBikeResponder
 * @package App\UI\Responder\Api
 */
class POSTTakeBikeResponder implements POSTTakeBikeResponderInterface
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