<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class Templates extends Model {
    protected $table = 'templates';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'img_url',
        'hero_section_img_url',
        'about_section_img_url',
        'details_section_img_url',
        'quotes_section_img_url',
        'social_media_section_img_url',
        'gallery_section_img_url',
        'is_invisible',
    ];

    protected $attributes = [
        'is_invisible' => false,
    ];
}