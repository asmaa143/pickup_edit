<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model 
{

    protected $table = 'areas';
    public $timestamps = true;
    protected $fillable = array('lat', 'lon', 'zone_id', 'state_id', 'city_id');
    protected $visible = array('lat', 'lon', 'zone_id', 'state_id', 'city_id');

}