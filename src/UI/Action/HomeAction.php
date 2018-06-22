<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 22/06/2018
 * Time: 22:04
 */

namespace App\UI\Action;

use App\UI\Action\Interfaces\HomeActionInterface;
use App\UI\Responder\Interfaces\HomeResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class HomeAction
 * @package App\UI\Action
 * @Route(
 *     path="/",
 *     name="home",
 *     methods={"GET"}
 * )
 */
class HomeAction implements HomeActionInterface
{
    /**
     * @var HomeResponderInterface
     */
    private $homeResponder;

    /**
     * HomeAction constructor.
     * @param HomeResponderInterface $homeResponder
     */
    public function __construct(HomeResponderInterface $homeResponder)
    {
        $this->homeResponder = $homeResponder;
    }

    /**
     * @return mixed
     */
    public function __invoke()
    {
        $responder = $this->homeResponder;

        return $responder();
    }
}
