<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class SocialMedias extends Model {
    protected $table = 'social_medias';
    public $timestamps = true;

    protected $fillable = [
        'section_icon_id',
        'page_url',
    ];
}