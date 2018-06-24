<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 24/06/2018
 * Time: 15:50
 */

namespace App\Services\Interfaces;

/**
 * Interface AmplitudeCalculServiceInterface
 * @package App\Services\Intefces
 */
interface AmplitudeCalculServiceInterface
{
    /**
     * @param float $latitude
     * @param float $longitude
     * @param int   $radius
     *
     * @return mixed
     */
    public function CalculateAmplitude (
        float $latitude,
        float $longitude,
        int   $radius
    );
}
