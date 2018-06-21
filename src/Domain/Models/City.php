<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 20/06/2018
 * Time: 21:05
 */

namespace App\Domain\Models;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class City
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
     * @var boolean
     */
    private $status;

    /**
     * @var ArrayCollection
     */
    private $stations;

    public function __construct()
    {
        $this->stations = new ArrayCollection();
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
     * @param string $name
     * @return $this
     */
    public function setName($name): self
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
     * @param string $posGps
     * @return $this
     */
    public function setPosGps($posGps):self
    {
        $this->posGps = $posGps;

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
     * @param bool $status
     * @return $this
     */
    public function setStatus($status):self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection|Station[]
     */
    public function getStations(): Collection
    {
        return $this->stations;
    }

    /**
     * @param Station $station
     * @return City
     */
    public function addStations(Station $station): self
    {
        if (!$this->stations->contains($station)) {
            $this->stations[] = $station;
            $station->setCity($this);
        }

        return $this;
    }

    /**
     * @param Station $station
     */
    public function removeStations(Station $station): void
    {
        if ($this->stations->contains($station)) {
            $this->stations->remove($station);

            if ($station->getCity() === $this) {
                $station->setCity(null);
            }
        }
    }
}
