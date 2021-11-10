<?php

namespace App\Controllers\SuperUser;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\Controller;
use App\Models\Organizations;
use App\Models\OrganizationSignUpTokens;

class TokenController extends Controller
{
    /*
     * Index View
     */
    public function index($request, $response)
    {
        $view = 'Organizations/Tokens/index.twig';
        $tokens = OrganizationSignUpTokens::select("organization_sign_up_tokens.id", "organization_sign_up_tokens.remember_token", "organizations.name")
                                            ->leftJoin('organizations', 'organization_sign_up_tokens.organization_id', '=', 'organizations.id')
                                            ->orderByDesc('id')->get();
        return $this->container->get('view')->render($response, $view, ['tokens' => $tokens]);
    }

    /*
     * Create View
     */
    public function create($request, $response)
    {
        $view = 'Organizations/Tokens/create.twig';
        return $this->container->get('view')->render($response, $view);
    }

    /*
     * Create Endpoint
     */
    public function store($request, $response)
    {
        $form_data = $request->getParsedBody();

        $Organization = Organizations::create([
            "name" => $form_data['org_name'],
            "email" => $form_data['email'],
            "is_invisible" => 1,
        ]);

        $directory = $this->container->get('settings')['upload_directory']['organizations'] . $Organization->id . "/";
        if (! is_dir($directory)) {
            mkdir($directory);
        }

        $OrganizationSignUpToken = OrganizationSignUpTokens::create([
            "remember_token" => bin2hex(random_bytes(8)),
            "organization_id" => $Organization->id,
        ]);

        if ($OrganizationSignUpToken->id != null) {
            $this->container->get('flash')->addMessage('success', 'Successfully created token!');
        } else {
            $this->container->get('flash')->addMessage('error', 'Failed to create token... Try again?');
        }

        return $response->withStatus(302)->withHeader('Location', '/superuser/organizations/tokens');
    }
}