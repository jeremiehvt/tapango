<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 20/06/2018
 * Time: 19:29
 */

namespace App\Domain\Models;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class Station
{
    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $posGps;

    /**
     * @var string
     */
    private $adress;

    /**
     * @var integer
     */
    private $capacity;

    /**
     * @var integer
     */
    private $nberBikes;

    /**
     * @var City
     */
    private $city;

    /**
     * Station constructor.
     */
    public function __construct()
    {
        $this->id = Uuid::uuid4();
    }

    /**
     * @return UuidInterface
     */
    public function getId(): UuidInterface
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param $name
     * @return $this
     */
    public function setName($name):self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getPosGps(): string
    {
        return $this->posGps;
    }

    /**
     * @param $posGps
     * @return $this
     */
    public function setPosGps($posGps):self
    {
        $this->posGps = $posGps;

        return $this;
    }

    /**
     * @return string
     */
    public function getAdress(): string
    {
        return $this->adress;
    }

    /**
     * @param $adress
     * @return $this
     */
    public function setAdress($adress):self
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * @return int
     */
    public function getCapacity(): int
    {
        return $this->capacity;
    }

    /**
     * @param $capacity
     * @return $this
     */
    public function setCapacity($capacity): self
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * @return int
     */
    public function getNberBikes(): int
    {
        return $this->nberBikes;
    }

    /**
     * @param $nberBikes
     * @return $this
     */
    public function setNberBikes($nberBikes): self
    {
        $this->nberBikes = $nberBikes;

        return $this;
    }

    /**
     * @param City $city
     * @return $this
     */
    public function setCity(City $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return City
     */
    public function getCity(): City
    {
        return $this->city;
    }
}
