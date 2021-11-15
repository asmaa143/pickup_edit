<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddsTranslation extends Model 
{

    protected $table = 'adds_translations';
    public $timestamps = true;
    protected $fillable = array('title', 'locale', 'adds_id');
    protected $visible = array('id','title', 'locale', 'adds_id');

}