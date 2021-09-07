<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class ExtraText extends Model {
    protected $table = 'extra_text';
    public $timestamps = true;

    protected $fillable = [
        'organization_id',
        'about_one',
        'about_two',
        'about_three',
        'detail_one',
        'detail_two',
        'detail_three',
        'hero_one',
        'hero_two',
        'hero_three',
        'quote_one',
        'quote_two',
        'quote_three',
        'social_one',
        'social_two',
        'social_three',
        'extra_one',
        'extra_two',
        'extra_three',
        'extra_four',
        'extra_five',
        'extra_six',
        'extra_seven',
    ];
}