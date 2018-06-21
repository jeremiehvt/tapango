<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 21/06/2018
 * Time: 14:14
 */

namespace App\DataFixtures;


use App\Domain\Models\City;
use App\Domain\Models\PosGps;
use App\Domain\Models\Station;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CityFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $arrayOfStation = [];
        for ($i = 0 ; $i < 80; $i++) {

            $posGps = new PosGps();
            $posGps->setLong(' -1.' . mt_rand(531789, 543752))
                   ->setLat('47.'. mt_rand(162918, 260402))
                ;

            $station = new Station();
            $station->setName('one station')
                ->setPosGps($posGps)
                ->setStatus(true)
                ->setCapacity(100)
                ->setAdress('1 rue de la commune')
                ->setNberBikes(mt_rand(20, 100))
            ;

            $arrayOfStation[] = $station;
        }

        $posGpsCity = new PosGps();
        $posGpsCity->setLat('47.218371')
            ->setLong('-1.553621')
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
