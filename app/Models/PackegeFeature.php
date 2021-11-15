<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackegeFeature extends Model 
{

    protected $table = 'packeges_features';
    public $timestamps = true;
    protected $fillable = array('kindoffeature_id', 'price', 'number');
    protected $visible = array('kindoffeature_id', 'price', 'number');

}