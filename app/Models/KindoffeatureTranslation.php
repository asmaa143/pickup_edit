<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KindoffeatureTranslation extends Model 
{

    protected $table = 'kindoffeature_translations';
    public $timestamps = true;
    protected $fillable = array('kindoffeature_id', 'title', 'locale');
    protected $visible = array('kindoffeature_id', 'title', 'locale');

}