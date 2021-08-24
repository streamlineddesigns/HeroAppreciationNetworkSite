<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class UserRoles extends Model {
    protected $table = 'user_roles';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'role_id',
    ];
}