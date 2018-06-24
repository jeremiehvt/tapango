<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 24/06/2018
 * Time: 11:42
 */

namespace App\UI\Responder\Api\Interfaces;

/**
 * Interface GETAllInfoResponderInterface
 * @package App\UI\Responder\Api\Interfaces
 */
interface GETAllInfoResponderInterface
{
    /**
     * @param $dataSerialized
     * @return mixed
     */
    public function __invoke($dataSerialized);
}
