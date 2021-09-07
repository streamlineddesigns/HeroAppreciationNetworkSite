<?php

namespace App\Controllers\User;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Controllers\Controller;
use App\Models\Users;
use App\Models\UserRoles;
use App\Models\OrganizationUsers;
use App\Models\OrganizationSignUpTokens;

class AdminRegisterController extends Controller
{
    /*
     * Index View
     */
    public function index($request, $response, $api_token = null)
    {
        $view = 'Users\register.twig';
        return $this->container->get('view')->render($response, $view, ['api_token' => $api_token]);
    }

    /*
     * Create Endpoint
     */
    public function store($request, $response, $api_token = null)
    {
        if (! $this->verifyApiToken($api_token)) {
            $this->container->get('flash')->addMessage('error', "That sign up link must be expired. Request a new one?");
            return $response->withStatus(302)->withHeader('Location', '/user/login');
        }
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
                    "is_invisible" => true,
                ]);

                $user_role = UserRoles::create([
                    "user_id" => $user->id,
                    "role_id" => 2,//ADMIN
                ]);


                //user created
                if ($user->id != null) {


                    $OrganizationSignUpToken = OrganizationSignUpTokens::where("remember_token", $api_token)->first();

                    $organization_id = $OrganizationSignUpToken->organization_id;
                    $user_id = $user->id;

                    $organization_user = OrganizationUsers::create([
                        "organization_id" => $organization_id,
                        "user_id" => $user_id,
                    ]);

                    if ($OrganizationSignUpToken != null) {
                        $OrganizationSignUpToken->delete();
                    }

                    
                    //make user directory
                    $directory = $this->container->get('settings')['upload_directory']['users'] . $user->id;
                    if (! is_dir($directory)) {
                        mkdir($directory);
                    }

                    $this->container->get('flash')->addMessage('success', 'Successfully created admin account!');
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

        return $response->withStatus(302)->withHeader('Location', "/user/register/$api_token");
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