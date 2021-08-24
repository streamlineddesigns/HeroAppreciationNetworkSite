<?php

namespace App\Controllers\User;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Controllers\Controller;
use App\Models\Users;
use App\Models\UserRoles;
use App\Models\OrganizationSignUpTokens;

class RegisterController extends Controller
{
    /*
     * Index View
     */
    public function index($request, $response)
    {
        $view = 'Users\register.twig';
        return $this->container->get('view')->render($response, $view);
    }

    /*
     * Create Endpoint
     */
    public function store($request, $response)
    {        
        $form_data = $request->getParsedBody();
        $fname = $form_data['fname'];
        $lname = $form_data['lname'];
        $email = $form_data['email'];
        $password = $form_data['password'];
        $confirm_password = $form_data['confirm_password'];

        $passwords_match = ($password == $confirm_password) ? true : false;

        //password inputs match
        if ($passwords_match) {

            $email_in_use = Users::where('email', $email)->first();

            //email isn't being used
            if (! $email_in_use) {
                $user = Users::create([
                    "fname" => $fname,
                    "lname" => $lname,
                    "email" => $email,
                    "password" => hash("sha256", $password),
                ]);

                $user_role = UserRoles::create([
                    "user_id" => $user->id,
                    "role_id" => 1,//USER
                ]);

                //user created
                if ($user->id != null) {
                    $this->container->get('flash')->addMessage('success', 'Successfully created account!');

                    return $response->withStatus(302)->withHeader('Location', '/user/login');

                //USER NOT CREATED
                } else {
                    $this->container->get('flash')->addMessage('error', "User could not be created... Try again?");
                }
            
            //EMAIL BEING USED
            } else {
                $this->container->get('flash')->addMessage('error', 'Email all ready in use... Try again?');
            }

        //PASSWORD DONT MATCH
        } else {
            $this->container->get('flash')->addMessage('error', "Passwords did not match... Try again?");
        }

        return $response->withStatus(302)->withHeader('Location', '/user/register');
    }
}