<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class OrganizationUsers extends Model {
    protected $table = 'organization_users';
    public $timestamps = true;

    protected $fillable = [
        'organization_id',
        'user_id',
    ];
}