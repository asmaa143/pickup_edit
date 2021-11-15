<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeaturetextTranslation extends Model 
{

    protected $table = 'featuretext_translations';
    public $timestamps = true;
    protected $fillable = array('text', 'locale', 'featuretext_id');
    protected $visible = array('text', 'locale', 'featuretext_id');

}