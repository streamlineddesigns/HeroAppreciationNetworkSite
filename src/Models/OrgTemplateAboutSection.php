<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class OrgTemplateAboutSection extends Model {
    protected $table = 'org_template_about_section';
    public $timestamps = true;

    protected $fillable = [
        'organization_id',
        'about_us_text',
        'about_img_url',
        'is_invisible',
    ];
}