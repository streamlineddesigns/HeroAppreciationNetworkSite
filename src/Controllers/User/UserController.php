<?php

namespace App\Controllers\User;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Controllers\Controller;
use App\Models\Users;
use App\Models\UserFollows;
use App\Models\Donations;
use App\Models\SectionIcons;

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

            $id = $_SESSION['user']['id'];

            $following = UserFollows::select("user_follows.*", "users.fname as fname", "users.id as user_id", "users.lname as lname", "users.profile_img_url as profile_img_url",)
                                     ->leftJoin('users', 'users.id', '=', 'user_follows.followed_user_id')
                                     ->where('follower_user_id', $id)
                                     ->orderBy('created_at')->limit(100)->get();

            $followers = UserFollows::select("user_follows.*", "users.fname as fname", "users.id as user_id", "users.lname as lname", "users.profile_img_url as profile_img_url",)
                                     ->leftJoin('users', 'users.id', '=', 'user_follows.follower_user_id')
                                     ->where('followed_user_id', $id)
                                     ->orderBy('created_at')->limit(100)->get();

            $section_icons = $this->getSocialMediaIcons();

            return $this->container->get('view')->render($response, $view, ['user' => $user, 'donations' => $donations, 'donations_total' => $donations_total, 'followers' => $followers, 'following' => $following, 'section_icons' => $section_icons]);
        } else {
            return $this->container->get('view')->render($response, $view);
        }
    }

    public function show($request, $response, $id)
    {
        $view = 'Users\show.twig';
        $user = Users::where('id', $id)->where('is_invisible', 0)->first();
        if (isset($user->id) && ! empty($user->id)) {
            $donations = Donations::select("donations.*", "organizations.name")
                                ->leftJoin('organizations', 'organizations.id', '=', 'donations.recipient_organization_id')
                                ->where('sender_user_id', $user->id)
                                ->where('donations.is_invisible', 0)->get();
            $donations_total = 0;
            for($j = 0; $j < count($donations); $j++) {
                $donations_total += $donations[$j]->amount;
            }

            $following = UserFollows::select("user_follows.*", "users.fname as fname", "users.id as user_id", "users.lname as lname", "users.profile_img_url as profile_img_url",)
                                     ->leftJoin('users', 'users.id', '=', 'user_follows.followed_user_id')
                                     ->where('follower_user_id', $id)
                                     ->orderBy('created_at')->limit(100)->get();

            $followers = UserFollows::select("user_follows.*", "users.fname as fname", "users.id as user_id", "users.lname as lname", "users.profile_img_url as profile_img_url")
                                     ->leftJoin('users', 'users.id', '=', 'user_follows.follower_user_id')
                                     ->where('followed_user_id', $id)
                                     ->orderBy('created_at')->limit(100)->get();

            $my_id = (isset($_SESSION['user']['id'])) ? $_SESSION['user']['id'] : -1;
            $is_me = ($id == $my_id) ? true : false;

            $followed_by_me = false;
            $following_me = false;
            
            if (! $is_me) {
                for($j = 0; $j < count($followers); $j++) {
                    if ($followers[$j]->follower_user_id == $my_id) {
                        $followed_by_me = true;
                    }
                }

                for($k = 0; $k < count($following); $k++) {
                    if ($following[$k]->followed_user_id == $my_id) {
                        $following_me = true;
                    }
                }
            }

            $section_icons = $this->getSocialMediaIcons();

        } else {
            $this->container->get('flash')->addMessage('error', 'No user found!');
            return $this->container->get('view')->render($response, $view, ['user' => $user,]);
        }
        
        return $this->container->get('view')->render($response, $view, ['user' => $user, 'donations' => $donations, 'donations_total' => $donations_total, 'is_me' => $is_me, 'followed_by_me' => $followed_by_me, 'following_me' => $following_me, 'followers' => $followers, 'following' => $following, 'section_icons' => $section_icons]);
    }

    public function edit($request, $response)
    {
        $view = 'Users\edit.twig';
        if (isset($_SESSION['user'])) {
            $user = Users::where('id', $_SESSION['user']['id'])->first();
            $section_icons = $this->getSocialMediaIcons();
            return $this->container->get('view')->render($response, $view, ['user' => $user, 'section_icons' => $section_icons]);
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
        
        $password = (isset($form_data['password'])) ? $form_data['password'] : "";
        $newpassword = (isset($form_data['newpassword'])) ? $form_data['newpassword'] : "";
        $confirmpassword = (isset($form_data['confirmpassword'])) ? $form_data['confirmpassword'] : "";
        if (! empty($password) && ! empty($newpassword)) {
            if ($user->password == hash("sha256", $password)) {
                if ($newpassword == $confirmpassword) {
                    $user->password = hash("sha256", $newpassword);
                    $user->save();
                } else {
                    $this->container->get('flash')->addMessage('error', 'New passwords did not match!');
                    return $response->withStatus(302)->withHeader('Location', "/user/profile/edit");
                }
            } else {
                $this->container->get('flash')->addMessage('error', 'Could not be authenticated!');
                return $response->withStatus(302)->withHeader('Location', "/user/profile/edit");
            }
        }
        
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

    public function search($request, $response, $name) 
    {
        $user = Users::select("users.*")
                                       ->where("is_invisible", 0)
                                       ->where("users.fname",'LIKE','%'.$name.'%')
                                       ->orWhere("users.lname",'LIKE','%'.$name.'%')
                                       ->orderBy("users.fname")
                                       ->limit(5)->get();

                                       

        if (isset($user[0]->id)) {
            $response->getBody()->write(json_encode($user));
        }
        
        return $response;
    }

    protected function getSocialMediaIcons()
    {
        $section_icons = SectionIcons::select("section_icons.*",)
                                ->leftJoin('section_icon_icon_types', 'section_icon_icon_types.section_icon_id', '=', 'section_icons.id')
                                ->leftJoin('section_icon_types', 'section_icon_types.id', '=', 'section_icon_icon_types.section_icon_type_id')
                                ->where('section_icon_types.type', "social")->get();
        return $section_icons;
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