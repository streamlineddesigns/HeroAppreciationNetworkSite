<?php

namespace App\Controllers\Follow;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Controllers\Controller;
use App\Models\Users;
use App\Models\UserFollows;

class FollowController extends Controller
{
    public function create($request, $response, $id)
    {
        if (isset( $_SESSION['user']['id'])) {
            $my_id =  $_SESSION['user']['id'];
        } else {
            $my_id = null;
            return $response->withStatus(302)->withHeader('Location', "/user/profile/v/$id");
        }

        $following = UserFollows::where('followed_user_id', $id)->where('follower_user_id', $my_id)->get();

        if (isset($following[0]->id) && ! empty($following[0]->id)) {
            $following[0]->delete();
            $this->container->get('flash')->addMessage('success', 'Successfully unfollowed user!');
        } else {
            $following = UserFollows::create([
                "followed_user_id" => $id,
                "follower_user_id" => $my_id,
            ]);

            if (isset($following->id) && ! empty($following->id)) {
                $this->container->get('flash')->addMessage('success', 'Successfully followed user!');
            }
        }
        
        return $response->withStatus(302)->withHeader('Location', "/user/profile/v/$id");
    }
}