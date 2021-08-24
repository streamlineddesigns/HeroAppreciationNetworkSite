<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class Tokens extends Model {
    protected $table = 'organization_sign_up_tokens';
    public $timestamps = true;

    protected $fillable = [
        'remember_token',
    ];
}