<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class Organizations extends Model {
    protected $table = 'organizations';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'address',
        'email',
        'logo_img_url',
        'primary_brand_color',
        'secondary_brand_color',
        'is_invisible',
    ];
}