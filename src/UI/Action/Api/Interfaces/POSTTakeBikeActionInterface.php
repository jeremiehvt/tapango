<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 24/06/2018
 * Time: 18:31
 */

namespace App\UI\Action\Api\Interfaces;

use Symfony\Component\HttpFoundation\Request;

interface POSTTakeBikeActionInterface
{
    public function __invoke(Request $request);
}
