<?php

namespace App\Controllers\User;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Controllers\Controller;
use App\Models\Users;
use App\Models\Donations;

class UserController extends Controller
{
    /*
     * Index View
     */
    public function index($request, $response)
    {
        $view = 'Users\profile.twig';
        if (isset($_SESSION['user'])) {
            $user = Users::where('id', $_SESSION['user']['id'])->first();
            $donations = Donations::select("donations.*", "organizations.name")
                                    ->leftJoin('organizations', 'organizations.id', '=', 'donations.recipient_organization_id')
                                    ->where('sender_user_id', $user->id)->get();
            $donations_total = 0;
            for($j = 0; $j < count($donations); $j++) {
                $donations_total += $donations[$j]->amount;
            }
            return $this->container->get('view')->render($response, $view, ['user' => $user, 'donations' => $donations, 'donations_total' => $donations_total]);
        } else {
            return $this->container->get('view')->render($response, $view);
        }
    }

    public function edit($request, $response)
    {
        $view = 'Users\edit.twig';
        if (isset($_SESSION['user'])) {
            $user = Users::where('id', $_SESSION['user']['id'])->first();
            return $this->container->get('view')->render($response, $view, ['user' => $user]);
        } else {
            return $this->container->get('view')->render($response, $view);
        }
    }

    /*
     * Update Endpoint
     */
    public function update($request, $response)
    {
        $directory = $this->container->get('settings')['upload_directory']['users'] . $_SESSION['user']['id'] . "/";
        $uploadedFiles = $request->getUploadedFiles();
        //$files = ['profile_img_url'];

        $files = ['profile_img_url' => ""];
        $keys = array_keys($files);

        for($i = 0; $i < count($keys); $i++) {
            $key = $keys[$i];
            $uploadedFile = $uploadedFiles[$key];
            if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
                $filename = $this->moveUploadedFile($directory, $uploadedFile);
                $files[$key] = $filename;
            }
        }

        $form_data = $request->getParsedBody();
        $fname = $form_data['fname'];
        $lname = $form_data['lname'];
        $email = $form_data['email'];

        $user = Users::where('id', $_SESSION['user']['id'])->first();
        if (isset($user->id)) {

            $user->fname = $fname;
            $user->lname = $lname;
            $user->email = $email;

            if (isset($files["profile_img_url"]) && ! empty($files["profile_img_url"])) {
                if ($user->profile_img_url != null) {
                    try{
                        if (file_exists($directory . $user->profile_img_url)) unlink($directory . $user->profile_img_url);
                    } catch(exception $e) {
    
                    }
                }    
                $user->profile_img_url = $files["profile_img_url"];
            }

            $user->save();
        }


        $this->container->get('flash')->addMessage('success', 'Successfully updated profile!');
        return $response->withStatus(302)->withHeader('Location', "/user/profile");
    }

    function moveUploadedFile($directory, $uploadedFile)
    {
        $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
        $basename = bin2hex(random_bytes(8));
        $filename = sprintf('%s.%0.8s', $basename, $extension);
        $uploadedFile->moveTo($directory . $filename);
        return $filename;
    }
}