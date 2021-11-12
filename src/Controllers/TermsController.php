<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class TermsController extends Controller
{
    /*
     * Index View
     */
    public function index($request, $response)
    {
        $view = 'terms.twig';
        return $this->container->get('view')->render($response, $view);
    }
}