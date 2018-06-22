<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 22/06/2018
 * Time: 17:57
 */

namespace App\UI\Action\Api\Interfaces;

use Symfony\Component\HttpFoundation\Request;

interface GETStationActionInterface
{
    public function __invoke(Request $request);
}
