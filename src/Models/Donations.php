<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class Donations extends Model {
    protected $table = 'donations';
    public $timestamps = true;

    protected $fillable = [
        "sender_user_id",
        "recipient_organization_id",
        "amount",
        "is_invisible",
    ];
}