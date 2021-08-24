<?php

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Routing\RouteContext;
use App\Models\OrganizationSignUpTokens;
use Slim\Psr7\Response;


class APITokenMiddleware extends Middleware
{

	public function __invoke(Request $request, RequestHandler $handler): Response
	{
		$response = $handler->handle($request);

		//get api token
		$routeContext = RouteContext::fromRequest($request);
        $route = $routeContext->getRoute();
		$api_token = $route->getArgument('api_token');

		//verify api token
		if (! $this->verifyApiToken($api_token)) {
			return $response->withStatus(302)->withHeader('Location', '/user/login');
		}

        return $response;
	}


	protected function verifyApiToken($api_token)
    {
        if ($api_token != null) {
            $token = OrganizationSignUpTokens::where('remember_token', $api_token)->first();

            if ($token != null && isset($token->toArray()['id'])) {
                return true;
            }
        }

        $this->container->get('flash')->addMessage('error', "That sign up link must be expired. Request a new one?");
        return false;
    }
}