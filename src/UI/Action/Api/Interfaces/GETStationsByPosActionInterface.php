<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 24/06/2018
 * Time: 15:37
 */

namespace App\UI\Action\Api\Interfaces;

use Symfony\Component\HttpFoundation\Request;

/**
 * Interface GETStationsByPosActionInterface
 * @package App\UI\Action\Api\Interfaces
 */
interface GETStationsByPosActionInterface
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function __invoke(Request $request);
}
