<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 24/06/2018
 * Time: 22:58
 */

namespace App\UI\RequestHandler\Interfaces;


interface POSTDropBikeRequestHandlerInterface
{
    /**
     * @param $data
     * @return bool
     */
    public function handle($data): bool;
}
