<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 22/06/2018
 * Time: 10:52
 */

namespace App\UI\Responder\Api\Interfaces;

interface GETCityResponderInterface
{
    public function __invoke($dataSerialize);
}
