<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeatureText extends Model 
{

    protected $table = 'features_texts';
    public $timestamps = true;
    protected $fillable = array('packagefeature_id');
    protected $visible = array('packagefeature_id');

}