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
     * @var string
     */
    private $lat;

    /**
     * @var string
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
     * @return string
     */
    public function getLat(): string
    {
        return $this->lat;
    }

    /**
     * @param string $lat
     * @return $this
     */
    public function setLat(string $lat): self
    {
        $this->lat = $lat;
        return $this;
    }

    /**
     * @return string
     */
    public function getLong(): string
    {
        return $this->long;
    }

    /**
     * @param string $long
     * @return $this
     */
    public function setLong(string $long): self
    {
        $this->long = $long;
        return $this;
    }

}
