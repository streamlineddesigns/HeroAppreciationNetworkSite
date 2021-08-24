<?php

namespace App\Controllers\User;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Controllers\Controller;
use App\Models\Users;
use App\Models\UserRoles;
use App\Models\OrganizationUsers;
use App\Models\OrganizationSignUpTokens;

class AdminLoginController extends Controller
{
    /*
     * Index View
     */
    public function index($request, $response)
    {
        $view = 'Users\login.twig';
        return $this->container->get('view')->render($response, $view);
    }

    /*
     * Login Endpoint - checks credentials
     */
    public function login($request, $response, $api_token = null)
    {
        if (! $this->verifyApiToken($api_token)) {
            $this->container->get('flash')->addMessage('error', "That sign up link must be expired. Request a new one?");
            return $response->withStatus(302)->withHeader('Location', '/user/login');
        }

        $form_data = $request->getParsedBody();
        $email = $form_data['email'];
        $password = hash("sha256", $form_data['password']);

        $user = Users::select('users.id', 'users.fname', 'users.lname', 'users.email', 'users.profile_img_url', 'roles.type as role_type', 'organization_users.organization_id as org_id')
                       ->leftJoin('user_roles', 'user_roles.user_id', '=', 'users.id')
                       ->leftJoin('roles', 'roles.id', '=', 'user_roles.role_id')
                       ->leftJoin('organization_users', 'organization_users.user_id', '=', 'users.id')
                       ->where('email', $email)->where('password', $password)->first();

        if ($user) {
            $user = $user->toArray();
        }

        if (isset($user["email"])) {

            //create link between admin & organization
            $OrganizationSignUpToken = OrganizationSignUpTokens::where("remember_token", $api_token)->first();

            $organization_id = $OrganizationSignUpToken->organization_id;
            $user_id = $user["id"];

            $organization_user = OrganizationUsers::create([
                "organization_id" => $organization_id,
                "user_id" => $user_id,
            ]);

            if ($OrganizationSignUpToken != null) {
                $OrganizationSignUpToken->delete();
            }

            //save user role
            $user_role = UserRoles::where('user_id', $user['id'])->first();
            $user_role->role_id = 2;//ADMIN
            $user_role->save();

            //refresh user data
            $user = Users::select('users.id', 'users.fname', 'users.lname', 'users.email', 'users.profile_img_url', 'roles.type as role_type', 'organization_users.organization_id as org_id')
                       ->leftJoin('user_roles', 'user_roles.user_id', '=', 'users.id')
                       ->leftJoin('roles', 'roles.id', '=', 'user_roles.role_id')
                       ->leftJoin('organization_users', 'organization_users.user_id', '=', 'users.id')
                       ->where('email', $email)->where('password', $password)->first();

            if ($user) {
                $user = $user->toArray();
            }

            $_SESSION['user']['user_privileges'] = true;
            $_SESSION['user']['admin_privileges'] = ($user["role_type"] == "admin" || $user["role_type"] == "superuser") ? true : false;
            $_SESSION['user']['superuser_privileges'] = ($user["role_type"] == "superuser") ? true : false;
            
            //move all user data into session data
            $keys = array_keys($user);
            for ($i = 0; $i < count($keys); $i++) {
                $index = $keys[$i];
                $_SESSION['user'][$index] = $user[$index];
            }

            $this->container->get('flash')->addMessage('success', 'Successfully logged in!');
            return $response->withStatus(302)->withHeader('Location', '/user/profile');
        } else {
            $this->container->get('flash')->addMessage('error', 'Could not be authenticated... Try again?');
        }
        
        return $response->withStatus(302)->withHeader('Location', '/user/login');
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