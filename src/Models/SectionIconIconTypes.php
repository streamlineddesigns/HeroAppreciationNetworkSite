<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class SectionIconIconTypes extends Model {
    protected $table = 'section_icon_icon_types';
    public $timestamps = true;

    protected $fillable = [
        'section_icon_id',
        'section_icon_type_id',
    ];
}