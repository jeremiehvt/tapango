<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 24/06/2018
 * Time: 21:58
 */

namespace App\UI\RequestHandler\Interfaces;

interface POSTTakeBikeRequestHandlerInterface
{
    /**
     * @param $data
     * @return bool
     */
    public function handle($data): bool;
}