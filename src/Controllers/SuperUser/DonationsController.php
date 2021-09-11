<?php

namespace App\Controllers\SuperUser;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\Controller;
use App\Models\Donations;

class DonationsController extends Controller
{
    /*
     * Index View
     */
    public function index($request, $response)
    {
        $view = 'SuperUser/Donations/index.twig';
        $donations = Donations::select("donations.*", "users.id as user_id", "users.fname as fname", "users.lname as lname", "users.profile_img_url as profile_img_url", "organizations.name as org_name", "organizations.id as org_id")
                                ->leftJoin('users', 'users.id', '=', 'donations.sender_user_id')
                                ->leftJoin('organizations', 'organizations.id', '=', 'donations.recipient_organization_id')
                                ->orderBy('donations.id', 'DESC')->get();

        return $this->container->get('view')->render($response, $view, ['donations' => $donations]);
    }
}