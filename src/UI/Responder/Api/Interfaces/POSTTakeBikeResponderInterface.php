<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 24/06/2018
 * Time: 22:12
 */

namespace App\UI\Responder\Api\Interfaces;

/**
 * Interface POSTTakeBikeResponderInterface
 * @package App\UI\Responder\Api\Interfaces
 */
interface POSTTakeBikeResponderInterface
{
    /**
     * @param bool $response
     * @return mixed
     */
    public function __invoke(bool $response);
}