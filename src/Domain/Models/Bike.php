<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 21/06/2018
 * Time: 18:26
 */

namespace App\Domain\Models;


use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class Bike
{
    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var boolean
     */
    private $available;

    /**
     * @var string
     */
    private $takeAt = "";

    /**
     * @var string
     */
    private $dropAt = "";

    /**
     * @var Station
     */
    private $station;

    public function __construct()
    {
        $this->id = Uuid::uuid4();
    }

    /**
     * @return bool
     */
    public function isAvailable(): bool
    {
        return $this->available;
    }

    /**
     * @param bool $available
     * @return $this
     */
    public function setAvailable(bool $available): self
    {
        $this->available = $available;
        return $this;
    }

    /**
     * @return string
     */
    public function getTakeAt(): string
    {
        return $this->takeAt;
    }

    /**
     * @return $this
     */
    public function setTakeAt(): self
    {
        $this->dropAt = "";
        $date = new \DateTime();
        $this->takeAt = $date->format(DATE_RFC850);

        return $this;
    }

    /**
     * @return string
     */
    public function getDropAt(): string
    {
        return $this->dropAt;
    }

    /**
     * @return $this
     */
    public function setDropAt(): self
    {
        $date = new \DateTime();
        $this->dropAt = $date->format(DATE_RFC850);

        return $this;
    }

    /**
     * @return Station
     */
    public function getStation(): Station
    {
        return $this->station;
    }

    /**
     * @param Station $station
     * @return $this
     */
    public function setStation(Station $station): self
    {
        $this->station = $station;
        return $this;
    }
}
