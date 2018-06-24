<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 24/06/2018
 * Time: 18:31
 */

namespace App\UI\Action\Api;

use App\UI\Action\Api\Interfaces\POSTTakeBikeActionInterface;
use App\UI\RequestHandler\Interfaces\POSTTakeBikeRequestHandlerInterface;
use App\UI\Responder\Api\Interfaces\POSTTakeBikeResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class POSTTakeBikeAction
 * @package App\UI\Action\Api
 * @Route(
 *     path="/Api/bike/{id}/take",
 *     name="api_take_bike",
 *     methods={"GET","POST"}
 * )
 */
class POSTTakeBikeAction implements POSTTakeBikeActionInterface
{
    /**
     * @var POSTTakeBikeRequestHandlerInterface
     */
    private $takeBikeRequestHandler;

    /**
     * @var POSTTakeBikeResponderInterface
     */
    private $takeBikeResponder;

    /**
     * POSTTakeBikeAction constructor.
     * @param POSTTakeBikeRequestHandlerInterface $takeBikeRequestHandler
     * @param POSTTakeBikeResponderInterface      $takeBikeResponder
     */
    public function __construct(
        POSTTakeBikeRequestHandlerInterface $takeBikeRequestHandler,
        POSTTakeBikeResponderInterface      $takeBikeResponder
    ) {
        $this->takeBikeRequestHandler = $takeBikeRequestHandler;
        $this->takeBikeResponder      = $takeBikeResponder;
    }


    /**
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request)
    {
        $data = $request->attributes->get('id');
        $responder = $this->takeBikeResponder;

        if ( $this->takeBikeRequestHandler->handle($data)) {
            return $responder(true);
        }

        return $responder(false);
    }
}
