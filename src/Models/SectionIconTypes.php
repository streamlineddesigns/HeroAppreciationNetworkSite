<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class SectionIconTypes extends Model {
    protected $table = 'section_icon_types';
    public $timestamps = true;

    protected $fillable = [
        'type',
    ];
}