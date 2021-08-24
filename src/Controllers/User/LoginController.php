<?php

namespace App\Controllers\User;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Controllers\Controller;
use App\Models\Users;


class LoginController extends Controller
{
    /*
     * Index View
     */
    public function index($request, $response)
    {
        if ($this->container->get('auth')->hasUserPrivileges()) {
            return $response->withStatus(302)->withHeader('Location', '/user/profile');
        }
        $view = 'Users\login.twig';
        return $this->container->get('view')->render($response, $view);
    }

    /*
     * Login Endpoint - checks credentials
     */
    public function login($request, $response)
    {
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
        /*$response->getBody()->write(json_encode($user));
        return $response;*/
    }

    public function logout($request, $response)
	{
		unset($_SESSION['user']);
        $this->container->get('flash')->addMessage('success', 'Successfully logged out!');
        return $response->withStatus(302)->withHeader('Location', '/user/login');
	}
}