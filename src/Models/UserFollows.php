<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class UserFollows extends Model {
    protected $table = 'user_follows';
    public $timestamps = true;

    protected $fillable = [
        'follower_user_id',
        'followed_user_id',
    ];
}