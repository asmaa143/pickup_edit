<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZoneTranslation extends Model 
{

    protected $table = 'zone_translations';
    public $timestamps = true;
    protected $fillable = array('title', 'locale', 'zone_id');
    protected $visible = array('title', 'locale', 'zone_id');

}