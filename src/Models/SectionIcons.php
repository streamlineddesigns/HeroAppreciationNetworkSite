<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class SectionIcons extends Model {
    protected $table = 'section_icons';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'class_name',
    ];
}