<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 20/06/2018
 * Time: 19:29
 */

namespace App\Domain\Models;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @var PosGps
     */
    private $posGps;

    /**
     * @var string
     */
    private $address;

    /**
     * @var integer
     */
    private $bikesCapacity;

    /**
     * @var integer
     */
    private $bikesAvailable;

    /**
     * @var boolean
     */
    private $status;

    /**
     * @var string
     */
    private $creationDate = "";

    /**
     * @var string
     */
    private $lastUpdate = "";

    /**
     * @var ArrayCollection
     */
    private $bikes;

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
        $this->bikes = new ArrayCollection();
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
     * @return PosGps
     */
    public function getPosGps(): PosGps
    {
        return $this->posGps;
    }

    /**
     * @param PosGps $posGps
     * @return $this
     */
    public function setPosGps(PosGps $posGps):self
    {
        $this->posGps = $posGps;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param $address
     * @return $this
     */
    public function setAddress($address):self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return int
     */
    public function getBikesCapacity(): int
    {
        return $this->bikesCapacity;
    }

    /**
     * @param $bikesCapacity
     * @return $this
     */
    public function setbikesCapacity($bikesCapacity): self
    {
        $this->bikesCapacity = $bikesCapacity;

        return $this;
    }

    /**
     * @return int
     */
    public function getBikesAvailable(): int
    {
        return $this->bikesAvailable;
    }

    /**
     * @param $bikesAvailable
     * @return $this
     */
    public function setBikesAvailable($bikesAvailable): self
    {
        $this->bikesAvailable += $bikesAvailable;

        return $this;
    }

    /**
     * @param bool $status
     * @return $this
     */
    public function setStatus(bool $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return bool
     */
    public function isStatus(): bool
    {
        return $this->status;
    }

    /**
     * @return $this
     */
    public function setCreationDate(): self
    {
        $date = new \DateTime();
        $this->creationDate = $date->format(DATE_ATOM);

        return $this;
    }

    /**
     * @return $this
     */
    public function setUpdateDate(): self
    {
        $this->lastUpdate = "";
        $date = new \DateTime();
        $this->lastUpdate = $date->format(DATE_ATOM);

        return $this;
    }

    /**
     * @return string
     */
    public function getCreationDate(): string
    {
        return $this->creationDate;
    }

    /**
     * @return string
     */
    public function getLastUpdate(): string
    {
        return $this->lastUpdate;
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

    /**
     * @return Collection|Bike[]
     */
    public function getBikes(): Collection
    {
        return $this->bikes;
    }

    /**
     * @param Bike $bike
     * @return Station
     */
    public function addBikes(Bike $bike): self
    {
        if (!$this->bikes->contains($bike)) {
            $this->bikes[] = $bike;
            $bike->setStation($this);
        }

        return $this;
    }

    /**
     * @param Bike $bike
     */
    public function removeBikes(Bike $bike): void
    {
        if ($this->bikes->contains($bike)) {
            $this->bikes->remove($bike);

            if ($bike->getStation() === $this) {
                $bike->setStation(null);
            }
        }
    }
}
