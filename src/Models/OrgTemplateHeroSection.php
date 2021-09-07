<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class OrgTemplateHeroSection extends Model {
    protected $table = 'org_template_hero_section';
    public $timestamps = true;

    protected $fillable = [
        'organization_id',
        'hero_img_url',
        'featured_img_url',
        'cta_text',
        'is_invisible',
    ];
}