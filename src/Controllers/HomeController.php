<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController extends Controller
{
    /*
     * Index View
     */
    public function index($request, $response)
    {
        $view = '\home.twig';
        return $this->container->get('view')->render($response, $view);
    }

    public function sessiondump($request, $response)
    {
        $response->getBody()->write(json_encode($_SESSION['user']));
        return $response;
    }
}