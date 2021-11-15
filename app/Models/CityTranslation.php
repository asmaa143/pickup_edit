<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CityTranslation extends Model 
{

    protected $table = 'city_translations';
    public $timestamps = true;
    protected $fillable = array('title', 'locale', 'city_id');
    protected $visible = array('title', 'locale', 'city_id');

}