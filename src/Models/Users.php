<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class Users extends Model {
    protected $table = 'users';
    public $timestamps = true;

    protected $fillable = [
        'fname',
        'lname',
        'email',
        'profile_img_url',
        'password',
        'is_invisible',
    ];

    protected $attributes = [
        'is_invisible' => false,
    ];
}