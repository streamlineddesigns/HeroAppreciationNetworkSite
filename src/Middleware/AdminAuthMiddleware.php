<?php

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;


class AdminAuthMiddleware extends Middleware
{

	public function __invoke(Request $request, RequestHandler $handler): Response
	{
        $response = $handler->handle($request);
        
		if(! $this->container->get('auth')->hasAdminPrivileges()) {

            $this->container->get('flash')->addMessage('error', 'Authentication error');
			return $response->withStatus(302)->withHeader('Location', '/user/login');

		}

		return $response;
	}
}