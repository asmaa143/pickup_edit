<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExtraTranslation extends Model 
{

    protected $table = 'extra_translations';
    public $timestamps = true;
    protected $fillable = array('title', 'locale', 'exra_id');
    protected $visible = array('title', 'locale', 'exra_id');

}