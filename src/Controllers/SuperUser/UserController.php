<?php

namespace App\Controllers\SuperUser;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\Controller;
use App\Models\Users;

class UserController extends Controller
{
    /*
     * Index View
     */
    public function index($request, $response)
    {
        $view = 'SuperUser/Users/index.twig';
        $users = Users::where('is_invisible', 0)->orderByDesc('id')->get();

        return $this->container->get('view')->render($response, $view, ['users' => $users]);
    }
}