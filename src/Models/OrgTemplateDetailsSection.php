<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class OrgTemplateDetailsSection extends Model {
    protected $table = 'org_template_details_section';
    public $timestamps = true;

    protected $fillable = [
        'organization_id',
        'detail_id',
        'is_invisible',
    ];
}