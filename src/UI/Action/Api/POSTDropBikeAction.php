<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 24/06/2018
 * Time: 22:53
 */

namespace App\UI\Action\Api;

use App\UI\Action\Api\Interfaces\POSTDropBikeActionInterfaces;
use App\UI\RequestHandler\Interfaces\POSTDropBikeRequestHandlerInterface;
use App\UI\Responder\Api\Interfaces\POSTDropBikeResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class POSTDropBikeAction
 * @package App\UI\Action\Api
 * @Route(
 *     path="/Api/bike/{id}/drop",
 *     name="api_drop_bike",
 *     methods={"GET","POST"}
 * )
 */
class POSTDropBikeAction implements POSTDropBikeActionInterfaces
{
    /**
     * @var POSTDropBikeResponderInterface
     */
    private $dropBikeResponder;

    /**
     * @var POSTDropBikeRequestHandlerInterface
     */
    private $dropBikeRequestHandler;

    /**
     * POSTDropBikeAction constructor.
     * @param POSTDropBikeResponderInterface      $dropBikeResponder
     * @param POSTDropBikeRequestHandlerInterface $dropBikeRequestHandler
     */
    public function __construct(
        POSTDropBikeResponderInterface      $dropBikeResponder,
        POSTDropBikeRequestHandlerInterface $dropBikeRequestHandler
    ) {
        $this->dropBikeResponder      = $dropBikeResponder;
        $this->dropBikeRequestHandler = $dropBikeRequestHandler;
    }

    public function __invoke(Request $request)
    {
        $data = $request->attributes->get('id');
        $responder = $this->dropBikeResponder;

        if ($this->dropBikeRequestHandler->handle($data)) {
            return $responder(true);
        }

        return $responder(false);
    }
}