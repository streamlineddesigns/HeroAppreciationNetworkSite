<?php

namespace App\Controllers\User;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /*
     * Index View
     */
    public function index($request, $response)
    {
        $view = 'Users\profile.twig';
        if (isset($_SESSION['user'])) {
            return $this->container->get('view')->render($response, $view, ['user' => $_SESSION['user']]);
        } else {
            return $this->container->get('view')->render($response, $view);
        }
    }
}