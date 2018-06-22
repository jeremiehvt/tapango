<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 21/06/2018
 * Time: 12:10
 */

namespace App\UI\Action\Api\Interfaces;


use Symfony\Component\HttpFoundation\Request;

interface GETCityActionInterface
{
    public function __invoke(Request $request);
}