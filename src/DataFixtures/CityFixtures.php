<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 21/06/2018
 * Time: 14:14
 */

namespace App\DataFixtures;

use App\Domain\Models\Bike;
use App\Domain\Models\City;
use App\Domain\Models\PosGps;
use App\Domain\Models\Station;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class CityFixtures
 * @package App\DataFixtures
 */
class CityFixtures extends Fixture
{

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $arrayOfStation = [];
        $arrayOfBikes = [];

        for ($i = 0 ; $i < 80; $i++) {

            $bike = new Bike();
            $bike->setAvailable(true);

            $arrayOfBikes[] = $bike;

            $posGps = new PosGps();
            $posGps->setLong(floatval(' -1.' . mt_rand(531789, 543752)))
                   ->setLat(floatval('47.'. mt_rand(162918, 260402)))
                ;

            $station = new Station();
            $station->setName('one station')
                ->setPosGps($posGps)
                ->setStatus(true)
                ->setBikesCapacity(100)
                ->setAddress('1 rue de la commune')
                ->setBikesAvailable(100)
            ;

            foreach ($arrayOfBikes as $value) {
                $station->addBikes($value);
            }


            $arrayOfStation[] = $station;
        }

        $posGpsCity = new PosGps();
        $posGpsCity->setLat(floatval('47.218371'))
            ->setLong(floatval('-1.553621'))
            ;

        $city = new City();
        $city->setName('Nantes')
            ->setPosGps($posGpsCity)
            ->setStatus(true)
            ;

        foreach ($arrayOfStation as $value) {
            $city->addStations($value);
        }

        $manager->persist($city);
        $manager->flush();
    }
}
