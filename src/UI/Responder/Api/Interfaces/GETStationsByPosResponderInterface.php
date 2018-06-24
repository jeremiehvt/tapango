<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 24/06/2018
 * Time: 15:40
 */

namespace App\UI\Responder\Api\Interfaces;

interface GETStationsByPosResponderInterface
{
    public function __invoke($dataSerialize);
}
