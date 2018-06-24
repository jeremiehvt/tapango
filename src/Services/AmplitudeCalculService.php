<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 24/06/2018
 * Time: 15:51
 */

namespace App\Services;

use App\Services\Interfaces\AmplitudeCalculServiceInterface;

class AmplitudeCalculService implements AmplitudeCalculServiceInterface
{
    /**
     * @param float $latitude
     * @param float $longitude
     * @param int   $radius
     * @return array
     */
    public function CalculateAmplitude (
        float $latitude,
        float $longitude,
        int   $radius
    ) {
        // 1° de latitude = 111,11 Km, on fait donc un produit en croix
        $offSetLat = $radius / 111.110;

        // 1° de longitude à 'latitude' degrés de latitude correspond à
        // OneLongitudeDegree mètres. On passe à la méthode Math.Cos
        // des radians
        $OneLongitudeDegree = 111.110 * cos($latitude * pi() / 180);

        // Produit en croix pour trouver le nombre de degrés de longitude auquel
        // correspond la longueur de notre rayon
        $offSetLong = $radius / $OneLongitudeDegree;

        $maxLatitude = $latitude + $offSetLat;
        $minLatitude = $latitude - $offSetLat;
        $maxLongitude = $longitude + $offSetLong;
        $minLongitude = $longitude - $offSetLong;

        return $arrayResult = [$maxLatitude, $minLatitude, $maxLongitude, $minLongitude];
    }
}
