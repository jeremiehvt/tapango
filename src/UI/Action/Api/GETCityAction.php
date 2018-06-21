<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 21/06/2018
 * Time: 12:09
 */

namespace App\UI\Action\Api;

use App\UI\Action\Api\Interfaces\GETCityActionInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class GETCityAction
 * @package App\UI\Action\Api
 * @Route(
 *         "/Api/villes,
 *         name="api_city",
 *         methods={"GET"}
 *     )
 *
 */
class GETCityAction implements GETCityActionInterface
{
     public function __invoke()
     {

     }
}