<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 24/06/2018
 * Time: 22:53
 */

namespace App\UI\Responder\Api\Interfaces;

interface POSTDropBikeResponderInterface
{
    /**
     * @param bool $redirect
     * @return mixed
     */
    public function __invoke(bool $redirect);
}
