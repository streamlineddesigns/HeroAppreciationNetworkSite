<?php

namespace App\Controllers\SuperUser;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\Controller;
use App\Models\Organizations;

class OrganizationController extends Controller
{
    /*
     * Index View
     */
    public function index($request, $response)
    {
        $view = 'SuperUser/Organizations/index.twig';
        $organizations = Organizations::orderByDesc('id')->get();

        return $this->container->get('view')->render($response, $view, ['organizations' => $organizations]);
    }
}