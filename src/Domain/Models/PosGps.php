<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 21/06/2018
 * Time: 15:51
 */

namespace App\Domain\Models;


use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class PosGps
{
    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var double
     */
    private $lat;

    /**
     * @var double
     */
    private $long;

    /**
     * PosGps constructor.
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
     * @return float
     */
    public function getLat(): float
    {
        return $this->lat;
    }

    /**
     * @param float $lat
     * @return $this
     */
    public function setLat(float $lat): self
    {
        $this->lat = (float)$lat;
        return $this;
    }

    /**
     * @return float
     */
    public function getLong(): float
    {
        return $this->long;
    }

    /**
     * @param float $long
     * @return $this
     */
    public function setLong(float $long): self
    {
        $this->long = (float)$long;
        return $this;
    }
}
